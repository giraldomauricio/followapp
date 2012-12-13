<?
// Session ending
// (R) 2012
session_start();
$_SESSION["id_user"] = "";
session_destroy();
header("Location: index.php?load=welcome");
?>