//这部分是左侧侧边栏导航的隐藏和显示
var leftbar_control=true;
$(document).ready(
        function()
	{
		jQuery("#LeftBarBtn a").removeClass("ri");
		$("#LeftBarBtn").click(
        		function()
        		{
        			if (leftbar_control)
        			 {
        			 	$("#LeftBar").animate({left:"-50px"});
        			 	jQuery("#LeftBarBtn a").addClass("ri");
        			 }
        			else
        			{
        				$("#LeftBar").animate({left:"0px"});
        				jQuery("#LeftBarBtn a").removeClass("ri");
        			}
        			leftbar_control=!leftbar_control;
        		}
                );

        }
        
);
 

