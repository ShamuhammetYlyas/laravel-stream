<?php

namespace App\Traits;

use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

trait ImageUpload
{
   public function storeImage($obj, $path)
   {
        $obj->update([
            'preview' => request()->preview->store($path, 'public'),
        ]);

        $image = Image::make(public_path('storage/'.$obj->preview))->fit(600,360);
        $image->save();
   }
}