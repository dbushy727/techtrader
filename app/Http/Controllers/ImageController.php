<?php

namespace TechTrader\Http\Controllers;

use Illuminate\Http\Request;
use TechTrader\Http\Controllers\Controller;
use TechTrader\Http\Requests;
use TechTrader\Models\User;
use TechTrader\Repos\ImageRepo;

class ImageController extends Controller
{
    /**
     * Image Repo
     *
     * @var TechTrader\Repos\ImageRepo
     */
    protected $images;


    public function __construct(ImageRepo $images)
    {
        $this->images = $images;
    }

    /**
     * Save images in staging area
     *
     * @return bool
     */
    public function stage()
    {
        return $this->images->stage(\Input::file('file'), \Auth::user()->id);
    }
}
