<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Storage;

trait AttachFilesTrait
{
    public function uploadFile($request, $name, $folder)
    {
        $file_name = $request->file($name)->getClientOriginalName();
        $request->file($name)->storeAs('attachments/', $folder . '/' . $file_name, 'upload_attachments');
    }


    public function deleteFile($name, $folder)
    {
        $path = 'attachments/' . $folder . '/' . $name; // التأكد من مسار الملف
        if (Storage::disk('upload_attachments')->exists($path)) {
            Storage::disk('upload_attachments')->delete($path);
        }
    }


}
