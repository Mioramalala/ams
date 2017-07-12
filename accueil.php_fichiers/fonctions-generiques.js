var my_fonction = {
					insertTag : function(d,s,src){// fonction permettant de mettre tous les css et scripts dans l'en tête principale;
						var content_head, parent = d.getElementsByTagName('head')[0];		    
					    content_head = d.createElement(s); 
					     if(s=='script'){
					     	content_head.src = src;
					     	content_head.type = "text/javascript";
					     }
					     else if(s=='link'){
					     	content_head.href = src;
					     	content_head.type = "text/css";
					     	content_head.rel = "stylesheet";
					     }	    
					    
					     parent.appendChild(content_head);
					},
};
