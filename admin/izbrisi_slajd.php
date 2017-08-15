<?php

require_once("includes/header.php"); 
if(!$session->is_signed_in()) {redirect("login.php");}
if(isset($_GET['id'])){

    $slajd_id = $_GET['id'];
    $slajder = Slajder::find_by_id($slajd_id);
    $slajder->delete_photo();
    $slajder->delete();

    redirect("slajder.php");

}else
{
    redirect("slajder.php");
}
?>