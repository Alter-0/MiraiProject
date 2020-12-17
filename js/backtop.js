
window.onload = function(){
		var new_element=document.createElement('link');
		new_element.setAttribute('rel', 'stylesheet');
		document.head.appendChild(new_element);
		
		var div = document.createElement("div");
		div.setAttribute("class", "btn_totop");
		div.setAttribute("id", "btn_totop");
		// div.innerHTML = "回到顶部";
		
		document.body.appendChild(div);
        var oBtn=document.getElementById('btn_totop');
        //用处：避免当按钮触发页面回到顶部时页面滚动这个过程未结束，用户此时人为滚动时页面不会准确响应用户
        var bSys = true;
        var timer = null;
        window.onscroll = function(){
            //当认为滚动页面，关闭定时器
            if(!bSys){
                clearInterval(timer);
            }
            bSys = false;
        }
        oBtn.onclick = function()
        {
            //每30ms执行一次  scrollTop+iSpeed
            timer = setInterval(function(){
                var scrollTop=document.documentElement.scrollTop || document.body.scrollTop;
                //算速度     除以的数值越大，速度越慢
                var iSpeed=Math.floor(0-scrollTop/5);
                if(scrollTop == 0){
                    //不关闭定时器，会导致第一次回到顶部之后，导致不能在响应用户的滚动，不定的触发回到顶部
                    clearInterval(timer);
                }
                //当按钮启动页面滚动，设置为true
                bSys=true;
                document.documentElement.scrollTop=document.body.scrollTop=scrollTop+iSpeed;
            }, 30);
        }
		oBtn.style.width=0; oBtn.style.height=0;
		
		window.onscroll = function(){
			var ggg=$(window).scrollTop();
            if(ggg<480){
                  oBtn.style.width=0; oBtn.style.height=0;
			/*	oBtn.style.width='150px'; oBtn.style.height='173px';*/
            }else{
               oBtn.style.width='150px'; oBtn.style.height='173px';
               
            }}
    }