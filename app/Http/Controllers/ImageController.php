<?php

namespace TechTrader\Http\Controllers;

use Illuminate\Http\Request;

use TechTrader\Http\Requests;
use TechTrader\Http\Controllers\Controller;
use TechTrader\Models\User;
use TechTrader\Models\StagingImage;

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
