
    <div>

        <h1>Bonjour
		<?php ECHO $this->session->userdata('nom_professeur');?>    </h1>

        <p><form method="post" action="<?= base_url(); ?>index.php/users_c/deconnexion" >
		<input type="submit"  name="act_soumettre" value="Deconnexion"/>
		</form></p>
		
	</div>