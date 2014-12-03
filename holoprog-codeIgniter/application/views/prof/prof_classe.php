
    <table style ="width:50%;margin-left:20%;" class="table table-bordered" >
        <caption>Liste de vos eleves</caption>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Date de naissance</th>
                <th>Moyenne</th>
            </tr>
            <?php if($classe != null): ?>
                <?php foreach ($classe as $r): ?>
                    <tr>
                        <td><?= $r->nom_eleve; ?></td>
                        <td><?= $r->prenom_eleve; ?></td>
                        <td><?= date("d-m-Y",strtotime($r->date_de_naissance)); ?></td>
                        <td><?= $r->moyenne_eleve; ?></td>
                    <?php if(!isset($detailsEleve)): ?>
                        <td style="text-align: center;"><a href="<?= base_url();?>index.php/client_c/voirEleveFromProf/<?= $r->id_eleve; ?>/<?= $r->id_classe; ?>">Show</a></td>
                    <?php endif; ?>
                    <?php if(isset($detailsEleve) and $detailsEleve->id_eleve==$r->id_eleve): ?>
                        <td style="text-align: center;"><a href="<?= base_url();?>index.php/prof_c/voirClasse/<?= $r->id_classe; ?>">Hide</a></td>
                        </tr>
                        <tr >
                        <td colspan="4">
                            <?php for($i=0 ; $i<$detailsEleve->niveau_atteint ;$i++): ?>
                                Exercice <?=$i+1 ?><br>
                                Moyenne exercice :<br>
                                Moyenne de classe :<br><br>
                            <?php endfor; ?>
                        </td>

                    <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
    </table>

        <!-- TABLEAU MOYENNE -->

    <table style ="width:50%;margin-left:20%;" class="table table-bordered" >
        <caption>Statistiques</caption>
        <tr>
            <th></th>
            <th>Note</th>
            <th rowspan="2">Éleve</th>

        </tr>
        <tr>
            <td>Moyenne de classe</td>
            <td><?= $stats['moyenne_classe']; ?></td>
        </tr>
        <tr>
            <td>Meilleur élève</td>
            <td><?= $stats['best']->moyenne_eleve; ?></td>
            <td><?= $stats['best']->nom_eleve; ?></td>
        </tr>
        <tr>
            <td>Moins bon élève</td>
            <td><?= $stats['worst']->moyenne_eleve; ?></td>
            <td><?= $stats['worst']->nom_eleve; ?></td>
        </tr>
    </table>


    <!-- QUARTILES ET MEDIANE -->
    <div style ="width:50%;margin-left:20%;">
        <table style="width:30%;" class="table table-bordered">
            <tr>
                <th>1er quartile</th>
            </tr>
            <?php foreach($stats['quartile1'] as $line): ?>
                <tr>
                    <td><?= $line->prenom_eleve." ".$line->nom_eleve." - ".$line->moyenne_eleve."\\20"; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>

        <table style="width:30%;margin-left:35%;" class="table table-bordered">
            <tr>
               <th>Médiane</th>
            </tr>
            <?php foreach($stats['mediane'] as $line): ?>
               <tr>
                   <td><?= $line->prenom_eleve." ".$line->nom_eleve." - ".$line->moyenne_eleve."\\20"; ?></td>
               </tr>
            <?php endforeach; ?>
        </table>

        <table style="width:30%;margin-left:70%;"  class="table table-bordered">
            <tr>
                <th>3ème quartile</th>
            </tr>
            <?php foreach($stats['quartile3'] as $line): ?>
                <tr>
                    <td><?= $line->prenom_eleve." ".$line->nom_eleve." - ".$line->moyenne_eleve."\\20"; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>

    </div>
    <p style="margin-left:20%;">Ecart-type :<?= $ecarttype; ?></p>

    <div>
    </div>
    Graphique



