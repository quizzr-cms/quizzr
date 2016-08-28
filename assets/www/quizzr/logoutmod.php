<?php
require_once(__DIR__."/quizzr.php");
echo "<a href='.?logout=1' class='quizzr-logout'>Logout</a>'";
session_destroy();
?>