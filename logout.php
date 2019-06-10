<?php

session_start();

session_unset();
session_destroy();

$logout = 'Logged out successfully';

echo "<script>window.open('index.php?sessionEnd=$logout', '_self');</script>"

?>
