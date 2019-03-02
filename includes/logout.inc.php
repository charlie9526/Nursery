<?php
session_start();
$_SESSION['u_type'] == 0;
session_unset();
session_destroy();
header("Location: ../index.php");
exit();
?>