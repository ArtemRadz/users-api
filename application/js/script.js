
//get all users
var xhr  = new XMLHttpRequest()
xhr.open('GET', '/api/users', true)
xhr.onload = function () {
	if (xhr.readyState != 4) 
		return;
	if (xhr.status != 200) {
	    console.error(xhr.status + ': ' + xhr.statusText);
	} else {
	  	console.log(JSON.parse(xhr.responseText));
	}
}
xhr.send(null);

//get a user id
var xhr  = new XMLHttpRequest()
xhr.open('GET', '/api/users/2', true)
xhr.onload = function () {
	if (xhr.readyState != 4) 
		return;
	if (xhr.status != 200) {
	    console.error(xhr.status + ': ' + xhr.statusText);
	} else {
	  	console.log(JSON.parse(xhr.responseText));
	}
}
xhr.send(null);

//get a user name
var xhr  = new XMLHttpRequest()
xhr.open('GET', '/api/users/Alfred', true)
xhr.onload = function () {
	if (xhr.readyState != 4) 
		return;
	if (xhr.status != 200) {
	    console.error(xhr.status + ': ' + xhr.statusText);
	} else {
	  	console.log(JSON.parse(xhr.responseText));
	}
}
xhr.send(null);


//insert user
let xhr = new XMLHttpRequest();
body = 'name=Alfred&surname=Ranshail&age=67';
xhr.open('POST', '/api/users', true);
xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
xhr.send(body);

xhr.onreadystatechange = function() { 
	if (xhr.readyState != 4) 
		return;
	if (xhr.status != 200) {
	    console.error(xhr.status + ': ' + xhr.statusText);
	} else {
	  	console.log(xhr.responseText);
	}
}


//update user
let xhr = new XMLHttpRequest();
body = 'name=Menshol&surname=Frans&age=41';
xhr.open('PUT', '/api/users/4', true);
xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
xhr.send(body);

xhr.onreadystatechange = function() { 
	if (xhr.readyState != 4) 
		return;
	if (xhr.status != 200) {
	    console.error(xhr.status + ': ' + xhr.statusText);
	} else {
	  	console.log(xhr.responseText);
	}
}


//delete user
let xhr = new XMLHttpRequest();
xhr.open('DELETE', '/api/users/14', true);
xhr.onload = function () {
    if (xhr.readyState != 4) 
		return;
	if (xhr.status != 200) {
	    console.error(xhr.status + ': ' + xhr.statusText);
    } else {
        console.log(xhr.responseText);
   	}
}
xhr.send(null)