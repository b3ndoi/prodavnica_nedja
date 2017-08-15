<?php 
require_once('admin/includes/init.php');


$proizvod = Artikal::find_by_id($_GET['id']);
$kategorije = Kategorija::find_all();

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="https://fonts.googleapis.com/css?family=Quattrocento+Sans:400,700|Roboto:300,400,500|Vidaloka" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/style.css"/>

	<link rel="stylesheet" href="css/owlcarousel/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owlcarousel/owl.theme.default.min.css">


</head>
<body>
	<header id="section-header">

		<div class="top-header">
			<div class="top-navigation fl-left">
				<ul>
					<a href="#"><li>Home</li></a>
					<a href="#"><li>Blog</li></a>
					<a href="#"><li>About</li></a>
					<a href="#"><li>Contact Us</li></a>
				</ul>

			</div>
		</div>

		<div class="main-header sticky">

			<div class="logo">VIVA</div>

			<div class="main-navigation center">
				<ul>
					<?php foreach($kategorije as $kategorija):?>
						<a href="proizvodi.php?kategorija=<?=$kategorija->id;?>"><li><?=$kategorija->ime?></li></a>
					<?php endforeach;?>
				</ul>
			</div>

		</div>


	</header>

	<section class="featured">
	<?php 
	$tip = Tip::find_by_id($proizvod->id_tip); 
	$kategorija = Kategorija::find_by_id($proizvod->id_kategorije); 
	?>
	
		<div class="col3">
			<div class="boxed-feature">
				
				<img style="width:100%" src="admin/<?=$proizvod->picture_path()?>">
				
			</div>
		</div>
		<div class="col3">
			<p><?=$proizvod->naziv_kategorije()?></p>
			<p><?=$proizvod->naziv_tipa()?></p>
			<p><?=$proizvod->ime?></p>
			<p><?=$proizvod->cena?> RSD</p>
			<p><?=$proizvod->opis?></p>
	
		</div>



	</section>

<script type="text/javascript" src="js/jquery.min.js"></script> 
<script type="text/javascript" src="js/sticky-header.js"></script>
<script src="js/owlcarousel/owl.carousel.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('.sticky').stickMe(); // Yes, that's it!
})
</script>

</body>
</html>