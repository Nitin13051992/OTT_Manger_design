<?php

namespace App\Http\Controllers;

use App\Models\Entry;
// use App\Models\Entry;
use App\Models\userRegistration;
use Spatie\Activitylog\Contracts\Activity;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userData = userRegistration::select('uid')->count();
        $totalContent = Entry::select('entrtid')
            ->where('status', '=', '2')
            ->count();
        $activeContent = Entry::select('entrtid')
            ->where('video_status', '=', 'active')
            ->where('status', '=', '2')
            ->count();
        $desableContent = Entry::select('entrtid')
            ->where('video_status', '=', 'inactive')
            ->where('status', '=', '2')
            ->count();
        // dd($desableContent);
        // dd(Auth::user());
        return view(
            'home',
            compact(
                'userData',
                'totalContent',
                'activeContent',
                'desableContent'
            )
        );
    }
    public function dashboard()
    {
        return view('dashboarduser');
    }

    public function myProfile()
    {
        return view('myProfile');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function myTestAddToLog()
    {
        $data = activity()->log('Look mum, I logged something');
        dd($data);
        // $lastActivity->my_custom_field;
        // $data = Entry::all();
        // \LogActivity::addToLog('In-Active VOD.');
        dd('log insert successfully.');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function logActivity()
    {
        $logs = \LogActivity::logActivityLists();
        // dd($logs);
        return view('logActivity', compact('logs'));
    }
}
