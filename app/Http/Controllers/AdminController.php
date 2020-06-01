<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
        $this->view['new']="新增網站標題圖片";
        $this->view['table']='title';
        $this->title();
        return view('backend.admin_item',$this->view);
    }

    public function list($item)
    {
        switch($item){
            case "title":
                $this->view['header']="網站標題管理";
                $this->view['new']="新增網站標題圖片";
                $this->view['table']='title';
                $this->title();
            break;
            case "ad":
                $this->view['header']="動態文字廣告管理";
                $this->view['new']="新增動態文字廣告";
                $this->view['table']='ad';
                $this->ad();
            break;
            case "mvim":
                $this->view['header']="動畫圖片管理";
                $this->view['new']="新增動畫圖片";
                $this->view['table']='mvim';
                $this->mvim();
            break;
            case "image":
                $this->view['header']="校園映像資料管理";
                $this->view['new']="新增校園映像圖片";
                $this->view['table']='image';
                $this->image();
            break;
            case "total":
                $this->view['header']="進站總人數管理";
                $this->view['table']='total';
                $this->total();
            break;
            case "bottom":
                $this->view['header']="頁尾版權資料管理";
                $this->view['table']='bottom';
                $this->bottom();
            break;
            case "news":
                $this->view['header']="最新消息資料管理";
                $this->view['new']="新增最新消息資料";
                $this->view['table']='news';
                $this->news();
            break;
            case "user":
                $this->view['header']="管理者帳號管理";
                $this->view['new']="新增管理者帳號";
                $this->view['table']='user';
                $this->user();
            break;
            case "menu":
                $this->view['header']="選單管理";
                $this->view['new']="新增主選單";
                $this->view['table']='menu';
                $this->menu();
            break;
        }
        return view('backend.admin_item',$this->view);

    }

    public function delRow(Request $request,$table){
        $id=$request->input('id');
        $model=$this->model($table);
        $row=$model::find($id);
        $row->delete();
    }

    public function showRow(Request $request ,$table){
        switch($table){
            case "title":
                $id=$request->input("id");
                $title=Title::all();
                foreach($title as $ti){
                    if($ti->id==$id){
                        $ti->sh=1;
                        $ti->save();
                    }else{
                        $ti->sh=0;
                        $ti->save();
                    }
                }
            break;
            default:
                $id=$request->input('id');
                $model=$this->model($table);
                $row=$model::find($id);
                $row->sh=($row->sh+1)%2;
                $row->save();
            break;

        }
    }

    public function updateCol(Request $request,$table){
        $model=$this->model($table);
        $col=$request->input('col');
        $id=$request->input("id");
        $content=$request->input("content");
        $row=$model::find($id);
        if($col!='password'){
            $row->$col=$content;
        }else{
            $row->$col=Hash::make($content);
        }
        $row->save();

    }

    //新增資料Modal
    public function showModal($table){
        switch($table){
            case "title":
                $modal['title']="新增標題區圖片";
                return view("modal.title",$modal);
            break;
            case "ad":
                $modal['title']="新增動態文字廣告";
                return view("modal.ad",$modal);
            break;
            case "mvim":
                $modal['title']="新增動畫圖片";
                return view("modal.mvim",$modal);
            break;
            case "image":
                $modal['title']="新增校園映像圖片";
                return view("modal.image",$modal);
            break;
            case "news":
                $modal['title']="新增最新消息資料";
                return view("modal.news",$modal);
            break;
            case "user":
                $modal['title']="新增管理者";
                return view("modal.user",$modal);
            break;
            case "menu":
                $modal['title']="新增主選單";
                return view("modal.menu",$modal);
            break;
        }
    }

    //各功能列表
    private function title(){
        $this->view['column']=['網站標題','替代文字','顯示','刪除',''];
        $rows=Title::all();
        foreach($rows as $row){
            $isShow=$row->sh==1?"顯示":"隱藏";
            $this->view['list'][]=[
                "<img src='../img/".$row->img."' style='width:300px;height:30px'>",
                "<input type='text' value='$row->text' class='text' data-id='$row->id' data-col='text'>",
                "<input type='button' value='$isShow' class='show'  data-id='$row->id'>",
                "<input type='button' value='刪除' class='del' data-id='$row->id'>",
                "<button class='update-img' data-id='$row->id'>更新圖片</button>"
            ];
        }
    }

    private function ad(){
        $this->view['column']=['動態文字廣告','顯示','刪除'];
        $rows=Ad::all();
        foreach($rows as $row){
            $isShow=$row->sh==1?"顯示":"隱藏";
            $this->view['list'][]=[
                "<input type='text' class='text' data-id='$row->id' data-col='text' value='$row->text' style='width:100%'>",
                "<input type='button' class='show' data-id='$row->id' value='$isShow' >",
                "<input type='button' class='del'  data-id='$row->id' value='刪除'>"
            ];
        }
    }

    private function mvim(){
        $this->view['column']=['動畫圖片','顯示','刪除',''];
        $rows=Mvim::all();
        foreach($rows as $row){
            $isShow=$row->sh==1?"顯示":"隱藏";
            $this->view['list'][]=[
                "<embed src='../img/".$row->img."' style='width:120px;height:80px'>",
                "<input type='button' class='show' data-id='$row->id' value='$isShow'>",
                "<input type='button' class='del'  data-id='$row->id' value='刪除'>",
                "<button data-id='$row->id'>更新圖片</button>"
            ];
        }
    }

    private function image(){
        $this->view['column']=['校園映像資料管理','顯示','刪除',''];
        $rows=Image::paginate(3);
        foreach($rows as $row){
            $isShow=$row->sh==1?"顯示":"隱藏";
            $this->view['list'][]=[
                "<image src='../img/".$row->img."' style='width:100px;height:68px'>",
                "<input type='button' class='show' data-id='$row->id' value='$isShow'>",
                "<input type='button' class='del'  data-id='$row->id' value='刪除'>",
                "<button data-id='$row->id'>更新圖片</button>"
            ];
        }
        $this->view['page']=$rows;
    }

    private function news(){
        $this->view['column']=['最新消息資料內容','顯示','刪除'];
        $rows=News::paginate(4);
        foreach($rows as $row){
            $isShow=$row->sh==1?"顯示":"隱藏";
            $this->view['list'][]=[
                "<textarea class='text' data-id='$row->id' data-col='text' style='width:95%;height:40px'>$row->text</textarea>",
                "<input type='button' class='show' data='$row->id' value='$isShow'>",
                "<input type='button' class='del'  data='$row->id' value='刪除'>",
            ];
        }
        $this->view['page']=$rows;
    }

    private function user(){
        $this->view['column']=['帳號','密碼','刪除'];
        $rows=User::paginate(4);
        foreach($rows as $row){
            $this->view['list'][]=[
                "<input type='text'     class='text' data-id='$row->id' data-col='name'  value='$row->name'>",
                "<input type='password' class='text' data-id='$row->id' data-col='password'  value='$row->password'>",
                "<input type='button'   data-id='$row->id' class='del' value='刪除'>",
            ];
        }
        
    }

    private function total(){
        $this->view['column']=['進站總人數'];
        $rows=Total::first();
            $this->view['list'][]=[
                "<input type='number'  class='text' data-id='$rows->id' data-col='total' value='$rows->total'>",
            ];
    }

    private function bottom(){
        $this->view['column']=['頁尾版權'];
        $rows=Bottom::first();
            $this->view['list'][]=[
                "<input type='text'  class='text' data-id='$rows->id' data-col='bottom' value='$rows->bottom'>",
            ];
    }

    private function menu(){
        $this->view['column']=['主選單名稱','選單連結網址','次選單數','顯示','刪除',''];
        $rows=Menu::where('parent',0)->get();
        foreach($rows as $row){
            $isShow=$row->sh==1?"顯示":"隱藏";
            $this->view['list'][]=[
                "<input type='text' class='text' data-id='$row->id' data-col='text' value='$row->text'>",
                "<input type='text' class='text' data-id='$row->id' data-col='href' value='$row->href'>",
                Menu::where('parent',$row->id)->count(),
                "<input type='button' class='show' data-id='$row->id' value='$isShow'>",
                "<input type='button' class='del'  data-id='$row->id' value='刪除'>",
                "<button data-id='$row->id'>編輯次選單</button>",
            ];
        }
    }

    //變數轉Model
    private function model($table){
        switch($table){
            case "title":
                $model="App\Model\Title";
            break;
            case "ad":
                $model="App\Model\Ad";
            break;
            case "mvim":
                $model="App\Model\Mvim";
            break;
            case "image":
                $model="App\Model\Image";
            break;
            case "total":
                $model="App\Model\Total";
            break;
            case "bottom":
                $model="App\Model\Bottom";
            break;
            case "news":
                $model="App\Model\News";
            break;
            case "user":
                $model="App\Model\User";
            break;
            case "menu":
                $model="App\Model\Menu";
            break;
        }
        return $model;
    }

    public function addRow(Request $request,$table){
        $model=$this->model($table);
        if($request->file('img')->isValid()){
            $filename=$request->file('img')->getClientOriginalName();
            $path=$request->img->storeAs('img',$filename,'img');
        }
        $row=new $model;
        $row->text=$request->input('text');
        $row->sh=0;
        $row->img=$filename;
        $row->save();
        
        return redirect('/backend/title');
    }
}
