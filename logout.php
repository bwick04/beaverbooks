<?php //include ("index.php");
session_start();
unset($_SESSION);
session_destroy();
header("Location: index.html");
exit;
?>
