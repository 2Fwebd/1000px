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
     * Current page for the API
     *
     * @var int
     */
    private $page = 1;

    /**
     * API URL builder based
     *
     * @link https://github.com/500px/api-documentation/blob/master/endpoints/photo/GET_photos.md
     * @return string - an URL ready for the 500Px API
     */
    private function getApiUrl() {

        $params = http_build_query([
            'consumer_key' => config('app.500px_consumer_key'),
            'page'         => $this->page,
            'feature'      => 'popular',
            'sort'         => 'times_viewed'
        ]);

        // Api Endpoint
        $endpoint = 'photos';

        // Return the correct URL
        return config('app.500px_host').$endpoint.'?'.$params;

    }

    /**
     * Make a call to the 500Px's API to get the most popular shots
     *
     * @return string - our JSON content like {"current_page":1,"total_pages":1000,"total_items":64560,"photos":[...]}
     */
    public function fetch()
    {

        // Set our parameters:
        $this->page = 1;

        // Our API url that we are calling
        $url = $this->getApiUrl();

        // Call it
        $stream = file_get_contents($url);

        // Display the stream
        echo $stream;

        // Exit safely
        die();

    }


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
