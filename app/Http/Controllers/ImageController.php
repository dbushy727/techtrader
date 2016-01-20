<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\StagingImage;

class ImageController extends Controller
{
    public function stage()
    {
        $file = \Input::file('file');
        $storage_location = storage_path('app/image_staging/' . \Auth::user()->id);
        $name = $file->getClientOriginalName();
        $file->move($storage_location, $name);
    }
}
