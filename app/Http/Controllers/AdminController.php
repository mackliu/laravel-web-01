<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Model\{AD,Mvim,Image,Total,Bottom,News,User,Menu,Title};

class AdminController extends BaseController
{
    /**
     * 設定後台各功能會使用到的字串
     */

    private $str=[
        'title'=>[
            'header'=>'網站標題管理',
            'new'=>"新增網站標題圖片",
            'update-header'=>'更新標題區圖片',
            'update-row'=>'標題區圖片',
            'table'=>'title',
        ],
        'ad'=>[
            'header'=>'動態文字廣告管理',
            'new'=>"新增動態文字廣告",
            'table'=>'ad',
        ],
        'mvim'=>[
            'header'=>'動畫圖片管理',
            'new'=>"新增動畫圖片",
            'update-header'=>'更新動畫圖片',
            'update-row'=>'動畫圖片',
            'table'=>'mvim',
        ],
        'image'=>[
            'header'=>'校園映像資料管理',
            'new'=>"新增校園映像圖片",
            'update-header'=>'更新校園映像圖片',
            'update-row'=>'校園映像圖片',
            'table'=>'image',
        ],
        'total'=>[
            'header'=>'進站總人數管理',
            'table'=>'total',
            'new'=>''
        ],
        'bottom'=>[
            'header'=>'頁尾版權資料管理',
            'table'=>'bottom',
            'new'=>''
        ],
        'news'=>[
            'header'=>'最新消息資料管理',
            'new'=>"新增最新消息資料",
            'table'=>'news',
        ],
        'user'=>[
            'header'=>'管理者帳號管理',
            'new'=>"新增管理者帳號",
            'table'=>'user',
        ],
        'menu'=>[
            'header'=>'選單管理',
            'new'=>"新增主選單",
            'update-header'=>'編輯次選單',
            'table'=>'menu',
        ],
    ];

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     */
    public function index()
    {
        return redirect('/backend/title');
    }

