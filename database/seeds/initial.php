<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Model\Title;

class initial extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $titles=[
                    [
                        'text'=>"卓越科技大學校園資訊系統",
                        'img'=>'01B01.jpg',
                        'sh'=>1
                    ],
                    [
                        'text'=>"卓越科技大學校園資訊系統",
                        'img'=>'01B02.jpg',
                        'sh'=>0
                    ],
                    [
                        'text'=>"卓越科技大學校園資訊系統",
                        'img'=>'01B03.jpg',
                        'sh'=>0
                    ],
                    [
                        'text'=>"卓越科技大學校園資訊系統",
                        'img'=>'01B04.jpg',
                        'sh'=>0
                    ],
             ];

        $ads=[
                [
                    "text"=>"轉知臺北教育大學與臺灣師大合辦第11屆麋研齋全國硬筆書法比賽活動",
                    "sh"=>1,
                    "img"=>""
                ],
                [
                    "text"=>"轉知:法務部辦理「第五屆法規知識王網路闖關競賽辦法",
                    "sh"=>1,
                    "img"=>""
                ],
                [
                    "text"=>"轉知2012年全國青年水墨創作大賽活動",
                    "sh"=>1,
                    "img"=>""
                ],
                [
                    "text"=>"欣榮圖書館101年悅讀達人徵文比賽，歡迎全校師生踴躍投稿參加",
                    "sh"=>1,
                    "img"=>""
                ],
                [
                    "text"=>"轉知:教育是人類升沉的樞紐-2013教師生命成長營",
                    "sh"=>1,
                    "img"=>""
                ],
            ];
        $news=[
                [
                    "text"=>"教師研習「世界公民生命園丁國內研習會」\n 1.主辦單位：世界展望會\n 2.研習日期：101年11月14日（三）～15日（四）\n 3.詳情請參考：\n http://gc.worldvision.org.tw/seed.html。\n 請線上報名。",
                    "sh"=>1,
                    "img"=>""
                ],
                [
                    "text"=>"公告綜合高中一年級英數補救教學時間\n 上課日期:10/27.11/3.11/10.11/24共計四次\n 上課時間:早上8:00~11:50半天\n 費用:全程免費\n 參加同學:綜合科一年級第一次段考成績需加強者\n 已將名單送交各班及導師\n 參加同學請帶紙筆.課本.第一次段考考卷\n 並將家長通知單給家長\n 若有任何疑問\n 請洽綜合高中學程主任",
                    "sh"=>1,
                    "img"=>""
                ],
                [
                    "text"=>"102年全國大專校院運動會\n 「主題標語及吉祥物命名」\n 網路票選活動\n 一、活動期間：自10月25日起至11月4日止。\n 二、相關訊息請上宜蘭大學首頁連結「102全大運在宜大」\n 活動網址：http://102niag.niu.edu.tw/",
                    "sh"=>1,
                    "img"=>""
                ],
                [
                    "text"=>"台灣亞洲藝術文化教育交流學會第一屆年會國際研討會\n 活動日期：101年3月3～4日(六、日)\n 活動主題：創造力、文化、全人教育\n 有意參加者請至http://www.caaetaiwan.org下載報名表",
                    "sh"=>1,
                    "img"=>""
                ],
                [
                    "text"=>"11月23日(星期五)將於彰化縣田尾鄉菁芳園休閒農場\n 舉辦「高中職生涯輔導知能研習」\n 中區學校每校至多2名\n 以普通科、專業類科教師優先報名參加\n 生涯規劃教師次之，參加人員公差假\n 並核實派代課\n 當天還有專車接送(8:35前在員林火車站集合)\n 如此好康的機會，怎能錯過？！\n 熱烈邀請師長們向輔導室(分機234)報名\n 名額有限，動作要快！！\n 報名截止日期：本周四 10月25日17:00前！",
                    "sh"=>1,
                    "img"=>""
                ],
                [
                    "text"=>"台視百萬大明星節目辦理海選活動\n 時間:101年10月27日下午13時\n 地點:彰化",
                    "sh"=>1,
                    "img"=>""
                ],
                [
                    "text"=>"國立故宮博物院辦理\n 「商王武丁與后婦好 殷商盛世文化藝術特展」暨\n 「赫赫宗周 西周文化特展」",
                    "sh"=>1,
                    "img"=>""
                ],
                [
                    "text"=>"財團法人漢光教育基金會\n 辦理2012「舊愛新歡-古典詩詞譜曲創作暨歌唱表演競賽」\n 參賽獎金豐厚!!",
                    "sh"=>1,
                    "img"=>""
                ],
            ];

        $mvims=[
                [
                    "text"=>"",
                    "sh"=>1,
                    "img"=>"01C01.gif"
                ],
                [
                    "text"=>"",
                    "sh"=>1,
                    "img"=>"01C02.gif"
                ],
                [
                    "text"=>"",
                    "sh"=>1,
                    "img"=>"01C03.gif"
                ],
                [
                    "text"=>"",
                    "sh"=>1,
                    "img"=>"01C04.gif"
                ],
                [
                    "text"=>"",
                    "sh"=>1,
                    "img"=>"01C05.gif"
                ],
                [
                    "text"=>"",
                    "sh"=>1,
                    "img"=>"01C06.gif"
                ],
            ];
        $images=[
                [
                    "text"=>"",
                    "sh"=>1,
                    "img"=>"01D01.jpg"
                ],
                [
                    "text"=>"",
                    "sh"=>1,
                    "img"=>"01D02.jpg"
                ],
                [
                    "text"=>"",
                    "sh"=>1,
                    "img"=>"01D03.jpg"
                ],
                [
                    "text"=>"",
                    "sh"=>1,
                    "img"=>"01D04.jpg"
                ],
                [
                    "text"=>"",
                    "sh"=>1,
                    "img"=>"01D05.jpg"
                ],
                [
                    "text"=>"",
                    "sh"=>1,
                    "img"=>"01D06.jpg"
                ],
            ];


        foreach($titles as $t){  DB::table('titles')->insert($t); }

        foreach($ads as $t){  DB::table('ads')->insert($t);  }

        foreach($mvims as $t){  DB::table('mvims')->insert($t); }

        foreach($news as $t){  DB::table('news')->insert($t);  }

        foreach($images as $t){  DB::table('images')->insert($t);  }

        DB::table('bottoms')->insert(["bottom"=>"2020-08-27 頁尾版權"]);
        DB::table('totals')->insert(["total"=>0]);
        
        DB::table('admins')->insert(["acc"=>'admin','pw'=>'1234']);
        DB::table('admins')->insert(["acc"=>'test','pw'=>'5678']);

        DB::table('menus')->insert(["text"=>'登理登入','href'=>'/admin','parent'=>0,'sh'=>1]);
        DB::table('menus')->insert(["text"=>'網站首頁','href'=>'/','parent'=>0,'sh'=>1]);
        DB::table('menus')->insert(["text"=>'更多內容','href'=>'/news','parent'=>2,'sh'=>1]);
    }
}
