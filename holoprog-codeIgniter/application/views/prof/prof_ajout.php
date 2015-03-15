<script type="text/javascript">
	function ajoutSelect(nb){
		if (nb.length==0){
			document.getElementById("select").innerHTML="";
			return;
		}
		if (nb>10){
			document.getElementById("nb").value="10";
			nb=10;
		}
		select="";
		
		for(i=1;i<=nb;i++){
			select+='Select '+i+' : </br><input type="text" name="'+i+'01"/></br><input type="text" name="'+i+'02"/></br><input type="text" name="'+i+'03"/></br>';
			select+='<INPUT type= "radio" name="'+i+'" value="1" checked> 1<INPUT type= "radio" name="'+i+'" value="2"> 2<INPUT type= "radio" name="'+i+'" value="3"> 3</br></br>';
		}
		document.getElementById("select").innerHTML=select;
	}
</script>
<form method="post" action="<?php echo base_url();?>index.php/prof_c/ajoutImage" enctype="multipart/form-data">
	Nombre de select : <input type="text" id="nb" value="1" name="nbSelect" pattern="[0-9]{1,2}" onkeyup="ajoutSelect(this.value)"/><br />
	Image des exercices : <input type="file" name="icone" /><br />
	Image d'enonce : <input type="file" name="enonce" /><br />
	difficulte : <select name="difficulte" >
		<OPTION value="1">1</OPTION>
		<OPTION value="2">2</OPTION>
		<OPTION value="3">3</OPTION>
	</select>
	<div id="select"></div>
	<button type="submit" name="act_soumettre" value="Valide"/> Valider</button>
</form>
