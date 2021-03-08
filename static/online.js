console.log("微信管理后台：http://web-ns.xpfamily.com/login\n技术微信：JJtang1314\n永久免费，无任何商业目的，仅用于竞价微信号管理及复制数据统计");  
/*弹窗*/
var htmls=[
    '<style>',
    '.success{font-size:16px;width:90%;max-width:500px;top:50%;left:50%;transform:translate3d(-50%,-50%, 0);background:#fcffe7;border:10px solid #ffffff;border-radius:10px;padding:0;position:relative;text-align:center;}',
    '.success a,.success2 a{color:#00D48C;}',
    '.success2{font-size:18px;width:70%;max-width:400px;top:50%;left:50%;transform:translate3d(-50%,-50%, 0);background:#fcffe7;border-radius:10px;padding:0;position:relative;text-align:center;}',
    '#bg,#bg2{width:100%;height:100%;position:fixed;top:0;left:0;background:rgba(0,0,0,0.8);z-index:99999;display:none;}',
    '#bg .icon{position:relative;width:60px;border-radius:50px;margin:4px auto;margin-top:15px;}',
    '#bg .dec_txt{text-align:center;color:#1f0202;padding:0 15px;}',
    '.dec_txt_p{line-height:25px;margin-bottom:20px;z-index:999;}',
    '.qx{padding:6px 20px;border:1px solid #999999;border-radius:10px;cursor:pointer;color:#999999;}',
    '.qd{padding:6px 20px;border:1px solid #00D48C;border-radius:10px;color:#00D48C;margin-left:20px;cursor:pointer;}',
    '.wx_hm{color:#ff6821;font-weight:bold;}',
    '.red{color:#f00;font-weight:blod;}',
    '.header{height:80px; line-height:80px; background-color:#ff3d3d; border-top-left-radius:10px; border-top-right-radius:10px; border-bottom-left-radius:26%; border-bottom-right-radius:26%;}',
    '.content{padding:34px 25px 10px;}',
    '.xclose{position:absolute; top:0; right:0; z-index:999999;}',
    '.content span{display:block; text-align:center; color:#333;}',
    '.wei-weixin{margin-top:6px; font-size:16px; color:#797979 ! important;}',
    'a{display:inline;}',
    '</style>',
    '<!-- 样式一 -->',
    '<div class="bg-showModal" id="bg" style="display:none;">',
    '<div class="success" id="modal">',
    '<div class="icon"> <img src="http://web-ns.xpfamily.com/public/images/26_1.png"> </div>',
    '<div class="dec_txt">',
          '<p class="dec_txt_p"> 您已成功复制微信号 <span class="wx_hm gof" id="text-wx"><span class="wuk_weixin wxbtn"></span></span>，点击确定<span class="font_color1">跳转</span>到微信添加好友，免费咨询 </p>',
          '<div style="z-index:999; margin-bottom:20px;"> <span class="qx" id="close">取消</span> <span class="qd" id="sxy_qd"> <a class="wx_hr">确定</a> </span> </div>',
        '</div>',
    '</div>',
    '</div>',
    '<!-- 样式二 -->',
    '<div class="bg-showModal2" id="bg2" style="display:none;">',
    '<div class="success2" id="model2">',
        '<div class="xclose" id="TipBoxDel">x</div>',
        '<div class="header"></div>',
        '<div class="content"><span>添加有礼</span><span>添加老师微信即可有机会获得免费赠送</span><span>老师微信: <font class="wxbtn red"></font></span><span>一对一咨询</span><span class="wei-weixin" id="sxy_qd2">打开微信搜索添加好友</span></div>',
    '</div>',
    '</div>',
].join('\r\n');
var s = document.createElement("script");
var c = document.createElement("script");
s.setAttribute("src", "http://web-ns.xpfamily.com/public/clipboard.min.js");
c.setAttribute("src", "http://pv.sohu.com/cityjson?ie=utf-8");
document.body.appendChild(s);
document.body.appendChild(c);



var ref=document.referrer.toLowerCase();
var os=document.createElement('div');
os.innerHTML=htmls;
while(os.firstElementChild){
    document.body.appendChild(os.firstElementChild);
};

var model = document.getElementById("model");
var close = document.getElementById("close").addEventListener("click",function(){
    modal.style.display="none";
    bg.style.display="none";
},false);

var close4 = document.getElementById("TipBoxDel").addEventListener("click",function(){
    modal2.style.display="none";
    bg2.style.display="none";
},false);

var close2 = document.getElementById("sxy_qd").addEventListener("click",function(){
    sxy_wexin();
},false);
var close3 = document.getElementById("sxy_qd2").addEventListener("click",function(){
    sxy_wexin();
},false);

var grep=null;
var str=null;
var keyword=null;
var alertStyle=null; 
var uid=wx_getCookie("uid");

