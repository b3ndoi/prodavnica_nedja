<?php

require_once("includes/header.php"); 

if(!$session->is_signed_in()) {redirect("login.php");}
$slajderi = Slajder::find_all();

$message ='';

if(empty($slajderi)){

    $message = "
        <div class='alert alert-warning'>
            <strong>Upozorenje! </strong>Nema nijedne slike za slajder u bazi podataka!
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
                            Slajdovi
                        </h1>   
                        <a href="dodaj_slajd.php" class="btn btn-primary">Dodaj slajd</a>                      
                        <div class="col-md-12">
                            <?=$message;?>
                            <table class = "table table-hover">                                
                                <thead>
                                    <tr>                                        
                                        <th>Slika</th>
                                        <th>Opis slajda</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php                              
                                        foreach ($slajderi as $slajder): ?>
                                            <tr>
                                            	<td><image src="<?=$slajder->picture_path(); ?>" class="admin-photo-thumbnail  user_picture" width="100px"></td>
                                                <td><?php echo $slajder->opis; ?></td>
                                                <td>
                                                    <div class="action_link">
                                                        <a onClick="open_modal(<?=$slajder->id?>)">Obriši</a>
                                                        <a href="izmeni_slajd.php?id=<?php echo $slajder->id;?>">Izmeni</a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <div id="myModal<?=$slajder->id?>" class="modal fade" role="dialog">
											  <div class="modal-dialog">

											    <!-- Modal content-->
											    <div class="modal-content">
											      <div class="modal-header">
											        <button type="button" class="close" data-dismiss="modal">&times;</button>
											        <h4 class="modal-title">Modal Header</h4>
											      </div>
											      <div class="modal-body">
											        <p>Jeste sigurni da želite da obrišete slajd?</p>
											      </div>
											      <div class="modal-footer">
											      	<a href="izbrisi_slajd.php?id=<?php echo $slajder->id;?>" class="btn btn-danger">Obriši</a>
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