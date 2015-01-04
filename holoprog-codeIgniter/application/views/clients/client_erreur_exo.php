<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-3">
        <img src="<?php echo base_url(); ?>img/erreur_exo.png">
    </div>
    <div class="col-md-6">
        <div class="row">
            <h2 class="alamain">Attention il semble que tu as fait <?php echo $nberreur?></h2><br>
            <h2 class="alamain"><?php if($nberreur > 1) echo("erreurs.");
                else echo("erreur.");?></h2><br><br>
            <h2 class="alamain">Relis bien l'exercice.</h2><br>
        </div>
        <div class="row"><br>
            <a class="btn btn-lg btn-info" href="javascript:history.go(-1)">Retour à l'exercice</a>
        </div>
    </div>
</div>