<?
require 'framework.php';
$login =  new baby_users();
$result = $login->login($_POST["email"], $_POST["password"], $_POST["type"]);
if($result && $_POST["type"] == 3) header("Location: index.php?load=babies");
else if($result && $_POST["type"] == 2) header("Location: index.php?load=doctor");
else header("Location: index.php?load=welcome");
?>