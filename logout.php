<?php
session_start();
session_destroy();
header("location:http://localhost/picManagement/index.php");
?>