<?php

namespace App\Http\Controllers;

use \Illuminate\Http\Request;
use ErrorException;

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
     * Saved as an attribute so we can use it several methods
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
            'sort'         => 'times_viewed',
            'image_size'   => 4
        ]);

        // Api Endpoint
        $endpoint = 'photos';

        // Return the correct URL
        return config('app.500px_host').$endpoint.'?'.$params;

    }

    /**
     * Make a call to the 500Px's API to get the most popular shots
     *
     * @param $request \Illuminate\Http\Request - The HTTP request
     * @return string - our JSON content like {"current_page":1,"total_pages":1000,"total_items":64560,"photos":[...]}
     */
    public function fetch(\Illuminate\Http\Request $request)
    {

        // Set our current page:
        $this->page = (isset($request['page'])) ? $request['page']: $this->page;

        // Our API url that we are calling
        $url = $this->getApiUrl();

        // Call it
        try {
            $stream = file_get_contents($url);
        }
        // If the API return anything unexpected
        catch (ErrorException $e) {
            die();
        }

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
