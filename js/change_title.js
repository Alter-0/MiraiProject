//页面激活状态改变时更换标题
var hiddenProperty = 'hidden' in document ? 'hidden' :
    'webkitHidden' in document ? 'webkitHidden' :
        'mozHidden' in document ? 'mozHidden' :
            null;
var visibilityChangeEvent = hiddenProperty.replace(/hidden/i, 'visibilitychange');
var title=$('title').text();
var onVisibilityChange = function(){
    if (!document[hiddenProperty]) {
        $('title').text('哈哈，骗你的(￣▽￣)~*');
        // console.log('页面激活');
        setTimeout(function (){
            $('title').text(title);
        },2000)
    }else{
        $('title').text('404啦!!!!!!∑(ﾟДﾟノ)ノ');
        // console.log('页面非激活');
    }
}
document.addEventListener(visibilityChangeEvent, onVisibilityChange);