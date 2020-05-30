<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Title;
use App\Model\Total;
use App\Model\Bottom;
use App\Model\Ad;
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
        $marquee=Ad::where("sh",1)->get()->pluck('text')->all();
        $this->view['marquee']=implode('　　',$marquee);
        return view('frontend.main',$this->view);
    }

}
