
<style>

#case_upload {
	width : 300px;
    height: 300px;
    background-color: #ff0;
    overflow: hidden;
	border : 1px solid #555;
}

#list_doc {
	width : 300px;
    height: 280px;
    background-color: #fff;
	overflow : auto;
}

#label-for-nameDoc {
	width : 20px;
    height: 20px;
	display: inline-block;
    background-color: #bbb;
	background-image: url("icone/ajout.svg");
	background-position: 0px 0px;
	background-repeat : no-repeat;
	cursor : pointer;
}

#label-for-nameDoc:hover {
    background-color: #007AFF;
}

#form {
	width : 300px;
    height: 20px;
    background-color: #eee;
	float : left;
}

#progress {
	width : 280px;
	height : 19px;
	margin : 0px 0 0px 20px;
	border-top : 1px solid #bbb;
	float : left;
}

#progress-bar {
	width : 0%;
	height : 19px;
	background-color : #ccc;
}

.file-div {
	float : left;
	width : 265px;
	height : 20px;
	margin : 5px 25px 0px 10px;
	background-color : #eee
}

.file-div-link {
	float : left;
	width: 225px;
	height : 20px;
	overflow: hidden;
	-o-text-overflow: ellipsis;
	text-overflow: ellipsis;
}

.file-delete-link {
	text-decoration : none;
	float : right;
	width : 20px;
	height : 20px;
	background-color : #ddd;
	background-image: url("icone/suppression.svg");
}

.file-delete-link:hover {
	background-color : #ccc;
}

.file-link {
	line-height : 20px;
	margin-left : 10px;
	text-decoration : none;
	font-size : 11px;
	font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
	color : #555;
}

.file-link:hover {
	color : #0077ff;
}

</style>
<div id="case_upload">
<div id="list_doc">
</div>
<form id="form" method = "post" enctype="multipart/form-data">
	<label id="label-for-nameDoc" for="nameDoc">
		<input type="file" multiple="multiple" id="nameDoc" style="display:none" name="nameDoc[]">
		<input type="hidden" value="" id="entrepriseId" name="entreprise" />
		<div id="progress">
			<div id="progress-bar">
			</div>
		</div>
	</label>
</form>
</div>
<script type="text/javascript" src="../js/jquery-1.7.2.js"></script>
<script>

	function deleteNode(node) {
		if(typeof node.parentNode !== 'undefined')
			node.parentNode.removeChild(node);
	}
	
	function createFileLink(name, link, id) {
		var fileDiv        = document.createElement('div');
		var fileLink       = document.createElement('a');
		var fileSpanLink   = document.createElement('span');
		var fileDeleteLink = document.createElement('a');
		
		fileDiv.className        = 'file-div';
		fileLink.className       = 'file-link';
		fileDeleteLink.className = 'file-delete-link';
		fileSpanLink.className   = "file-div-link";
		
		fileLink.innerHTML = name;
		fileLink.href      = link;
		fileLink.target    = '_blank';
		
		fileDeleteLink.href = 'supprimer_document_permanent.php?id=' + id;
		
		fileSpanLink.appendChild(fileLink);
		fileDiv.appendChild(fileSpanLink);
		fileDiv.appendChild(fileDeleteLink);
		
		fileDeleteLink.onclick = function() {
			executeRequest(fileDeleteLink.href, 'html', {}, function(e) {
				deleteNode(fileDeleteLink.parentNode);
			});
			return false;
		};
		
		return fileDiv;
	}
	
	function executeRequest(link, dataType, data, success) {
		$.ajax({
            type    : 'GET',
            url     : link,
			dataType : dataType,
			data : data,
            success : success,
            error   : function() {
				alert('La requête n\'a pas abouti'); 
			}
		});
	};

	function uploadFile(formData, link, succes) {
		$.ajax({
			url  : link, //script qui traitera l'envoi du fichier
			type : 'POST',
			dataType : 'json',
			xhr  : function() { // xhr qui traite la barre de progression
				myXhr = $.ajaxSettings.xhr();
				if(myXhr.upload) { // vérifie si l'upload existe
					myXhr.upload.addEventListener('progress',function(e) {
						if(e.lengthComputable)
							document.getElementById('progress-bar').style.width = (e.loaded * 100/e.total) + '%';
					}, false); // Pour ajouter l'évènement progress sur l'upload de fichier
				}
				return myXhr;
			},
			
			//Traitements AJAX
			//beforeSend  : traitementAvantEnvois,
			success     : succes,
			error       : function(e) {
				alert('error : ' + e);
			},
			//Données du formulaire envoyé
			data        : formData,
			//Options signifiant à jQuery de ne pas s'occuper du type de données
			cache       : false,
			contentType : false,
			processData : false
		});
	};
	
	document.getElementById('nameDoc').addEventListener('change', function() {
		var formulaire = new FormData(document.getElementById('form'));
		uploadFile(formulaire, 'upload_document_permanent.php', function(e) {
			var data = e.data;
			
			for(var i = 0; i < data.length; i++) {
				var fileDiv = createFileLink(data[i].name, data[i].link, data[i].id);
				document.getElementById('list_doc').appendChild(fileDiv);
			}
		});
	});
	
	$(function(){
		
		$.ajax({
            type    : 'POST',
            url     : 'get_document_permanent.php',
			dataType : 'json',
			data : {
				entreprise : document.getElementById('entrepriseId').value
			},
            success : function(e) {
				var data = e.data;
				
				for(var i = 0; i < data.length; i++) {
					var fileDiv = createFileLink(data[i].name, data[i].link, data[i].id);
					document.getElementById('list_doc').appendChild(fileDiv);
				}
			},
            error   : function(e) {
				alert('Erreur : ' + e); 
			}
		});
		
	});
	
</script>