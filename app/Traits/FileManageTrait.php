<?php

namespace App\Traits;

use Exception;
use App\Models\FileType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\ValidationException;

trait FileManageTrait
{
    private $img_path = 'public/assets/img/';

    /**
     * @param Request $request
     * @param $storage_path
     * @param Model|null $model
     * @return FileType
     * @throws ValidationException
     */
    private function storeFile(Request $request, $storage_path, Model $model = null)
    {
        $returnedImage = is_null($model)
            ? new FileType('default', 'png')
            : new FileType($model->file, $model->extension);

        if($request->hasFile('file'))
        {
            $image = $request->file('file');
            $allowed_extensions = collect([
                'jpg', 'JPG', 'jpeg', 'JPEG', 'doc', 'docx', 'pdf',
                'png', 'PNG', 'ppt', 'pptx', 'txt', 'zip', 'xls', 'xlsx'
            ]);
            if($allowed_extensions->contains($image->getClientOriginalExtension()))
            {
                try
                {
                    $returnedImage->name = md5($image->getClientOriginalName() . time());
                    $returnedImage->extension = $image->getClientOriginalExtension();
                    $image->move(base_path($this->img_path . $storage_path . '/'), $returnedImage->name . '.' . $returnedImage->extension);
                    if(!is_null($model)) $this->deleteFile($model, $storage_path);
                }
                catch (Exception $ex)
                {
                    toast_message($ex->getMessage());
                }
            }
            else
            {
                toast_message('Erreur sur l\'extension de l\'image');
                throw ValidationException::withMessages([
                    'image' => "L'extension ne correspond pas, l'extension doit être dans cette liste ('jpg', 'JPG', 'jpeg', 'JPEG', 'doc', 'docx', 'pdf', 'png', 'PNG', 'ppt', 'pptx', 'txt', 'zip', 'xls', 'xlsx')",
                ])->status(423);
            }
        }
        return $returnedImage;
    }
    /**
     * @param Model $model
     * @param $storage_path
     */
    private function deleteFile(Model $model, $storage_path)
    {
        try
        {
            if($model->file !== 'default')
            {
                $file = base_path($this->img_path . $storage_path . '/') . $model->file . '.' . $model->extension;
                if(File::exists($file)) File::delete($file);
            }
        }
        catch (Exception $ex)
        {
            toast_message( $ex->getMessage());
        }
    }
}