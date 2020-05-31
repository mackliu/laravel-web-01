@extends('layouts.modal')

@section('modal')
<form action="">
    <table class="col-9 mx-auto table table-borderless table-sm">
        <tr>
            <td class="w-50 text-right">標題區圖片：</td>
            <td><input type="file" name="img" id="img" style="font-size:14px;width:100%" ></td>
        </tr>
        <tr>
            <td class="w-50 text-right">標題區替代文字：</td>
            <td><input type="text" name="text" id="text"></td>
        </tr>
    </table>

</form>
@endsection