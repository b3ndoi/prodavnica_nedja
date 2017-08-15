<?php

require_once("includes/header.php"); 
if(!$session->is_signed_in()) {redirect("login.php");}
if(isset($_GET['id'])){

    $altikal_id = $_GET['id'];
    $artikal = Artikal::find_by_id($altikal_id);
    $artikal->delete_photo();
    $artikal->delete();

    redirect("artikli.php");

}else
{
    redirect("artikli.php");
}
?>
