<h1 style="text-align:center">Statistique</h1>
<br>
<?php if (empty($donnee)):?>
    <b style="color:#ff0000;">Vous n'avez essayé aucun exercice</b>
<?php else: ?>
    <td>
        <?php foreach($donnee as $unExo): ?>

            <b>Exercice <?php echo $unExo->id_exercice; ?></b><br>
            Moyenne exercice : <?php echo $unExo->moyenne_exo; ?><br>
            Moyenne de classe : <?php echo number_format($unExo->moyenne_exo_classe,2); ?><br>
            <?php exo_m::detailsExosByEleve($unExo->id_eleve, $unExo->id_exercice) ?>
            <br>
        <?php endforeach; ?>
    </td>
<?php endif; ?>