@extends('layouts.modal')

@section('modal')
<form action="/backend/saveRow/{{$table}}" method="post" enctype="multipart/form-data">
    <div class="modal-body">
        <table class="col-9 mx-auto table table-borderless table-sm">
            @switch($table)
            @case('title')
            <tr>
                <td class="w-50 text-right">標題區圖片：</td>
                <td><input type="file" name="img" id="img" style="font-size:14px;width:100%"></td>
            </tr>
            <tr>
                <td class="w-50 text-right">標題區替代文字：</td>
                <td><input type="text" name="text" id="text"></td>
            </tr>
            @break
            @case('ad')
            <tr>
                <td class="w-50 text-right">動態文字廣告：</td>
                <td><input type="text" name="text" id="text"></td>
            </tr>
            @break
            @case('mvim')
            <tr>
                <td class="w-50 text-right">動畫圖片：</td>
                <td><input type="file" name="img" id="img" style="font-size:14px;width:100%"></td>
            </tr>
            @break
            @case('image')
            <tr>
                <td class="w-50 text-right">校園映像區圖片：</td>
                <td><input type="file" name="img" id="img" style="font-size:14px;width:100%"></td>
            </tr>
            @break
            @case('news')
            <tr>
                <td class="w-50 text-right">最新消息資料：</td>
                <td><textarea name="text" id="text" style="
            width:200px;height:80px"></textarea></td>
            </tr>
            @break
            @case('user')
            <tr>
                <td class="w-50 text-right">帳號：</td>
                <td><input type="text" name="name" id="name"></td>
            </tr>
            <tr>
                <td class="w-50 text-right">密碼：</td>
                <td><input type="password" name="password" id="password"></td>
            </tr>
            <tr>
                <td class="w-50 text-right">確認密碼：</td>
                <td><input type="password" name="pw2" id="pw2"></td>
            </tr>
            @break
            @case('menu')
            <tr class='text-center'>
                <td width="50%">主選單名稱</td>
                <td width="50%"><input type="text" name="text" id="text"></td>
            </tr>
            <tr class='text-center'>
                <td>主選單連結網址</td>
                <td><input type="text" name="href" id="href"></td>
            </tr>
            @break
            @endswitch
        </table>
        @csrf
    </div>
    <div class="modal-footer justify-content-center">
        <button type="submit" class="btn btn-primary">新增</button>
        <button type="button" class="btn btn-warning">重置</button>
    </div>
</form>
@endsection