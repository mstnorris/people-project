<?php namespace PopStat\Http\Controllers;

use PopStat\Http\Requests;
use PopStat\Http\Controllers\Controller;

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
