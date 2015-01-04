<div class = "row">
    <br>
    <br>
</div>
<div class = "row">
    <div class="col-md-3"></div>
    <div class="col-md-3">
        <img src="<?php echo base_url();?>img/exercice/barriere/barriere_consignes.jpg">
    </div>
    <div class="col-md-6">
        <form method="post" action="<?php echo base_url();?>index.php/client_c/correctionExo/1" >
            <div class="">
                <div class="barriere_bloc_1">
                    <SELECT class="select_barriere_bloc_1" name="0">
                        <OPTION value="1">Début</OPTION>
                        <OPTION value="2">Fin</OPTION>
                        <OPTION value="3">Démarrage</OPTION>
                    </SELECT>
                </div>

                <div class="barriere_bloc_2">
                    <SELECT class="select_barriere_bloc_2" name="1" >
                        <OPTION value="1">Code valide ?</OPTION>
                        <OPTION value="2">Code invalide ?</OPTION>
                        <OPTION value="3">Ouverture</OPTION>
                    </SELECT></div></li>

                <div class="barriere_bloc_3">
                    <SELECT class="select_barriere_bloc_3" name="2" >
                        <OPTION value="1">Ouvrir barrière + allumer voyant</OPTION>
                        <OPTION value="2">Fermer barrière</OPTION>
                        <OPTION value="3">Allumer le voyant</OPTION>
                    </SELECT></div>
                <div class="barriere_bloc_4">
                    <SELECT class="select_barriere_bloc_4" name="3" >
                        <OPTION value="1">Allumer voyant</OPTION>
                        <OPTION value="2">Voiture passée ?</OPTION>
                        <OPTION value="3">Fermer barrière</OPTION>
                    </SELECT></div>
                <div class="barriere_bloc_5">
                    <SELECT class="select_barriere_bloc_5" name="4" >
                        <OPTION value="1">Voiture passée</OPTION>
                        <OPTION value="2">Eteindre voyant</OPTION>
                        <OPTION value="3">Fermer barrière + éteindre voyant</OPTION>
                    </SELECT></div>

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