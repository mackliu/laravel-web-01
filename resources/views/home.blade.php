@extends('layouts.frame')

@section('content')

<div class="col-3 p-0">
    <div class="w-100 border mb-1 px-2" style="height:443px">
        <div class="text-center border-bottom p-2 ">主選單區</div>
        <div class="list-group mt-2">
            @foreach($menu as $mu)
                <div class="mu text-center position-relative">
                    <a href="{{$mu->href}}" class="list-group-item ">{{$mu->text}}</a>
                    @isset($mu['sub'])
                    <div class="sub position-absolute w-75" style='left:150px;top:30px;display:none;z-index:99'>
                        @foreach($mu['sub'] as $sub)
                        <a href="{{$sub->href}}" class="list-group-item bg-warning">{{$sub->text}}</a>
                        @endforeach
                    </div>
                    @endisset
                </div>
            @endforeach
        </div>
    </div>
    <div class="w-100 p-1 d-flex justify-content-center align-items-center border" style="height:95px">
        進站總人數：{{ $total }}
    </div>

</div>
<div class="col-6 px-1">
    <div class="border">
    <marquee scrolldelay="120" direction="left" class="w-100" style="height:30px;">
    @isset($marquee)
     {{$marquee}}
    @endisset
    </marquee>
    @yield('main')
    </div>
</div>
<div class="col-3 p-0">
<a href="/admin" class="btn btn-secondary w-100 mb-1 p-3">管理登入</a>
<div class="w-100 border px-2" style="height:480px">
    <div class="text-center border-bottom p-2">校園映象區</div>
    <div class="text-center up" style="font-size:28px;">&#9650;</div>
    @foreach($image as $im)
        <div class="border border-warning mx-auto my-1 im" style='width:150px;height:103px'>
            <img src="/img/{{$im->img}}" style='width:150px;height:103px'>
        </div>
    @endforeach
    <div class="text-center dn" style="font-size:28px;">&#9660;</div>
</div>
</div>
@endsection
<script>


window.addEventListener("load",function(){
   $(".mu").hover(
       function(){
            $(this).children(".sub").show()
        },
        function(){
            $(this).children(".sub").hide()
        }
    )

    let p=0;
    let all=$(".im").length-3;

    showIm(p)
    function showIm(p){
    $(".im").hide();
        for(i=0;i<3;i++){
            $(".im").eq(p+i).show();
        }
    }
     
    $(".up,.dn").on("click",function(){
        if($(this).hasClass('up')){
            if(p>0){
                p=p-1;
            }
        }else{
            if(p<all){
                p=p+1;
            }
        }
        showIm(p);
    })

    $(".news").hover(function(){
        $(".all").hide()
        $(this).children('.all').show()
    },
    function(){
        $(this).children('.all').hide()
    })

    let mvnow=0;
    let mvcount=$(".mv").length;
    function mv(mvstart){
        $(".mv").hide()
        $(".mv").eq(mvnow).show();
        if(mvnow<mvcount){
            mvnow++;
        }else{
            mvnow=0
        }
    }

    let run=setInterval(() => {
     mv(mvnow)        
    }, 3000);

    mv(mvnow)
})
</script>
