var page=require('webpage').create();
phantom.outputEncoding="utf8";
page.open("http://s.weibo.com/top/summary?cate=realtimehot", function(status) {
    if ( status === "success" ) {
        var content = page.evaluate(function () {
           // var element = document.querySelector('#realtimehot');
           var element=document.getElementById("realtimehot").innerHTML;
            return element;
            });
        console.log(content);
         } else {
             console.log("Page failed to load."); 
 }
  phantom.exit(0);
  });