<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo $titre?></title>

	<link rel="stylesheet" href="<?php echo base_url(); ?>monCSS/mesStyles1.css" >
</head>
<body>

<div id="container">
    <div>

        <h1>Bonjour   
		
<?php
		ECHO $this->session->userdata('nom_eleve');
		?></h1>

		<a href="<?php echo base_url(); ?>index.php/client_c/Exo/1">Exo 1</a>
        <a href="<?php echo base_url(); ?>index.php/client_c/Exo/2">Exo 2</a>
        <p>
		<form method="post" action="<?php echo base_url(); ?>index.php/users_c/deconnexion" >
		<input type="submit"  name="act_soumettre" value="Deconnexion"/>
		</form>
		</p>
	</div>
	<p class="footer">DUT info Belfort <strong>{elapsed_time}</strong> seconds</p>
</div>

</body>
</html>