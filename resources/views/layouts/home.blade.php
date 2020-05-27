@extends('layouts.frame')

@section('content')

<div class="col-3 p-0">
    <div class="w-100 border mb-1 px-2" style="height:443px">
        <div class="text-center border-bottom p-2 ">主選單區</div>
    </div>
    <div class="w-100 p-1 d-flex justify-content-center align-items-center border" style="height:95px">
        進站總人數：
    </div>

</div>
<div class="col-6 px-1">
    <div class="border">
    <marquee scrolldelay="120" direction="left" class="w-100" style="height:30px;"></marquee>
    @yield('main')
    </div>
</div>
<div class="col-3 p-0">
<button class="btn btn-secondary w-100 mb-1 p-3">管理登入</button>
<div class="w-100 border px-2" style="height:480px">
    <div class="text-center border-bottom p-2">校園映象區</div>
    <div class="text-center" style="font-size:28px;">&#9650;</div>
    
    <div class="text-center" style="font-size:28px;">&#9660;</div>
</div>
</div>
@endsection
