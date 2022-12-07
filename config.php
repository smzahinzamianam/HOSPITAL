<?php

$conn = mysqli_connect('localhost','root','','project');
if (!$conn) {
    error_log("Failed to connect to database!", 0);
}
?>
