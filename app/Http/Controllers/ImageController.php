<?php

namespace TechTrader\Http\Controllers;

use Illuminate\Http\Request;
use TechTrader\Http\Controllers\Controller;
use TechTrader\Http\Requests;
use TechTrader\Models\User;
use TechTrader\Repos\ImageRepo;

class ImageController extends Controller
{
    public function __construct(ImageRepo $images)
    {
        $this->images = $images;
    }

    public function stage()
    {
        $this->images->stage(\Input::file('file'), \Auth::user()->id);
    }
}
