$(document).ready(
	function(){
		$("#srNxt").click(function(){
		function exemple()
			{
		
			var leftDepl=-263;
			var val=0;
		
				if(val==0){
				
					if(leftDepl<=0)
						{
					
						left=leftDepl+"px";
						leftDepl=leftDepl+1.6;
						$("#menuDeroul").css("left",left);
						window.setTimeout('exemple()',0);
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
						window.setTimeout('exemple()',0);
						}
						else
						{
						val=0;
						window.clearTimeout('exemple()',0);
						}
					
				}
			};
				
		});
		// alert('test001');
		
		});
		
		
		
	
	
	
	
	

