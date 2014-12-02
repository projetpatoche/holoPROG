<nav class="navbar navbar-default" role="navigation">

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <li>
                <a href="<?=base_url();?>/index.php/prof_c">Vos classes</a>
            </li>
            <?php foreach($listeClasses as $classe): ?>
                <li>
                    <a href="<?= base_url();?>/index.php/prof_c/voirClasse/<?= $classe->id_classe; ?>"><?= $classe->nom_classe; ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</nav>