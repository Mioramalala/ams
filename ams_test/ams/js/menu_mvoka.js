// JavaScript Document
$(document).ready(
		
		function(e)
		{
			
    		$("#srNxt").click(fenetre_click);
					
		}
);
var leftDepl=-263;
var val=0;
function fenetre_click()
{
	if(val==0)
	{
		if(leftDepl<=0)
		{
		left=leftDepl+"px";
		leftDepl=leftDepl+1.6;
		$("#menuDeroul").css("left",left);
		window.setTimeout('fenetre_click()',0);
		}
	else
		{
		val=1;
		
		}
	}
	else if(val==1)
	{	
		if(leftDepl>=-263)
		{
		left=leftDepl+"px";
		leftDepl=leftDepl-1.6;
		$("#menuDeroul").css("left",left);
		window.setTimeout('fenetre_click()',0);
		}
		else
		{
		val=0;
		window.clearTimeout('fenetre_click()',0);
		}
	}
	
	
}
