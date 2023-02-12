<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;

class UploadLogoService
{
    public function upload(UploadedFile $file)
    {
        $logo = null;

        try
        {
            $fileName = $file->getClientOriginalName();
            if($logo = $file->storePubliclyAs('uploads', $fileName, 'public'))
            {
                $file->move('img/logo', $fileName);
                $logo = $fileName;
            }
        }
        catch(Exception $err)
        {
            $logo = false;
        }

        return $logo;
    }

    public function delete($oldFile)
    {
        return File::delete(public_path('img/logo/') . $oldFile);
    }
}