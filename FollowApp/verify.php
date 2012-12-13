<?php
// Verifies the registration code
require("framework.php");
$vip = new baby_users();
if($vip->verify(htmlentities($_GET["vip"]))) header("Location: index.php?m=2&load=confirm");
else header("Location: index.php?m=3&load=confirm");
?>