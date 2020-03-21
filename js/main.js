//POST VARS
var rolename = document.getElementById("rolename");
var username = document.getElementById("username");
var role_id = document.getElementById("role_id");
var addrole = document.getElementById("ajaxaddrole");
var adduser = document.getElementById("ajaxadduser");
var perror = document.querySelectorAll(".post .error");
var showusers = document.getElementById("showusers");

function ajaxadduser() {
var ajax = jQuery.ajax({
	async: true,  
    type: "POST",
	data: {
      username:username.value,
	  role_id:role_id.value,
	  method: 'ajaxadduser',
    },
    url: "/ajax",
    dataType: 'json',
    success: function(data) {
	if (data.info == 'success') {
	  ajaxgetusers();
	  perror[1].innerHTML = 'пользователь добавлен';
	} else {
	 perror[1].innerHTML = data.info;
	}
    },
	error: function(jqXHR, textStatus, errorThrown){ 	
				console.log(textStatus);
	}
  });  
} 

function ajaxaddrole() {
var ajax = jQuery.ajax({
	async: true,  
    type: "POST",
	data: {
      rolename:rolename.value,
	  method: 'ajaxaddrole',
    },
    url: "/ajax",
    dataType: 'json',
    success: function(data) {
	if (data.info == 'success') {
	  ajaxgetroles();
	  perror[0].innerHTML = 'роль добавлена';
	} else {
	 perror[0].innerHTML = data.info;
	}
    },
	error: function(jqXHR, textStatus, errorThrown){ 	
				console.log(textStatus);
	}
  });  
} 

function ajaxgetusers() {
var ajax = jQuery.ajax({
	async: true,  
    type: "POST",
	data: {
	  method: 'ajaxgetusers',
    },
    url: "/ajax",
    dataType: 'json',
    success: function(data) {
	showusers.innerHTML = '';
	if (data.info == 'success') {
		for (var i = 0; i < data.data.length; i++) {
		  showusers.innerHTML += '<div class="post"><div class="username">'+data.data[i]['username']+'</div><div class="id">'+data.data[i]['ID']+'</div><div class="rolename">'+data.data[i]['rolename']+'</div></div>';
		}
	}
    },
	error: function(jqXHR, textStatus, errorThrown){ 	
				console.log(textStatus);
	}
  });
}

ajaxgetusers();

function ajaxgetroles() {
var ajax = jQuery.ajax({
	async: true,  
    type: "POST",
	data: {
	  method: 'ajaxgetroles',
    },
    url: "/ajax",
    dataType: 'json',
    success: function(data) {
	role_id.innerHTML = '';
	if (data.info == 'success') {
	  for (var i = 0; i < data.data.length; i++) {
		  role_id.innerHTML += '<option value="'+data.data[i]['ID']+'">'+data.data[i]['rolename']+'</option>'; 
	  }
	}
    },
	error: function(jqXHR, textStatus, errorThrown){ 	
				console.log(textStatus);
	}
  });  
} 
ajaxgetroles();