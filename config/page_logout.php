<?php

if(empty($_SESSION['username']) && empty($_SESSION['password'])){
    header("location:index.php");
}

?>