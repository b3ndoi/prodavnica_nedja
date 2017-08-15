<?php

require_once("includes/header.php"); 
if(!$session->is_signed_in()) {redirect("login.php");}
if(isset($_GET['id'])){

    $kategorija_id = $_GET['id'];
    $kategorija = Kategorija::find_by_id($kategorija_id);
    $kategorija->delete();
    redirect("kategorije.php");

}else
{
    redirect("kategorije.php");
}
?>
