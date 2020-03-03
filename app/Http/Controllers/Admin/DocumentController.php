<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Domain;
use App\Models\Document;
use Illuminate\View\View;
use App\Traits\FileManageTrait;
use Illuminate\Routing\Redirector;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use App\Http\Requests\DocumentRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class DocumentController extends Controller
{
    use FileManageTrait;

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
        $documents = Document::all()->sortByDesc('updated_at');
        return view('admin.document.index', compact('documents'));
    }

    public function create()
    {
        $domains = Domain::all()->sortByDesc('updated_at');
        if($domains->count() == 0)
        {
            toast_message('Vous ne pouvez pas créer de documments sans domaine');
            return back();
        }
        return view('admin.document.create', compact('domains'));
    }

    /**
     * @param DocumentRequest $request
     * @return RedirectResponse|Redirector
     * @throws ValidationException
     */
    public function store(DocumentRequest $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|string|min:2|max:255|unique:documents',
            'file' => 'required|max:10000'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $file = $this->storeFile($request, Document::FOLDER);

        Document::create([
            'file' =>  $file->name,
            'extension' => $file->extension,
            'name' => $request->input('name'),
            'code' => $request->input('code'),
            'domain_id' => $request->input('domain_id'),
            'description' => $request->input('description'),
        ]);

        toast_message('Document enrégistré avec succès');
        return redirect(route('admin.documents.index'));
    }

    /**
     * @param Document $document
     * @return Factory|View
     */
    public function edit(Document $document)
    {
        $domains = Domain::all()->sortByDesc('updated_at');
        return view('admin.document.edit', compact('document', 'domains'));
    }

    /**
     * @param DocumentRequest $request
     * @param Document $document
     * @return RedirectResponse|Redirector
     */
    public function update(DocumentRequest $request, Document $document)
    {
        $document->update($request->except(['code', 'file']));
        toast_message('Document modifié avec succès');
        return redirect(route('admin.documents.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Document $document
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Document $document)
    {
        $document->delete();
        toast_message('Document supprimé avec succès');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Document $document
     * @return RedirectResponse|BinaryFileResponse
     * @throws Exception
     */
    public function download(Document $document)
    {
        //todo: Check that the user has subscribe to this domain before download the document
        $img_asset_path = 'public/assets/img/';
        $file = base_path($img_asset_path . Document::FOLDER . '/') . $document->file . '.' . $document->extension;

        if(File::exists($file))
        {
            // toast_message('Document en cours de téléchargement');
            return response()->download($file);
        }

        toast_message('Vous ne pouvez pas télécharger ce fichier');
        return back();
    }
}
