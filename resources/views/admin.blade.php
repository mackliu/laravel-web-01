@extends('layouts.frame')

@section('content')

<div class="col-3 p-0">
    <div class="w-100 border mb-1 px-2" style="height:443px">
        <div class="text-center border-bottom p-3 mb-2 ">後台管理選單</div>
            <div class="list-group">
                <a href="/backend/title" class="list-group-item list-group-item-action p-2 cursor-pointer">網站標題管理 </a>
                <a href="/backend/ad" class="list-group-item list-group-item-action p-2 cursor-pointer">動態文字廣告管理 </a>
                <a href="/backend/mvim" class="list-group-item list-group-item-action p-2 cursor-pointer">動畫圖片管理 </a>
                <a href="/backend/image" class="list-group-item list-group-item-action p-2 cursor-pointer">校園映象資料管理 </a>
                <a href="/backend/total" class="list-group-item list-group-item-action p-2 cursor-pointer">進站總人數管理 </a>
                <a href="/backend/bottom" class="list-group-item list-group-item-action p-2 cursor-pointer">頁尾版權資料管理 </a>
                <a href="/backend/news" class="list-group-item list-group-item-action p-2 cursor-pointer">最新消息資料管理 </a>
                <a href="/backend/user" class="list-group-item list-group-item-action p-2 cursor-pointer">管理者帳號管理 </a>
                <a href="/backend/menu" class="list-group-item list-group-item-action p-2 cursor-pointer">選單管理 </a>
            </div>
    </div>
    <div class="w-100 p-1 d-flex justify-content-center align-items-center border" style="height:95px">
        進站總人數：{{$total}}
    </div>

</div>
<div class="col-9 px-1">
    <div style="height:546px">
        @yield('main')
    </div>
</div>

@endsection

<script>
window.addEventListener("load",function(){
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

let table=$("table").data("table")

$(".show").on("click",function(){
    if(table=="title"){
        $.post("/backend/show/title",{'id':$(this).data('id')},function(){
            location.reload();
        })
    }else{
        $.post(`/backend/show/${table}`,{'id':$(this).data('id')},function(){
            location.reload();
        })
    }
})

$(".del").on("click",function(){
    let chk=confirm("確認要刪除資料嗎?")
    if(chk==true){
        $.post(`/backend/del/${table}`,{'id':$(this).data('id')},function(){
            location.reload();
        })
    }
})

$(".text").on("change",function(){
    let content=$(this).val();
    let id=$(this).data('id');
    let col=$(this).data('col');
    $.post(`/backend/text/${table}`,{'id':id,'col':col,'content':content},function(){
        location.reload()
    })
})

$("#addRow").on("click",function(){
    $.get(`/backend/modal/${table}`,function(modal){
        $("#modalBox").html(modal)
        $("#addModal").modal("show");
    })
})
})
</script>

