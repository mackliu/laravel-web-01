@extends('layouts.modal')

@section('modal')
<form action="/backend/saveRow/news" method="post" enctype="multipart/form-data">
    <div class="modal-body">
    <table class="col-9 mx-auto table table-borderless table-sm">
        <tr>
            <td class="w-50 text-right">最新消息資料：</td>
            <td><textarea name="text" id="text" style="
            width:200px;height:80px"></textarea></td>
        </tr>
    </table>
    @csrf
    </div>
    <div class="modal-footer justify-content-center">
        <button type="submit" class="btn btn-primary">新增</button>
        <button type="button" class="btn btn-warning">重置</button>
    </div>
</form>
@endsection