<?php

namespace App\Http\Controllers\App;

use App\Mail\ContactMail;
use App\Mail\ContributorCopyMail;
use App\Mail\ContributorMail;
use Exception;
use App\Models\Domain;
use Illuminate\View\View;
use App\Models\Contributor;
use Illuminate\Http\Request;
use App\Mail\ContactCopyMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Validator;

class DomainController extends Controller
{
    /**
     * DomainController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return Factory|View
     */
    public function index()
    {
        $domains = Domain::all()->sortByDesc('updated_at');
        return view('app.domain.index', compact('domains'));
    }

    /**
     * @return Factory|View
     */
    public function subscribed()
    {
        $domains = Domain::all()->sortByDesc('updated_at')->filter(function (Domain $domain) {
            return !$domain->can_subscribe && $domain->can_show;
        });

        return view('app.domain.subscribed', compact('domains'));
    }

    /**
     * @param Domain $domain
     * @return Factory|RedirectResponse|View
     */
    public function show(Domain $domain)
    {
        if(!$domain->can_subscribe && $domain->can_show)
        {
            return view('app.domain.show', compact('domain'));
        }
        else toast_message('Vous ne pouvez pas voir les details de ce domaine');

        return back();
    }

    /**
     * @param Request $request
     * @param Domain $domain
     * @return Factory|RedirectResponse|View
     */
    public function mail(Request $request, Domain $domain)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:2|max:255',
            'message' =>'required|string|min:2|max:510',
            'subject' => 'required|string|min:2|max:255',
            'email' => 'required|string|min:2|max:255|email',
        ]);

        if ($validator->fails()) {
            danger_flash_message(trans('auth.error'), 'Vous devez remplir toute les informations sur ce domaine');
            return back()->withErrors($validator)->withInput();
        }

        if(!$domain->can_subscribe && $domain->can_show)
        {
            try
            {
                $domain->contacts()->create($request->all());
                if($request->input('copy') !== null)
                {
                    Mail::to($request->input('email'))
                        ->send(new ContactMail(
                                $request->input('name'),
                                $request->input('email'),
                                $request->input('subject'),
                                $request->input('message'),
                                $domain->name
                            )
                        );
                }

                toast_message('Méssage envoyé avec succès');
            } catch (Exception $ex) {
                toast_message('Erreur du serveur de mail');
            }
        }
        else toast_message('Vous ne pouvez pas envoyé de mail par rapport à ce domaine');

        return back();
    }

    /**
     * @param Request $request
     * @param Contributor $contributor
     * @return Factory|RedirectResponse|View
     */
    public function contributorMail(Request $request, Contributor $contributor)
    {
        $validator = Validator::make($request->all(), [
            'name-' . $contributor->id => 'required|string|min:2|max:255',
            'message-' . $contributor->id =>'required|string|min:2|max:510',
            'subject-' . $contributor->id => 'required|string|min:2|max:255',
            'email-' . $contributor->id => 'required|string|min:2|max:255|email',
        ]);

        if ($validator->fails()) {
            danger_flash_message(trans('auth.error'), 'Vous devez remplir toute les informations par rapport au contributeur ' . $contributor->name);
            return back()->withErrors($validator)->withInput();
        }

        if(!$contributor->domain->can_subscribe && $contributor->domain->can_show)
        {
            try
            {
                $name = $request->input('name-' . $contributor->id);
                $email = $request->input('email-' . $contributor->id);
                $subject = $request->input('subject-' . $contributor->id);
                $message = $request->input('message-' . $contributor->id);

                Mail::to($contributor->email)
                    ->send(new ContactMail(
                            $name,
                            $email,
                            $subject,
                            $message,
                            $contributor->domain->name
                        )
                    );
                if($request->input('copy-' . $contributor->id) !== null)
                {
                    Mail::to($email)
                        ->send(new ContactMail(
                                $name,
                                $email,
                                $subject,
                                $message,
                                $contributor->domain->name
                            )
                        );
                }
                toast_message('Méssage envoyé avec succès');
            } catch (Exception $ex) {
                toast_message('Erreur du serveur de mail');
            }
        }
        else toast_message('Vous ne pouvez pas envoyé de mail par rapport à cet intervenant');

        return back();
    }

    /**
     * @param Request $request
     * @param Domain $domain
     * @return RedirectResponse
     */
    public function subscribe(Request $request, Domain $domain)
    {
        $validator = Validator::make($request->all(), [
            'reason-' . $domain->id => 'required|string|min:2',
        ]);

        if ($validator->fails()) {
            danger_flash_message(trans('auth.error'), 'Vous devez donner une raison pour pouvoir souscrire au domaine ' . $domain->name);
            return back()->withErrors($validator)->withInput();
        }

        if($domain->can_subscribe)
        {
            Auth::user()->domains()->attach($domain, ['reason' => $request->input('reason-' . $domain->id)]);
            toast_message('Souscription au domaine en attente de confirmation');
        }
        else toast_message('Vous ne pouvez pas souscrire à ce domaine');

        return back();
    }
}
