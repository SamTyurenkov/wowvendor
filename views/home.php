<!DOCTYPE html>
<html>
<?php 
include_once("templates/header.php");
?>
<body>
<div class="error"></div>

<!-- SECTION WITH POSTS -->
<div class="posts">

<div class="post">
<input id="rolename" type="text" placeholder="Роль пользователя"></input>
<div id="ajaxaddrole" class="button" onClick="ajaxaddrole()">Добавить роль</div>
<div class="error"></div>
</div>
<div class="post">
<input id="username" type="text" placeholder="Логин пользователя"></input>
<select id="role_id">

</select>
<div id="ajaxadduser" class="button" onClick="ajaxadduser()">Добавить пользователя</div>
<div class="error"></div>
</div>
</div>

<div id="showusers" class="posts" style="padding-top:0">


</div>
<?php 
include_once("templates/footer.php");
?>
</body>
</html>