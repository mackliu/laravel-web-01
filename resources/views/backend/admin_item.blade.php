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
<div class="border my-1" style="height:480px;overflow:auto">
    <div class="border-bottom py-3 text-center font-weight-bolder">{{$header}}</div>
<table class="table table-bordered mt-2 text-center">
<tr>
@foreach($column as $col)
    <td class='p-1'>{{$col}}</td>
@endforeach
</tr>
@foreach($list as $row)
<tr>
    @foreach($row as $r)
    <td class='p-1'>{!! $r !!}</td>
    @endforeach
</tr>
@endforeach
</table>

<div class="d-flex justify-content-center">
    @isset($page)
    {{$page->links()}}
    @endisset
</div>

</div>
@endsection
