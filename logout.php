<?php
include "include/common.php";

session_unset();
session_destroy();
echo ("<script> location.href='index.php' </script>");
?>