    public function list($item)
    {
        $this->view['header']=$this->str[$item]['header'];
        $this->view['new']=$this->str[$item]['new'];
        $this->view['table']=$this->str[$item]['table'];
        $model=$this->model($item);

        switch($item){
            case "title":
                $this->view['column']=['網站標題','替代文字','顯示','刪除',''];
                $rows=$model::all();
                foreach($rows as $row){
                    $isShow=$row->sh==1?"顯示":"隱藏";
                    $showButton=$row->sh==1?"btn-primary":"btn-secondary";
                    $this->view['list'][]=[
                        "<img src='../img/".$row->img."' style='width:300px;height:30px'>",
                        "<input type='text' value='$row->text' class='text' data-id='$row->id' data-col='text'>",
                        "<input type='button' value='$isShow' class='show btn $showButton'  data-id='$row->id'>",
                        "<input type='button' value='刪除' class='del btn btn-danger' data-id='$row->id'>",
                        "<button class='update btn btn-success' data-table='menu' data-id='$row->id'>更新圖片</button>"
                    ];
                }
            break;
            case "ad":
                $this->view['column']=['動態文字廣告','顯示','刪除'];
                $rows=$model::all();
                foreach($rows as $row){
                    $isShow=$row->sh==1?"顯示":"隱藏";
                    $showButton=$row->sh==1?"btn-primary":"btn-secondary";
                    $this->view['list'][]=[
                        "<input type='text' class='text' data-id='$row->id' data-col='text' value='$row->text' style='width:100%'>",
                        "<input type='button' class='show btn $showButton' data-id='$row->id' value='$isShow' >",
                        "<input type='button' class='del btn btn-danger'  data-id='$row->id' value='刪除'>"
                    ];
                }
            break;
            case "mvim":
                $this->view['column']=['動畫圖片','顯示','刪除',''];
                $rows=$model::all();
                foreach($rows as $row){
                    $isShow=$row->sh==1?"顯示":"隱藏";
                    $showButton=$row->sh==1?"btn-primary":"btn-secondary";
                    $this->view['list'][]=[
                        "<embed src='../img/".$row->img."' style='width:120px;height:80px'>",
                        "<input type='button' class='show btn $showButton' data-id='$row->id' value='$isShow'>",
                        "<input type='button' class='del btn btn-danger'  data-id='$row->id' value='刪除'>",
                        "<button class='update btn btn-success' data-table='mvim' data-id='$row->id'>更新圖片</button>"
                    ];
                }
            break;
            case "image":
                $this->view['column']=['校園映像資料管理','顯示','刪除',''];
                $rows=$model::paginate(3);
                foreach($rows as $row){
                    $isShow=$row->sh==1?"顯示":"隱藏";
                    $showButton=$row->sh==1?"btn-primary":"btn-secondary";
                    $this->view['list'][]=[
                        "<image src='../img/".$row->img."' style='width:100px;height:68px'>",
                        "<input type='button' class='show btn $showButton' data-id='$row->id' value='$isShow'>",
                        "<input type='button' class='del btn btn-danger'  data-id='$row->id' value='刪除'>",
                        "<button class='update btn btn-success' data-table='image' data-id='$row->id'>更新圖片</button>"
                    ];
                }
                $this->view['page']=$rows;
            break;
            case "total":
                $this->view['column']=['進站總人數'];
                $rows=$model::first();
                    $this->view['list'][]=[
                        "<input type='number'  class='text' data-id='$rows->id' data-col='total' value='$rows->total'>",
                    ];
            break;
            case "bottom":
                $this->view['column']=['頁尾版權'];
                $rows=$model::first();
                    $this->view['list'][]=[
                        "<input type='text'  class='text' data-id='$rows->id' data-col='bottom' value='$rows->bottom'>",
                    ];
            break;
            case "news":
                $this->view['column']=['最新消息資料內容','顯示','刪除'];
                $rows=$model::paginate(4);
                foreach($rows as $row){
                    $isShow=$row->sh==1?"顯示":"隱藏";
                    $showButton=$row->sh==1?"btn-primary":"btn-secondary";
                    $this->view['list'][]=[
                        "<textarea class='text' data-id='$row->id' data-col='text' style='width:95%;height:40px'>$row->text</textarea>",
                        "<input type='button' class='show btn $showButton' data-id='$row->id' value='$isShow'>",
                        "<input type='button' class='del btn btn-danger'  data-id='$row->id' value='刪除'>",
                    ];
                }
                $this->view['page']=$rows;
            break;
            case "user":
                $this->view['column']=['帳號','密碼','刪除'];
                $rows=$model::all();
                foreach($rows as $row){
                    $this->view['list'][]=[
                        "<input type='text'     class='text' data-id='$row->id' data-col='name'  value='$row->name'>",
                        "<input type='password' class='text' data-id='$row->id' data-col='password'  value='$row->password'>",
                        "<input type='button'   data-id='$row->id' class='del btn btn-danger' value='刪除'>",
                    ];
                }
            break;
            case "menu":
                $this->view['column']=['主選單名稱','選單連結網址','次選單數','顯示','刪除',''];
                $rows=$model::where('parent',0)->get();
                foreach($rows as $row){
                    $isShow=$row->sh==1?"顯示":"隱藏";
                    $showButton=$row->sh==1?"btn-primary":"btn-secondary";
                    $this->view['list'][]=[
                        "<input type='text' class='text' data-id='$row->id' data-col='text' value='$row->text'>",
                        "<input type='text' class='text' data-id='$row->id' data-col='href' value='$row->href'>",
                        $model::where('parent',$row->id)->count(),
                        "<input type='button' class='show btn $showButton' data-id='$row->id' value='$isShow'>",
                        "<input type='button' class='del btn btn-danger'  data-id='$row->id' value='刪除'>",
                        "<button class='update btn btn-success' data-table='menu' data-id='$row->id'>編輯次選單</button>",
                    ];
                }
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
                    $ti->sh=($ti->id==$id)?1:0;
                    $ti->save();
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
        $modal['title']=$this->str[$table]['new'];
        $modal['table']=$table;
        return view('modal.add',$modal);
    }

    //字串轉Model
    private function model($table){
        $model="App\Model\\" . ucfirst($table);
        return $model;
    }

    public function addRow(Request $request,$table){
        $model=$this->model($table);
        if($request->file('img')->isValid()){
            $filename=$request->file('img')->getClientOriginalName();
            $request->img->storeAs('img',$filename,'img');
        }
        $row=new $model;
        $row->text=$request->input('text');
        $row->sh=0;
        $row->img=$filename;
        $row->save();
        
        return redirect('/backend/title');
    }

    public function saveRow(Request $request,$table){
        $model=$this->model($table);
            if($request->hasFile('img') && $request->file('img')->isValid()){
                $filename=$request->file('img')->getClientOriginalName();
                $request->img->storeAs('img',$filename,'img');
            }
        if(empty($request->input('id'))){
            //新增
            $row=new $model;

            switch($table){
                case "title":
                    $row->text=$request->input('text');
                    $row->sh=0;
                    $row->img=$filename;
                break;
                case "user":
                    $row->name=$request->input('name');
                    $row->password=Hash::make($request->input('password'));
                break;
                case "menu":
                    $row->text=$request->input('text');
                    $row->href=$request->input('href');
                    $row->parent=0;
                    $row->sh=1;
                break;
                default:
                    if(!empty($request->input('text'))){
                        $row->text=$request->input('text');
                    }
                    $row->sh=1;
                    if(isset($filename)){
                        $row->img=$filename;
                    }
                break;
            }

        }else{
            //更新
            $row=$model::find($request->input('id'));
            $row->img=$filename;
        }

        $row->save();
        return redirect("/backend/$table");
    }

    public function showUpdateModal($table,$id){
            $this->view['id']=$id;
            $this->view['title']=$this->str[$table]['update-header'];
            $this->view['table']=$table;
            if($table=='menu'){
                $this->view['submenu']=Menu::where("parent",$id)->get();
                $this->view['parent']=$id;
                return view('modal.submenu',$this->view);
            }else{
                $this->view['row']=$this->str[$table]['update-row'];
                return view("modal.upload",$this->view);
            }
    }

    public function editSubMenu(Request $request){
        $input=$request->input();

        if(!empty($input['id'])){
            foreach($input['id'] as $key => $id){
                $row=Menu::find($id);
                if(!empty($input['del']) && in_array($id,$input['del'])){
                    $row->delete();
                }else{
                    $row->text=$input['text'][$key];
                    $row->text=$input['href'][$key];
                    $row->save();
                }
            }
        }

        if(!empty($input['text-new'])){
            foreach($input['text-new'] as $key => $text){
                $row=new Menu;
                $row->text=$text;
                $row->href=$input['href-new'][$key];
                $row->parent=$input['parent'];
                $row->sh=1;
                $row->save();
            }
        }
        return redirect("/backend/menu");
    }
}
