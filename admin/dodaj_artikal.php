<?php

require_once("includes/header.php"); 
if(!$session->is_signed_in()) {redirect("login.php");}

$kategorije = Kategorija::find_all();
$tipovi = Tip::find_all();
$message = "";
if(isset($_POST['submit'])){

    $artikal = new Artikal();
    if($artikal){

        $artikal->ime = $_POST['ime'];
        $artikal->cena = $_POST['cena'];
        $artikal->id_kategorije = $_POST['id_kategorije'];
        $artikal->id_tip = $_POST['id_tip'];
        $artikal->opis = $_POST['opis'];
        $artikal->set_file($_FILES['slika']);

        if($artikal->provera_artikla()){

            if($artikal->save()){
        
              	$message = "
        	        <div class='alert alert-success'>
        	            <strong> Uspešno ste dodali kategoriju: ".$artikal->ime."</strong>
        	        </div>";
        
            }else{
        
               	$message = "
        	        <div class='alert alert-danger'>
        	            <strong> Došlo je do greške!  ". $artikal->errors ."</strong>
        	        </div>";
        
            }
        }else{

        	$message = "
        	        <div class='alert alert-danger'>
        	            <strong> ". $artikal->errors ."!</strong>
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
                            Artikli <small>Dodavanje artikla</small>
                        </h1>
                        <?=$message?>
                        <form action="" method="post" enctype="multipart/form-data">                      
                            <div class="col-md-6 col-md-offset-3">

                                <div class="form-group">
                                    <label for="caption">Ime artikla</label>
                                    <input type="text" name="ime" placeholder="Ime artikla..." class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="caption">Cena artikala</label>
                                    <input type="text" name="cena" placeholder="Cena artikala..." class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="caption">Opis artikal</label>
                                    <textarea class="form-control" name="opis" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="caption">Kategorija</label>
                                    <select name="id_kategorije" class="form-control">
                                        <?php foreach ($kategorije as $kategorija):?>
                                        <option value="<?=$kategorija->id?>"><?=$kategorija->ime?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="caption">Tip</label>
                                    <select name="id_tip" class="form-control" >
                                        <?php foreach ($tipovi as $tip):?>
                                        <option value="<?=$tip->id?>"><?=$tip->ime?></option>
                                        <?php endforeach; ?>
                                    </select>
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
