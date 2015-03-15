<div class = "row">
    <br>
    <br>
</div>
<div class = "row">
    <div class="col-md-3"></div>
    <div class="col-md-3">
        <img src="<?php echo $exercice->image_enonce?>">
    </div>
    
     <div class="col-md-6">
        <form method="post" action="<?php echo base_url();?>index.php/client_c/correctionExo/<?php echo $exercice->id_exercice?> " >
            <div class="">
			<?php if($exercice->difficulte==2){?>
			<ul class="sortable">
			<?php } ?>
				<?php for($i=0;$i<$exercice->taille_exo;$i++){?>
					<div class="barriere_bloc_1">
						<SELECT class="select_barriere_bloc_1" name="<?php echo $i ?>">
							<OPTION value="1"><?php echo $select[''.$i.''][0]?></OPTION>
							<OPTION value="2"><?php echo $select[''.$i.''][1]?></OPTION>
							<OPTION value="3"><?php echo $select[''.$i.''][2]?></OPTION>
						</SELECT>
						<img src="<?php echo $select[''.$i.'']['img']?>">
						
					</div>
				<?php } ?>
			<?php if($exercice->difficulte==2){?>
			</ul>
			<?php } ?>
            </div>

            <div class="row"></div>
            <div class="col-md-6">
                <br><br>
                <button type="submit" class="btn-success btn btn-large btn-block btn-primary" name="act_soumettre" value="Valide"/> Valider</button>
                <br><br>
            </div>
        </form>
    </div>
</div>

<script>
    $(function() {
        $('.sortable').sortable();
        $('.handles').sortable({
            handle: 'span'
        });
        $('.connected').sortable({
            connectWith: '.connected'
        });
        $('.exclude').sortable({
            items: ':not(.disabled)'
        });
    });
</script>
