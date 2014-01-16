/*
embed code:
 
*/
 
var idt=my5by_topic; 
var wi = 600;
var hi = 400;
 
 var divmy5 = document.getElementById('w_my5by_topic');
 

var iframem = document.createElement('iframe');

iframem.src = 'http://dev.myfiveby.com/widget/engine_thread_out.php?t='+idt+'&wi='+wi+'&hi='+hi;
iframem.setAttribute("width",wi);
iframem.setAttribute("height",hi); 
iframem.setAttribute("name","threadif"); 
iframem.setAttribute("bgcolor","transparent"); 
iframem.setAttribute("style","width:"+wi+"px; height:"+hi+"px;position:relative;top:0:left:0; border:0;background:transparent;");
iframem.setAttribute("id","upload_target");
 
divmy5.appendChild(iframem);