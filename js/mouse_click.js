var a_idx = 0;
jQuery(document).ready(function($) {
    $("body").click(function(e) {
        var a = ["技术宅", "二次元", "小白", "富有想象", "*:ஐ٩(๑´ᵕ`)۶ஐ:* 学习使我进步", "(๑*◡*๑)", "✧*｡٩(ˊᗜˋ*)و✧*｡" ,"（づ￣3￣）づ╭❤～", "╰( ´・ω・)つ──☆✿✿✿", "充满激情", "(((┏(;￣▽￣)┛装完逼就跑", "熬夜成瘾(,,•﹏•,,)"];
        var $i = $("").text(a[a_idx]);
        a_idx = (a_idx + 1) % a.length;
        var x = e.pageX,
            y = e.pageY;
        $i.css({
            "z-index": 9999 ,
            "top": y - 20,
            "left": x,
            "position": "absolute",
            "font-weight": "bold",
            "color": "#ff6651"
        });
        $("body").append($i);
        $i.animate({
                "top": y - 180,
                "opacity": 0
            },
            1500,
            function() {
                $i.remove();
            });
    });
});