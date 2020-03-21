<?php

class UserData extends DataBase {

  function getUsers(){
		
	$posts = $this->select("SELECT user.ID, user.username, user_role.rolename FROM `user` INNER JOIN user_role ON user.role_id=user_role.ID ORDER BY ID DESC;");	


	return $posts;
  }
  
  function addUser($username,$role_id){
	
	$query = $this->insert("INSERT INTO user (username, role_id) VALUES ('".$username."','".$role_id."');");
	if ($query != true) return false;
	return true;
  }
  
}
?>