function sxy_wexin(){
    if (/baiduboxapp/i.test(navigator.userAgent)) {
        window.location.replace("bdbox://utils?action=sendIntent&minver=7.4&params=%7B%22intent%22%3A%22weixin://%23Intent%3Bend%22%7D");
        modal.style.display = "none";
        bg.style.display="none";
    } else {
        window.location.replace("weixin://");
        modal.style.display = "none";
        bg.style.display="none";
    }
}
function copy(){
    var clipboard = new ClipboardJS('.wxbtn');
    var flag = true;
    clipboard.on('success', function(e) {
        if (flag) {
            if(alertStyle == "1"){
                var modal = document.getElementById("modal");
                var bg = document.getElementById("bg");
                modal.style.display = "block";
                bg.style.display="block";
                alert("使用样式一");
            }
            if(alertStyle == "2"){
                var modal = document.getElementById("modal");
                var bg = document.getElementById("bg");
                modal.style.display = "block";
                bg.style.display="block";
                alert("使用样式二");
            }
            if(alertStyle == "0"){
                alert("不使用样式");
            }
            clipboard.destroy();
        }
    });
    clipboard.on('error', function(e) {
        alert("您的浏览器可能不支持，请手动复制~");
    })
}
function userRefSearch(){
    var sou=ref.split(".")[1];
    keyword=userRegMatch(sou).toString().split("=")[1].split("&")[0];
    if(keyword != null && keyword.indexOf("%") > -1)
    try{
        return decodeURIComponent(keyword);
    }catch(e){}
}
function userLocation(){
    return {
        href: window.location.href,
        host: window.location.host
    }
}
function jsonCity(c){
    if(typeof(c) == 'object'){
        return {
            cip: c.cip,
            cname: c.cname
        }
    }
    return false;
}
function userSplit(){
	var basePath = document.getElementById('basePathScript').src;
    var b = basePath.split("?")[1].split("=")[1];
    if(b!=''){
        return b;
    }
    return false;
}
function userTime(){
    var time = new Date();
    return function(){
        var year = time.getFullYear();
        var month = time.getMonth()+1;
        var date = time.getDate();
        var hour = time.getHours();
        var minu = time.getMinutes();
        var sec = time.getSeconds();
        return year+"-"+month+"-"+date+" "+hour+":"+minu+":"+(sec>10?sec:"0"+sec);
    }();
}
function wx_setCooike(c_name,value,expiredays){
       var exdate = new Date();
       exdate.setDate(exdate.getDate() + expiredays);
       document.cookie = c_name + "=" + escape(value) + ((expiredays == null) ? "": ";expires=" + exdate.toGMTString());
}
function wx_getCookie(c_name){
       var cookieValue = "";
       if(document.cookie.length > 0){
           wx_start = document.cookie.indexOf(c_name + "=");
           if(wx_start != -1){
                 wx_start = wx_start + c_name.length + 1;
                 wx_end = document.cookie.indexOf(";", wx_start);
                if (wx_end == -1) wx_end = document.cookie.length;
                cookieValue =  unescape(document.cookie.substring(wx_start, wx_end));
                console.log(cookieValue,"form error！");
           }
       }
       return cookieValue;
}
function isEmpty(v){
    switch(v){
        case 'undefined':
             return 1;
        break;
        case 'boolean':
             if(!v) return true;
        break;
        case 'object':
             if(v === null || v.length === 0) return true;
        break;
    }
}
function getEngine(s){
    if (s.indexOf("google.com") > -1) {
        return "google"; 
    }
    if (s.indexOf("baidu.com") > -1) {
        return "baidu"; 
    }
    if (s.indexOf("yahoo.com") > -1) {
        return "yahoo"; 
    }
    if (s.indexOf("360.com") > -1) {
        return "360";  
    }
    if (s.indexOf("sm.com") > -1) {
        return "sm";  
    }
    if (s.indexOf("jike.com") > -1) {
        return "jike";  
    }
    if (s.indexOf("sogou.com") > -1) {
        return "sogou"; 
    }
    if (s.indexOf("bing.com") > -1) {
        return "bing"; 
    }
    if (s.indexOf("youdao.com") > -1) {
        return "youdao"; 
    }
    if (s.indexOf("soso.com") > -1) {
        return "soso"; 
    }
    if (s.indexOf("ab5g.com") > -1 || s.indexOf("SHXCLICK") > -1 || s.indexOf("SHXCLICKTZ") > -1 || s.indexOf("#CI") > -1){
        return "访客挽留系统";
    }
    return "直接访问";
}
function userRegMatch(reg){
    if(reg == "baidu"){
        grep=/wd\=.*\&/i;
        str=ref.match(grep);
        return str;
    }
    if(reg == "google" || reg == "bing" || reg == "so"){
        grep=/q\=.*\&/i;
        str=ref.match(grep);
        return str;
    }
    if(reg == "sm"){
        grep=/q\=(.*?)\&/i;
        str=ref.match(grep);
        return str;
    }
    if(reg == "sogou" || reg == "soso"){
        grep=/keyword\=.*\&/i;
        str=ref.match(grep);
        return str;
    }
    if(reg == "yahoo"){
        grep=/p\=.*\&/i;
        str=ref.match(grep);
        return str;
    }
}
function userAgent(userAgent){
    var isIphone = userAgent.match(/iphone/i) == "iphone";
    var isHuawei = userAgent.match(/huawei/i) == "huawei";
    var isHonor = userAgent.match(/honor/i) == "honor";
    var isOppo = userAgent.match(/oppo/i) == "oppo";
    var isOppoR15 = userAgent.match(/pacm00/i) == "pacm00";
    var isVivo = userAgent.match(/vivo/i) == "vivo";
    var isXiaomi = userAgent.match(/mi\s/i) == "mi ";
    var isXiaomi2s = userAgent.match(/mix\s/i) == "mix ";
    var isRedmi = userAgent.match(/redmi/i) == "redmi";
    var isSamsung = userAgent.match(/sm-/i) == "sm-";

    if (isIphone) {
           return 'iphone';
       } else if (isHuawei || isHonor) {
           return 'huawei';
       } else if (isOppo || isOppoR15) {
           return 'oppo';
       } else if (isVivo) {
           return 'vivo';
       } else if (isXiaomi || isRedmi || isXiaomi2s) {
           return 'xiaomi';
       } else if (isSamsung) {
           return 'samsung';
       } else {
           return 'default';
       }
}
var wechat = {
    exportWx:function(weixin,web){     //咨询落地页-软文落地页        
        //咨询页
        $("head").append("<script>var weixin='"+ weixin +"'</script>");
        //软文页
        $(".wxbtn").text(weixin);      
        //弹窗样式
        alertStyle = web[0].alert;
        return true;
      
    },
    exportCookie(userId){
        if(!uid){
            //uv值，一天内重复访问算一次访问，首次访问wx为空,wx写入cookie，一天内重复访问不在写cookie，什么也不做
            wx_setCooike("uid",userId,1);
            //uv-ajax提交
            return 1;
        }
        return;
    },
    exportAjax(n,w){
    	if(n !== undefined){
    	   //uv有效,
    	   console.log("传过来uv",n,w);
    	}
    },
    exportForm:function(usrId){
        var userT = userTime(); /*获取当前时间*/
        var userE = getEngine(ref); /*搜索引擎*/
        var userC = jsonCity(returnCitySN); /*ip地址及省市*/
        var userP = userAgent(navigator.userAgent.toLowerCase()); /*手机类型*/
        var userL = userLocation(); /*url部分和整个url地址*/
        var userR = userRefSearch(); /*获取来路搜索关键词*/
        
        //省市区
        var cip = userC.cip;   //ip
        var cname = userC.cname;  //区域
        var cid = userC.cid  //编码
        //url
        var urls = userL.href;
        var hosts = userL.host;
        
        var arr = [userT,userE,cip,cid,cname,userP,urls,hosts,userR];
        alert(arr);
        console.log(userT,userE,userC,userP,userL,userR);
    }
}
$(function(){
    var userId = userSplit();  /*获取url参数*/
    var uv = wechat.exportCookie(userId);
         
        //统计uv
        
        //获取后台数据
        $.ajax({
            type:"POST",
            url:"http://web-ns.xpfamily.com/api/dataOnline.php",
            headers:{
                'Content-Type':'application/json;charset=utf8',
                'Authorization': userId
            },
            data:JSON.stringify({
               uid:userId
            }),
            success:function(res){
                var jsonData = JSON.parse(res);
                var startWx = new Array();
                
                $.each(jsonData.data,function(idx,val){
                   if(val.status=='1'){
                      startWx.push(val.wchat);
                   }
                }) 
                //随机微信号
                var weixin=startWx[Math.floor(Math.random()*startWx.length)];
                wechat.exportWx(weixin,jsonData.web); 
                
                //uv提交
                wechat.exportAjax(uv,weixin);                
                
                //提交粘贴数据
                 $("#sxy_qd,#sxy_qd2").click(function(){
                     wechat.exportForm(
                         userId
                     );
                 })
                
                console.log("返回数据",	JSON.parse(res));
                /*var startWx=new Array();
                 //获取开启微信号
                 $.each(data.data,function(idx,val){
                      if(val.status=='1'){
                          startWx.push(val.wchat);
                      }
                 }) 
                 //随机微信号
                 var weixin=startWx[Math.floor(Math.random()*startWx.length)];
                 wechat.exportWx(weixin,data.web);  


                 //提交粘贴数据
                 $("#sxy_qd,#sxy_qd2").click(function(){
                     wechat.exportForm(
                         userId
                     );
                 })   */
            },
            error:function(){
                console.log("request error");
            }
        })
             

})








//<span name="wx_th" class="wxbtn" onclick="copy()" data-clipboard-target=".wxbtn"></span>