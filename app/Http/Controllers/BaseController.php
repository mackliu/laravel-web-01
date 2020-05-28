<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Title;
use App\Model\Total;
use App\Model\Bottom;

class BaseController extends Controller
{
    protected $view=[];

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->view['title']=Title::where('sh',1)->first();
        $this->view['bottom']=Bottom::first()->bottom;
        $this->view['total']=Total::first()->total;

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


}
