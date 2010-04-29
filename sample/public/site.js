function buildTreeFromJSON(obj) {
	var keys = [];
	var retValue = "<ul>";
	for (var key in obj) {
        if(typeof obj[key] == 'object') {
                retValue += "<li class='tree'>" + key;
                retValue += buildTreeFromJSON(obj[key]);
                retValue += "</li>";
        }
        else {
                retValue += "<li class='tree'><span class='key'>" + key + "</span> = " + obj[key] + "</li>";
        }
	   keys.push(key);
	}
	retValue += "</ul>";
	return retValue;
}

$(document).ready(function() {
	$('.item h2').toggle(function() {
		$('.item_body', $(this).parent()).show();
	}, function() {
		$('.item_body', $(this).parent()).hide();
	});
});