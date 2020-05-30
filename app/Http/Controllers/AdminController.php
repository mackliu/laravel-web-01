<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Title;
use App\Model\Ad;
use App\Model\Mvim;
use App\Model\Image;
use App\Model\Total;
use App\Model\Bottom;
use App\Model\News;
use App\Model\User;
use App\Model\Menu;

class AdminController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $this->view['header']="網站標題管理";
        $this->title();
        return view('backend.admin_item',$this->view);
    }

    public function list($item)
    {
        switch($item){
            case "title":
                $this->view['header']="網站標題管理";
                $this->title();
            break;
            case "ad":
                $this->view['header']="動態文字廣告管理";
                $this->ad();
            break;
            case "mvim":
                $this->view['header']="動畫圖片管理";
                $this->mvim();
            break;
            case "image":
                $this->view['header']="校園影像資料管理";
                $this->image();
            break;
            case "total":
                $this->view['header']="進站總人數管理";
                $this->total();
            break;
            case "bottom":
                $this->view['header']="頁尾版權資料管理";
                $this->bottom();
            break;
            case "news":
                $this->view['header']="最新消息資料管理";
                $this->news();
            break;
            case "admin":
                $this->view['header']="管理者帳號管理";
                $this->admin();
            break;
            case "menu":
                $this->view['header']="選單管理";
                $this->menu();
            break;
        }
        return view('backend.admin_item',$this->view);

    }

    private function title(){
        $this->view['column']=['網站標題','替代文字','顯示','刪除',''];
        $rows=Title::all();
        foreach($rows as $row){
            $isChecked=$row->sh==1?"checked":"";
            $this->view['list'][]=[
                "<img src='../img/".$row->img."' style='width:300px;height:30px'>",
                $row->text,
                "<input type='radio' name='sh' value='$row->id' $isChecked>",
                "<input type='checkbox' name='del[]' value='$row->id'>",
                "<button data-id='$row->id'>更新圖片</button>"
            ];
        }
    }

    private function ad(){
        $this->view['column']=['動態文字廣告','顯示','刪除'];
        $rows=Ad::all();
        foreach($rows as $row){
            $isChecked=$row->sh==1?"checked":"";
            $this->view['list'][]=[
                "<input type='text' value='$row->text' style='width:100%'>",
                "<input type='checkbox' name='sh[]' value='$row->id' $isChecked>",
                "<input type='checkbox' name='del[]' value='$row->id'>"
            ];
        }
    }

    private function mvim(){
        $this->view['column']=['動畫圖片','顯示','刪除',''];
        $rows=Mvim::all();
        foreach($rows as $row){
            $isChecked=$row->sh==1?"checked":"";
            $this->view['list'][]=[
                "<embed src='../img/".$row->img."' style='width:120px;height:80px'>",
                "<input type='checkbox' name='sh[]' value='$row->id' $isChecked>",
                "<input type='checkbox' name='del[]' value='$row->id'>",
                "<button data-id='$row->id'>更新圖片</button>"
            ];
        }
    }

    private function image(){
        $this->view['column']=['校園映像資料管理','顯示','刪除',''];
        $rows=Image::paginate(3);
        foreach($rows as $row){
            $isChecked=$row->sh==1?"checked":"";
            $this->view['list'][]=[
                "<image src='../img/".$row->img."' style='width:100px;height:68px'>",
                "<input type='checkbox' name='sh[]' value='$row->id' $isChecked>",
                "<input type='checkbox' name='del[]' value='$row->id'>",
                "<button data-id='$row->id'>更新圖片</button>"
            ];
        }
        $this->view['page']=$rows;
    }

    private function news(){
        $this->view['column']=['最新消息資料內容','顯示','刪除'];
        $rows=News::paginate(4);
        foreach($rows as $row){
            $isChecked=$row->sh==1?"checked":"";
            $this->view['list'][]=[
                "<textarea name='text[]' style='width:95%;height:40px'>$row->text</textarea>",
                "<input type='checkbox' name='sh[]' value='$row->id' $isChecked>",
                "<input type='checkbox' name='del[]' value='$row->id'>",
            ];
        }
        $this->view['page']=$rows;
    }

    private function admin(){
        $this->view['column']=['帳號','密碼','刪除'];
        $rows=User::paginate(4);
        foreach($rows as $row){
            $this->view['list'][]=[
                "<input type='text' name='name[]' value='$row->name'>",
                "<input type='password' name='password[]' value='$row->password'>",
                "<input type='checkbox' name='del[]' value='$row->id'>",
            ];
        }
        
    }

    private function total(){
        $this->view['column']=['進站總人數'];
        $rows=Total::first();
            $this->view['list'][]=[
                "<input type='number' name='total' value='$rows->total'>",
            ];
    }

    private function bottom(){
        $this->view['column']=['頁尾版權'];
        $rows=Bottom::first();
            $this->view['list'][]=[
                "<input type='text' name='bottom' value='$rows->bottom'>",
            ];
    }

    private function menu(){
        $this->view['column']=['主選單名稱','選單連結網址','次選單數','顯示','刪除',''];
        $rows=Menu::where('parent',0)->get();
        foreach($rows as $row){
            $isChecked=$row->sh==1?"checked":"";
            $this->view['list'][]=[
                "<input type='text' name='text[]' value='$row->text'>",
                "<input type='text' name='href[]' value='$row->href'>",
                Menu::where('parent',$row->id)->count(),
                "<input type='checkbox' name='sh[]' value='$row->id' $isChecked>",
                "<input type='checkbox' name='del[]' value='$row->id'>",
                "<button data-id='$row->id'>編輯次選單</button>",
            ];
        }
        
    }

}
