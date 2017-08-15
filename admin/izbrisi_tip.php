<?php

require_once("includes/header.php"); 
if(!$session->is_signed_in()) {redirect("login.php");}
if(isset($_GET['id'])){

    $tip_id = $_GET['id'];
    $tip = Tip::find_by_id($tip_id);
    $tip->delete();
    redirect("tipovi.php");

}else
{
    redirect("tipovi.php");
}
?>
