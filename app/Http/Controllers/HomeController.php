<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Title;
use App\Model\Total;
use App\Model\Bottom;
use App\Model\Ad;
use App\Model\Menu;
use App\Model\Image;
use App\Model\Mvim;
use App\Model\News;
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
        $this->homeElement();
        return view('frontend.main',$this->view);
    }

    public function login()
    {
        $this->homeElement();
        return view('frontend.login',$this->view);
    }

    private function homeElement()
    {
        $menu=Menu::where([['sh',1],['parent',0]])->get();
        foreach($menu as $key => $mu){
            $menu[$key]['sub']=Menu::where('parent',$mu->id)->get();
        }

        $marquee=Ad::where("sh",1)->get()->pluck('text')->all();
        $this->view['marquee']=implode('　　',$marquee);
        $this->view['menu']=$menu;
    }
}
