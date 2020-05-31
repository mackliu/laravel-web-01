@extends('home')


@section('main')
<div style="height:300px;position:relative">
    @foreach($mvim as $mv)
        <div class="w-100 position-absolute mv" style="height:290px">
            <embed src="/img/{{$mv->img}}" class="w-100 h-100">
        </div>
    @endforeach
</div>
<div style="height:210px;border:3px dashed green;padding:10px">
    <div class="border-bottom border-dark text-center position-relative mb-1">新聞區
    @isset($more)
        <a href='/news' class="position-absolute" style='right:15px;bottom:0px;'>More..</a>
    @endisset
    </div>
    <div class="list-group p-0 position-relative">
    @foreach($news as $key => $n)
        <div class="list-group-item p-1 news position-static">{{ $key+1 }}{{mb_substr($n->text,0,20)}}...
            <div class="w-75 position-absolute p-2 all" style="display:none;top:0px;background:yellow;z-index:99;right:0px;border:3px double orange"><pre>{{ $n->text }}<pre></div>
        </div>
    @endforeach
    </div>
</div>

@endsection
