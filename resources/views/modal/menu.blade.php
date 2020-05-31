@extends('layouts.modal')

@section('modal')
<form action="">
    <table class="col-9 mx-auto table table-borderless table-sm">
        <tr class='text-center'>
            <td width="45%">次選單名稱</td>
            <td width="45%">次選單連結網址</td>
            <td width="10%">刪除</td>
        </tr>
        <tr class='text-center'>
            <td><input type="text" name="text" id="text"></td>
            <td><input type="text" name="href" id="href"></td>
            <td><input type="checkbox" name="del" id="del"></td>
        </tr>
    </table>

</form>
@endsection