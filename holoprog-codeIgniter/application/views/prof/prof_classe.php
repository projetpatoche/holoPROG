
<style>
    caption{
        font-size:30px;
    }


</style>
<div class="row" style="font-size:15px;" >
    <div>
    <table style ="width:50%;margin-left:20%;" class="table table-bordered" >
        <caption>Liste des élèves</caption>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Moyenne</th>
        </tr>
        <?php if($classe != null): ?>
            <?php foreach ($classe as $r): ?>
                <tr>
                <td><?php echo $r->nom_eleve; ?></td>
                <td><?php echo $r->prenom_eleve; ?></td>
                <td><?php if($r->moyenne_eleve==null) echo "<span style=\"font-style:italic;\">Aucune données enregistrées</span>"; else echo $r->moyenne_eleve; ?></td>


                <?php if(!isset($detailsEleve) and eleve_m::aFaitUnExo($r->id_eleve)): ?>
                    <td style="text-align: center;"><a href="<?php echo base_url();?>index.php/client_c/voirEleveFromProf/<?php echo $r->id_eleve; ?>/<?php echo $r->id_classe; ?>">
                            Show</a></td>
                <?php endif; ?>

                <?php if(isset($detailsEleve) and $detailsEleve[0]->id_eleve==$r->id_eleve): ?>

                    <!-- verification de l'existence du details Elev eet spécification pour savoir de quel élève on parle -->
                    <td style="text-align: center;"><a href="<?php echo base_url();?>index.php/prof_c/voirClasse/<?php echo $r->id_classe; ?>">Hide</a></td>
                    </tr>
                    <tr >

                    <td style="text-align:left;" colspan="4">
                        <?php foreach($detailsEleve as $unExo): ?>
                            <?php if($unExo->id_eleve==$r->id_eleve): ?>
                                Exercice <?php echo $unExo->id_exercice; ?><br>
                                Moyenne exercice :<?php echo $unExo->moyenne_exo; ?><br>
                                Moyenne de classe :<?php echo $unExo->moyenne_exo_classe; ?><br><br>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </td>

                <?php endif; ?>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </table>
    </div>
    <br><br>


    <!-- TABLEAU MOYENNE -->
    <div>
    <table style ="width:50%;margin-left:20%;" class="table table-bordered" >
        <caption>Statistiques</caption>
        <tr>
            <th></th>
            <th>Note</th>
            <th style="vertical-align: middle;" rowspan="2">Éleve</th>

            </tr>
            <tr>
                <td>Moyenne de classe</td>
                <td><?php if($stats['moyenne_classe']==null) echo "<span style=\"font-style:italic;\">Aucune données enregistrées</span>";
                    else echo number_format($stats['moyenne_classe'],2); ?></td>
            </tr>
            <tr>
                <td>Meilleur élève</td>
                <td><?php if($stats['best']==null) echo "<span style=\"font-style:italic;\">Aucune données enregistrées</span>";
                    else  echo $stats['best']->moyenne_eleve; ?></td>
                <td><?php if($stats['best']==null) echo "<span style=\"font-style:italic;\">Aucune données enregistrées</span>";
                    else  echo $stats['best']->nom_eleve; ?></td>
            </tr>
            <tr>
                <td>Moins bon élève</td>
                <td><?php if($stats['worst']==null) echo "<span style=\"font-style:italic;\">Aucune données enregistrées</span>";
                    else  echo $stats['worst']->moyenne_eleve; ?></td>
                <td><?php if($stats['worst']==null) echo "<span style=\"font-style:italic;\">Aucune données enregistrées</span>";
                    else  echo $stats['worst']->nom_eleve; ?></td>
            </tr>
        </table>
    </div>

    <!-- QUARTILES ET MEDIANE -->

        <div class="row" style ="width:50%;margin-left:20%;">
            <div class="col-md-4">
                <table class="table table-bordered">
                    <tr>
                        <th>1er quartile</th>
                    </tr>
                    <?php if($stats['quartile1']==null): ?>
                    <tr><td><span style="font-style:italic;">Aucune données enregistrées</span></td></tr>
                    <?php else: ?>
                    <?php foreach($stats['quartile1'] as $line): ?>
                            <tr>
                            <td><?php echo $line->prenom_eleve." ".$line->nom_eleve." - ".$line->moyenne_eleve; ?></td>
                            </tr>
                    <?php endforeach; ?>
                    <?php endif; ?>

                </table>
            </div>

            <div class="col-md-4">
                <table class="table table-bordered">
                    <tr>
                        <th>Médiane</th>
                    </tr>
                    <?php if($stats['mediane']==null): ?>
                        <tr><td><span style="font-style:italic;">Aucune données enregistrées</span></td></tr>
                    <?php else: ?>
                        <?php foreach($stats['mediane'] as $line): ?>
                            <tr>
                                <td><?php echo $line->prenom_eleve." ".$line->nom_eleve." - ".$line->moyenne_eleve; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </table>
            </div>

            <div class="col-md-4">
                <table  class="table table-bordered">
                    <tr>
                        <th>3ème quartile</th>
                    </tr>
                    <?php if($stats['quartile3']==null): ?>
                        <tr><td><span style="font-style:italic;">Aucune données enregistrées</span></td></tr>
                    <?php else: ?>
                        <?php foreach($stats['quartile3'] as $line): ?>
                            <tr>
                                <td><?php echo $line->prenom_eleve." ".$line->nom_eleve." - ".$line->moyenne_eleve; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </table>
            </div>
        </div>

    <div>
        <?php if($ecarttype!=null): ?>
            <p style="margin-left:20%;">Ecart-type :<?php echo $ecarttype; ?></p>
        <?php endif; ?>
    </div>




