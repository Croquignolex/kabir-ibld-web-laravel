<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Contact;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Mail\MessageAnswerMail;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    /**
     * CountryController constructor.
     */
    public function __construct()
    {
        $this->middleware('admin.auth');
    }

    /**
     * @return Factory|View
     */
    public function index()
    {
        $contacts = Contact::all();
        foreach ($contacts as $contact) $contact->update(['viewed' => true]);
        return view('admin.contact.index', compact('contacts'));
    }

    /**
     * @param Contact $contact
     * @return Factory|View
     */
    public function show(Contact $contact)
    {
        $contact->update(['viewed' => true]);
        return view('admin.contact.show', compact('contact'));
    }

    /**
     * @param Request $request
     * @param Contact $contact
     * @return RedirectResponse
     */
    public function answer(Request $request, Contact $contact)
    {
        $validator = Validator::make($request->all(), [
            'answer' => 'required|string|min:2|max:255'
        ]);

        if ($validator->fails()) {
            return redirect(back())->withErrors($validator)->withInput();
        }

        try
        {
            $answer = $request->input('answer');
            $contact->answers()->create(['message' => $request->input('answer')]);
            Mail::to($contact->email)->send(new MessageAnswerMail($contact, $answer));
            toast_message('Méssage envoyé avec succès');
        } catch (Exception $ex) {
            dd($ex);
            toast_message('Erreur du serveur de mail');
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Contact $contact
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        toast_message('Méssage supprimé avec succès');
        return redirect(route('admin.contacts.index'));
    }
}
