@extends('layouts.modal')

@section('modal')
<form action="/backend/editSubMenu" method="post" enctype="multipart/form-data">
    <div class="modal-body">
    <table class="col-9 mx-auto table table-borderless table-sm">
        <tr class='text-center'>
            <td width="45%">次選單名稱</td>
            <td width="45%">次選單連結網址</td>
            <td width="10%">刪除</td>
        </tr>
        @foreach($submenu as $sub)
        <tr class='text-center'>
            <td><input type="text" name="text[]" value="{{$sub->text}}"></td>
            <td><input type="text" name="href[]" value="{{$sub->href}}"></td>
            <td><input type="checkbox" name="del[]" value="{{$sub->id}}"></td>
            <input type="hidden" name="id[]" value="{{$sub->id}}">
        </tr>
        @endforeach
    </table>
    @csrf
    </div>
    <div class="modal-footer justify-content-center">
        <input type="hidden" name="parent" value="{{$parent}}">
        <button type="submit" class="btn btn-primary">修改確定</button>
        <button type="reset" class="btn btn-warning">重置</button>
        <button type="button" class="btn btn-warning more">更多次選單</button>
    </div>
</form>
@endsection
<script>
$(".more").on("click",function(){
    let row=`
        <tr class='text-center'>
            <td><input type="text" name="text-new[]"></td>
            <td><input type="text" name="href-new[]"></td>
            <td></td>
        </tr>`
$(".table-sm").append(row)
})


</script>