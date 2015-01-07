
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

<div class="row"> <!-- Boutons exercices -->
    <div class="col-md-1"></div>
    <div class="col-md-8">

        <button class="btn btn-primary btn-lg" data-toggle="modal"
                data-target="#exercice1">
            Exercice 1
        </button><br><br>
        <button class="btn btn-primary btn-lg" data-toggle="modal"
                data-target="#exercice2">
            Exercice 2
        </button><br><br>
        <button class="btn btn-primary btn-lg" data-toggle="modal"
                data-target="#exercice3">
            Exercice 3
        </button><br><br>

    </div>
</div> <!-- Boutons exercices -->


<!-- Modal exercice 1 -->
<div class="modal fade" id="exercice1" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close"
                        data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    Exercice 1
                </h4>
            </div>
            <div class="modal-body">
                Exercice sur le fonctionnement d'une barrière automatisée: niveau facile.
                <img src="<?php echo base_url();?>img/etoile1.jpg" alt="...">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default"
                        data-dismiss="modal">Fermer
                </button>
                <a class="btn btn-primary" href="<?php echo base_url(); ?>index.php/client_c/Exo/1">Commencer l'exercice 1</a><br>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>

<!-- Modal exercice 2 -->
<div class="modal fade" id="exercice2" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close"
                        data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    Exercice 2
                </h4>
            </div>
            <div class="modal-body">
                Exercice sur le fonctionnement d'une barrière automatisée: niveau moyen.<br>
                L'ordre des logigrammes est à déterminer.
                <img src="<?php echo base_url();?>img/etoile2.jpg" alt="...">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default"
                        data-dismiss="modal">Fermer
                </button>
                <a class="btn btn-primary" href="<?php echo base_url(); ?>index.php/client_c/Exo/2">Commencer l'exercice 2</a><br>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>

<!-- Modal exercice 3 -->
<div class="modal fade" id="exercice3" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close"
                        data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    Exercice 3
                </h4>
            </div>
            <div class="modal-body">
                Exercice classique de l'écluse niveau moyen.
                <img src="<?php echo base_url();?>img/etoile2.jpg" alt="...">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default"
                        data-dismiss="modal">Fermer
                </button>
                <a class="btn btn-primary" href="<?php echo base_url(); ?>index.php/client_c/Exo/3">Commencer l'exercice 3</a><br>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>
