<?php

require_once("includes/header.php"); 
if(!$session->is_signed_in()) {redirect("login.php");}

$kategorija = Kategorija::find_by_id($_GET['id']);

$message = "";
if(isset($_POST['submit'])){


    if($kategorija){

        $kategorija->ime = $_POST['ime'];

        if($kategorija->provera_kategorije()){

            if($kategorija->save()){
        
              	$message = "
        	        <div class='alert alert-success'>
        	            <strong> Uspešno ste izmenili kategoriju: ".$kategorija->ime."</strong>
        	        </div>";
        
            }else{
        
               	// $message = "
        	       //  <div class='alert alert-danegr'>
        	       //      <strong> Došlo je do greške!</strong>
        	       //  </div>";
            	echo $kategorija->save();
        
            }
        }else{

        	$message = "
        	        <div class='alert alert-danger'>
        	            <strong> ". $kategorija->errors ."!</strong>
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
                            Kategorije <small>Izmeni kategoriju</small>
                        </h1>
                        <?=$message?>
                        <form action="" method="post" enctype="multipart/form-data">                      
                            <div class="col-md-6 col-md-offset-3">

                                <div class="form-group">
                                    <label for="caption">Ime kategorije</label>
                                    <input type="text" name="ime" value="<?=$kategorija->ime?>" placeholder="Ime kategorije..." class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="submit" value="Izmeni" class="btn btn-success pull-right">
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