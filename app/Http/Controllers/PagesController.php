<?php namespace PopStat\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PopStat\Http\Requests;
use PopStat\Http\Controllers\Controller;

use Illuminate\Http\Request;
use PopStat\User;

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

    public function stats()
    {
        $user = Auth::user();
        //$users = DB::table('users')->count();
        $allUserCount = User::count();

        $firstNameCount = User::whereHas('profile', function($q) use ($user)
        {
            $q->where('first_name', $user->profile->first_name);

        })->count();

        $lastNameCount = User::whereHas('profile', function($q) use ($user)
        {
            $q->where('last_name', $user->profile->last_name);

        })->count() - 1;

        $middleNameCount = User::whereHas('profile', function($q) use ($user)
            {
                $q->where('middle_name', $user->profile->middle_name);

            })->count() - 1;

        return view('stats', compact('user', 'allUserCount', 'firstNameCount', 'lastNameCount', 'middleNameCount'));
    }
}
