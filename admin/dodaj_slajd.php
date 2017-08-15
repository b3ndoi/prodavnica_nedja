<?php

require_once("includes/header.php"); 
if(!$session->is_signed_in()) {redirect("login.php");}

$message = "";
if(isset($_POST['submit'])){

    $slajder = new Slajder();
    if($slajder){

        $slajder->opis = $_POST['opis'];
        $slajder->set_file($_FILES['slika']);

        if($slajder->provera_slajda()){

            if($slajder->save()){
        
              	$message = "
        	        <div class='alert alert-success'>
        	            <strong> Uspešno ste dodali slajd</strong>
        	        </div>";
        
            }else{
        
               	$message = "
        	        <div class='alert alert-danger'>
        	            <strong> Došlo je do greške! ". $slajder->errors ."</strong>
        	        </div>";
        
            }
        }else{

        	$message = "
        	        <div class='alert alert-danger'>
        	            <strong> ". $slajder->errors ."!</strong>
        	        </div>";

        }

    }

}
?>
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            
          <?php include("includes/top_nav.php"); ?>
            
            
            
            
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            
            <?php include("includes/side_nav.php"); ?>
            
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Slajd <small>Dodavanje slajda</small>
                        </h1>
                        <?=$message?>
                        <form action="" method="post" enctype="multipart/form-data">                      
                            <div class="col-md-6 col-md-offset-3">

                                <div class="form-group">
                                    <label for="caption">Opis</label>
                                    <textarea name="opis" class="form-control">
                                    	
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="caption">Slika</label>
                                    <input type="file" name="slika">
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="submit" value="Dodaj" class="btn btn-success pull-right">
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
        </div>
        <!-- /#page-wrapper -->

    <?php include("includes/footer.php"); ?>