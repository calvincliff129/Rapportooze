<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LifeEventController extends Controller
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
     * Show the application life event page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('user.life_event.index');
    }
}
