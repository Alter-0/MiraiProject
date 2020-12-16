var a_idx = 0;
jQuery(document).ready(function ($) {
    $("body").click(function (e) {
        var a = ["*:ஐ٩(๑´ᵕ`)۶ஐ:*", "(๑*◡*๑)", "✧*｡٩(ˊᗜˋ*)و✧*｡", "（づ￣3￣）づ╭❤～", "╰( ´・ω・)つ──☆✿✿✿", "Thanks♪(･ω･)ﾉ", "(((;꒪ꈊ꒪;)))", "_(:3」∠❀)_","▼o･ェ･o▼","(((((((((((っ•ω•)っ Σ(σ｀•ω•´)σ 起飞！","─=≡Σ(((つ•̀ω•́)つ","Σσ(・Д・；)我我我什么都没做!!!"];
        var $i = $("<p>").text(a[a_idx]);
        a_idx = (a_idx + 1) % a.length;
        var x = e.pageX,
            y = e.pageY;
        $i.css({
            "z-index": 9999,
            "top": y - 20,
            "left": x,
            "position": "absolute",
            // "font-weight": "bold",
            "color": "#ff6651",
            "user-select": "none"
        });
        $("body").append($i);
        $i.animate({
                "top": y - 180,
                "opacity": 0
            },
            1500,
            function () {
                $i.remove();
            });
    });
});