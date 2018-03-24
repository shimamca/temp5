$(document).ready(function() {
	$(".correct, .error").click(function() {
		$(this).hide(500);
	});
});
function fillURL(txtvalue,txtfld) {
	var nstr = "";
	for(var i=0;i<txtvalue.length;i++) {
		var iChars = "!@#$%^&*()+=[]\\\';,/{}|\":<> ?";
		if (iChars.indexOf(txtvalue.charAt(i)) != -1) {
			nstr += '-';
		}
		else if(txtvalue[i]==" ") {	nstr += '-'; }
		else if(txtvalue[i]=="?") {	nstr += ''; }
		else {
			nstr += txtvalue[i];
		}
	}
	while (nstr.indexOf("--")!=-1){
		nstr=nstr.replace("--","-");
	}
	document.getElementById(txtfld).value = nstr.toLowerCase();
}

// JavaScript Document
function addPhotoGalleryRow(tableID) { 
	var table = document.getElementById(tableID);
	var rowCount = table.rows.length;
	if(rowCount>10) {
		alert ("A maximum of 10 Files can be uploaded at once.");
		return true;
	}
	else {
		var row = table.insertRow(rowCount);
		var cell = Array(); var element = Array(); var i=0;	
		cell[i] = row.insertCell(i);cell[i].innerHTML = rowCount;i++;
		
		cell[i] = row.insertCell(i);
		element[i] = document.createElement("input");
		element[i].type = "text";
		element[i].name = "photo_caption[]";
		element[i].setAttribute("id", "photo_caption["+rowCount+"]");
		element[i].setAttribute("size", "40");
		cell[i].appendChild(element[i]);
		i++;
		
		cell[i] = row.insertCell(i);
		element[i] = document.createElement("input");
		element[i].type = "file";
		element[i].name = "photo_file[]";
		element[i].setAttribute("id", "photo_file["+rowCount+"]");
		cell[i].appendChild(element[i]);
		i++;
		
		cell[i] = row.insertCell(i);
		element[i] = document.createElement("input");
		element[i].type = "text";element[i].name = "publish_date[]";
		element[i].setAttribute("id", "publish_date["+rowCount+"]");
		element[i].setAttribute("size", "20");
		element[i].setAttribute("onclick", "javascript:NewCssCal('publish_date["+rowCount+"]','ddmmyyyy','dropdown',true,'12')");
		
		cell[i].appendChild(element[i]);
				
		return true;
	}
	
}
