@extends('layouts.frame')

@section('content')

<div class="col-3 p-0">
    <div class="w-100 border mb-1 px-2" style="height:443px">
        <div class="text-center border-bottom p-2 mb-2 ">後台管理選單</div>
            <ul class="list-group">
                <li class="list-group-item list-group-item-action p-2 cursor-pointer">網站標題管理 </li>
                <li class="list-group-item list-group-item-action p-2 cursor-pointer">動態文字廣告管理 </li>
                <li class="list-group-item list-group-item-action p-2 cursor-pointer">動畫圖片管理 </li>
                <li class="list-group-item list-group-item-action p-2 cursor-pointer">校園映象資料管理 </li>
                <li class="list-group-item list-group-item-action p-2 cursor-pointer">進站總人數管理 </li>
                <li class="list-group-item list-group-item-action p-2 cursor-pointer">頁尾版權資料管理 </li>
                <li class="list-group-item list-group-item-action p-2 cursor-pointer">最新消息資料管理 </li>
                <li class="list-group-item list-group-item-action p-2 cursor-pointer">管理者帳號管理 </li>
                <li class="list-group-item list-group-item-action p-2 cursor-pointer">選單管理 </li>
            </ul>
    </div>
    <div class="w-100 p-1 d-flex justify-content-center align-items-center border" style="height:95px">
        進站總人數：
    </div>

</div>
<div class="col-9 px-1">
    <div style="height:546px">
        @yield('main')
    </div>
</div>

@endsection

