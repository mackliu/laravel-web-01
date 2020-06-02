@extends('home')


@section('main')
<div class="p-2" style="height:510px">
    <div class="border-bottom border-dark text-center mb-2">更多最新消息</div>
    <div class="list-group">
        @foreach($news as $key => $n)
        <div class="list-group-item news">
        {{ ($news->currentPage()-1)*5+$key+1 }}.{{ mb_substr($n->text,0,20) }}...
            <div class="all w-75 position-absolute" style="display:none;top:1 5px;right:5px;border:3px double orange;background:yellow;z-index:99"><pre>{{$n->text}}</pre></div>
        </div>
        @endforeach
    </div> 
    <div class="d-flex justify-content-center mt-3">

    {{$news->links()}}

    </div>
</div>

@endsection
