<?php
/**
 * Quizzr Question module
 * */
require_once(__DIR__ ."/quizzr.php");
// if the question module is enabled it will display question of the current user
if($quesmoden=="true")
{
    // If FB login module is enabled then do database queries with fbuid from session.
    if($fb_en==1)
    {
        echo "fbmod disp";
    
    }
    // Else do queries on DB using username
    else
    {
        echo "question mod disp";
        //echo $uuid;
    
    }

}
?>