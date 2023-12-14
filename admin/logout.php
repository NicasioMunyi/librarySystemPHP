<?php
session_start();;

//unset all sessions
session_destroy();
 //redirect to login

 header("Location: adminLogin.php");
 exit();
?>