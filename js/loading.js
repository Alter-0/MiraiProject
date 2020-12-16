// 写入loading内容
const loading = '<div id="loader-wrapper"><div id="loader"></div><div class="loader-section section-left"></div><div class="loader-section section-right"></div><div class="load_title">正在加载Mirai站点<br><span>V1.0</span></div></div>';
document.write(loading);

// 等待所有加载
$(window).on('load',function(){
    $('body').addClass('loaded');
    $('#loader-wrapper .load_title').remove();
});