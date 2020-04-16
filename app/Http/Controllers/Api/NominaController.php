<?php

namespace App\Http\Controllers\Api;

use App\Document;
use App\Http\Controllers\Controller;
use App\Http\Files\IUpload;
use App\Http\Requests\UploadNominaFilesRequest;
use App\Jobs\ProcessImportNomina;
use Symfony\Component\Process\Process;

class NominaController extends Controller
{
    protected $fileUploader;

    public function __construct(IUpload $fileUploader)
    {
        $this->fileUploader = $fileUploader;
    }

    public function upload(UploadNominaFilesRequest $request)
    {
        if($request->hasfile('files'))
        {
            if($fileUploadeds = $this->fileUploader->upload($request->file('files')))
            {
                $documents = collect($fileUploadeds)->map(function ($file) {
                    $file['imported'] = 0;
                    $file['rows_imported'] = 0;
                    $file['total_rows'] = 0;
                    $file['user_id'] = auth()->id();
                    return $file;
                })->toArray();

                Document::insert($documents);

                ProcessImportNomina::dispatch();
            }
        }


        return response()->json([
            'message' => 'Great! files has been successfully uploaded.'
        ]);
    }
}
