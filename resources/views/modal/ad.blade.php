@extends('layouts.modal')

@section('modal')
<form action="/backend/saveRow/ad" method="post" enctype="multipart/form-data">
    <div class="modal-body">
    <table class="col-9 mx-auto table table-borderless table-sm">
        <tr>
            <td class="w-50 text-right">新增動態文字廣告：</td>
            <td><input type="text" name="text" id="text"></td>
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