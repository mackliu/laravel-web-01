@extends('admin')

@section('main')
<div class="d-flex">
    <div class="col-8 text-center align-items-center border rounded p-3">後台管理區</div>
    
    <div class="col-4 px-1">
    <a class="btn btn-secondary w-100 p-3" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
    </div>
</div>
<div class="border my-1" style="height:480px">
    <div class="border-bottom py-3 text-center font-weight-bolder"> 網站標題管理</div>

</div>

@endsection