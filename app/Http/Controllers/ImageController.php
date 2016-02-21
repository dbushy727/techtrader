<?php

namespace TechTrader\Http\Controllers;

use TechTrader\Http\Controllers\Joystick;
use TechTrader\Models\User;
use TechTrader\Repos\ImageRepo;

class ImageController extends Joystick
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
