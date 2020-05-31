@extends('layouts.modal')

@section('modal')
<form action="">
    <table class="col-9 mx-auto table table-borderless table-sm">
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
    </table>

</form>
@endsection