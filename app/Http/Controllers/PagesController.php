<?php namespace popstat\Http\Controllers;

use popstat\Http\Requests;
use popstat\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PagesController extends Controller {

    /**
     * Show the application welcome screen to the user.
     *
     * @return Response
     */
    public function index()
    {
        return view('pages.index');
    }
}
