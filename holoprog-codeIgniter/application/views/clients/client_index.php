
<div class="row">
    <div class="text-center">
        <h1 class="alamain">Bonjour <?php echo $this->session->userdata('nom_eleve');?></h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12"><br><br></div>
</div>
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8 text-center">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                <li data-target="#carousel-example-generic" data-slide-to="3"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <img src="<?php echo base_url();?>img/banque_exercice_carousel.jpg" alt="...">
                    <div class="carousel-caption">
                        <h3 class="alamain">Bienvenue sur la banque d'exercices<br>
                        Voici les derniers exercices ajoutés</h3>
                    </div>
                </div>
                <div class="item" data-toggle="modal"
                     data-target="#exercice1">
                    <img src="<?php echo base_url();?>img/barriere_carousel.jpg" alt="...">
                    <div class="carousel-caption">
                        <h3 class="alamain">Exercice 1: barrière automatisée</h3>
                    </div>
                </div>
                <div class="item">
                    <img src="<?php echo base_url();?>img/barriere_carousel.jpg" alt="...">
                    <div class="carousel-caption">
                        <h3 class="alamain">Exercice 2: barrière automatisée niveau 2</h3>
                    </div>
                </div>
                <div class="item" data-toggle="modal"
                     data-target="#exercice1">
                    <img src="<?php echo base_url();?>img/ecluse_carousel.jpg" alt="...">
                    <div class="carousel-caption">
                        <h3 class="alamain">Exercice 3: Problème d'écluse</h3>
                    </div>
                </div>
            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
        </div> <!-- Carousel -->
    </div>
</div>

<div style="margin-left:42%;margin-top:3%;">
<?php foreach ($exercice as $r):?>
<div class="row"> <!-- Boutons exercices -->
    <div class="col-md-1"></div>
	<div class="col-md-8">

        <button class="btn btn-primary btn-lg" data-toggle="modal"
                data-target="#exercice<?php echo $r->id_exercice?>">
            Exercice <?php echo $r->id_exercice?>
        </button><br><br>

    </div>
</div> <!-- Boutons exercices -->

<!-- Modal exercice -->
<div class="modal fade" id="exercice<?php echo $r->id_exercice?>" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close"
                    data-dismiss="modal" aria-hidden="true">
                    &times;
              </button>
                <h4 class="modal-title" id="myModalLabel">
                    Exercice <?php echo $r->id_exercice?>
                </h4>
            </div>
            <div class="modal-body">
                Exercice sur le fonctionnement d'une barrière automatisée: niveau facile.
                <img src="<?php echo base_url();?>img/etoile<?php echo $r->difficulte?>.jpg" alt="...">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default"
                        data-dismiss="modal">Fermer
                </button>
                <a class="btn btn-primary" href="<?php echo base_url(); ?>index.php/client_c/Exo/<?php echo $r->id_exercice?>">Commencer l'exercice <?php echo $r->id_exercice?></a><br>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>
<?php endforeach; ?>
</div>