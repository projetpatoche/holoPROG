<h1 style="text-align:center; font-size: 30px; font-family: alamain">Résultats</h1>

<div id="bloc_statistique">
    <?php if ($exo==null):?>
        <b style="color:#ff0000;">Vous n'avez essayé aucun exercice</b>
    <?php else: ?>
            <span class="stat_eleve_titre">Moyenne generale : <?php echo $generale->moyenne_eleve; ?></span>
            <br><br>

            <?php foreach($exo as $unExo): ?>
            <span style="display:block;margin-left:19%;">
                <b style="font-size: 18px">Exercice <?php echo $unExo->id_exercice; ?></b><br>
                Moyenne exercice : <?php echo $unExo->moyenne_exo; ?><br>
                Moyenne de classe : <?php echo number_format($unExo->moyenne_exo_classe,2); ?><br>
                <?php exo_m::detailsExosByEleve($unExo->id_eleve, $unExo->id_exercice) ?>
                <br>
            </span>
            <?php endforeach; ?>
    <?php endif; ?>
</div>