<?php

namespace App\Http\Controllers;

/**
 * Class ApplicationController
 *
 * This is the application main controller, 1000px is very simple, one controller will do the job just fine.
 * So this class renders the home page as well as fetches the photos from 500px api
 *
 * @author 2Fwebd
 * @package App\Http\Controllers
 */
class ApplicationController
{

    /**
     * This method renders the right view when the application home page is being called
     *
     * @return string - View of rendered
     */
    public function render()
    {
        return view('index');
    }


}
