<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Title;
use App\Model\Total;
use App\Model\Bottom;
class HomeController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('frontend.main',$this->view);
    }

}
