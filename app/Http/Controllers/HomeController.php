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

    public function news()
    {
        $this->homeElement();
        $news=News::paginate(5);
        $this->view['news']=$news;
        return view("frontend.news",$this->view);

    }
    private function homeElement()
    {
        $menu=Menu::where([['sh',1],['parent',0]])->get();
        foreach($menu as $key => $mu){
            $menu[$key]['sub']=Menu::where('parent',$mu->id)->get();
        }
        $image=Image::where('sh',1)->get();
        $mvim=Mvim::where('sh',1)->get();
        $marquee=Ad::where("sh",1)->get()->pluck('text')->all();
        if(News::where('sh',1)->get()->count()>5){

            $news=News::where('sh',1)->limit(5)->get();
            $this->view['news']=$news;
            $this->view['more']=true;
        }else{
            $news=News::where('sh',1)->get();
            $this->view['news']=$news;
        }
        $this->view['marquee']=implode('　　',$marquee);
        $this->view['menu']=$menu;
        $this->view['image']=$image;
        $this->view['mvim']=$mvim;
    }
}
