<?php

require_once("includes/header.php"); 

if(!$session->is_signed_in()) {redirect("login.php");}
$artikli = Artikal::find_all();

$message ='';

if(empty($artikli)){

    $message = "
        <div class='alert alert-warning'>
            <strong>Upozorenje! </strong>Nema nijednog artikla u bazi podataka!
        </div>";

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
                            Artikli
                        </h1>   
                        <a href="dodaj_artikal.php" class="btn btn-primary">Dodaj artikal</a>                      
                        <div class="col-md-12">
                            <?=$message;?>
                            <table class = "table table-hover">                                
                                <thead>
                                    <tr>               
                                    	<th>Slika</th>                         
                                        <th>Ime artikla</th>
                                        <th>Cena artikla</th> 
                                        <th>Opis artikla</th>                                    
                                        <th>Naziv kategorije</th>
                                        <th>Naziv tipa</th>
                                        <th>Datum dodavanja</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php                              
                                        foreach ($artikli as $artikal): ?>
                                            <tr>
                                            	<td><image src="<?=$artikal->picture_path(); ?>" class="admin-photo-thumbnail  user_picture" width="100px"></td>
                                                <td><?=$artikal->ime; ?></td>
                                                <td><?=$artikal->cena; ?></td>
                                                <td><?=$artikal->opis; ?></td>
                                                <td><?=$artikal->naziv_kategorije(); ?></td>
                                                <td><?=$artikal->naziv_tipa(); ?></td>
                                                <td><?=$artikal->datum; ?></td>
                                                <td>
                                                    <div class="action_link">
                                                         <a onClick="open_modal(<?=$artikal->id?>)">Obriši</a>
                                                        <a href="izmeni_artikal.php?id=<?php echo $artikal->id;?>">Izmeni</a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <div id="myModal<?=$artikal->id?>" class="modal fade" role="dialog">
                                              <div class="modal-dialog">

                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Modal Header</h4>
                                                  </div>
                                                  <div class="modal-body">
                                                    <p>Da li ste sigurni da želite da obrišete artikal: '<?=$artikal->ime?>'?</p>
                                                  </div>
                                                  <div class="modal-footer">
                                                    <a href="izbrisi_artikal.php?id=<?=$artikal->id;?>" class="btn btn-danger" >Obriši</a>
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                  </div>
                                                </div>

                                              </div>
                                            </div>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
        </div>
        <!-- /#page-wrapper -->

    <?php include("includes/footer.php"); ?>
         <script type="text/javascript">
        
        function open_modal(id){

            $("#myModal"+id).modal();

        }
        

    </script>