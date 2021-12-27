<?php
$hashed="$2y$10$6.5sAWUis/z2CjREqX4ZnOjrE.egUEnBG6//ikTDj8w4vEFLVPh.e";
$pwd="staffno1";
echo password_hash($pwd,PASSWORD_DEFAULT);
if(password_verify("staffno1",$hashed)) { echo 'true!';}
else {echo 'false';}
