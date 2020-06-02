@extends('layouts.modal')

@section('modal')
<form action="/backend/saveRow/menu" method="post" enctype="multipart/form-data">
    <div class="modal-body">
    <table class="col-9 mx-auto table table-borderless table-sm">
        <tr class='text-center'>
            <td width="50%">主選單名稱</td>
            <td width="50%"><input type="text" name="text" id="text"></td>

        </tr>
        <tr class='text-center'>
            <td>主選單連結網址</td>
            <td><input type="text" name="href" id="href"></td>

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