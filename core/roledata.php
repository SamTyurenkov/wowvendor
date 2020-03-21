<?php

class RoleData extends Database {
	
 function getRoles(){
		
	$posts = $this->select("SELECT * FROM `user_role` ORDER BY ID DESC;");	

	return $posts;
  }
  
  function addRole($rolename){
	
	$query = $this->insert("INSERT INTO user_role (rolename) VALUES ('".$rolename."');");
	if ($query != true) return false;
	return true;
  }
  
}