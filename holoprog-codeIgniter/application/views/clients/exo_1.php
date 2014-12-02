<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo $titre?></title>

	<link rel="stylesheet" href="<?= base_url(); ?>monCSS/mesStyles1.css" >
</head>
<body>

<div id="container">
    <div>
		<form method="post" action="<?=base_url();?>index.php/client_c/correctionExo/1" >
		
		<SELECT name="1" size="1">
			<OPTION value="1">1</OPTION>
			<OPTION value="2">2</OPTION>
			<OPTION value="3">3</OPTION>
			<OPTION value="4">4</OPTION>
			<OPTION value="5">5</OPTION>
		</SELECT>
		
		<SELECT name="2" size="1">
			<OPTION value="1">1</OPTION>
			<OPTION value="2">2</OPTION>
			<OPTION value="3">3</OPTION>
			<OPTION value="4">4</OPTION>
			<OPTION value="5">5</OPTION>
		</SELECT>
		
		<SELECT name="3" size="1">
			<OPTION value="1">1</OPTION>
			<OPTION value="2">2</OPTION>
			<OPTION value="3">3</OPTION>
			<OPTION value="4">4</OPTION>
			<OPTION value="5">5</OPTION>
		</SELECT>
		
		<SELECT name="4" size="1">
			<OPTION value="1">1</OPTION>
			<OPTION value="2">2</OPTION>
			<OPTION value="3">3</OPTION>
			<OPTION value="4">4</OPTION>
			<OPTION value="5">5</OPTION>
		</SELECT>
		
		<SELECT name="5" size="1">
			<OPTION value="1">1</OPTION>
			<OPTION value="2">2</OPTION>
			<OPTION value="3">3</OPTION>
			<OPTION value="4">4</OPTION>
			<OPTION value="5">5</OPTION>
		</SELECT>
		
		<input type="submit"  name="act_soumettre" value="Valide"/>
		</form>
        
		<form method="post" action="<?= base_url();?>index.php/users_c/deconnexion" >
		<input type="submit"  name="act_soumettre" value="Deconnexion"/>
		</form>
		</p>
	</div>
	<p class="footer">DUT info Belfort <strong>{elapsed_time}</strong> seconds</p>
</div>

</body>
</html>