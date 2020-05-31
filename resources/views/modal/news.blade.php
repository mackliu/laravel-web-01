@extends('layouts.modal')

@section('modal')
<form action="">
    <table class="col-9 mx-auto table table-borderless table-sm">
        <tr>
            <td class="w-50 text-right">最新消息資料：</td>
            <td><textarea name="text" id="text" style="
            width:200px;height:80px"></textarea></td>
        </tr>
    </table>

</form>
@endsection