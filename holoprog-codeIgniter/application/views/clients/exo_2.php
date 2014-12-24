<div class = "row">
    <br>
    <br>
</div>
<div class = "row">
    <div class="col-md-1"></div>
    <div class="col-md-3">
        <iframe width="320" height="315" src="//www.youtube.com/embed/gHL9HCKloAs" frameborder="0" allowfullscreen></iframe>
    </div>
    <div class="col-md-8">
        <form method="post" action="<?php echo base_url();?>index.php/client_c/correctionExo/2" >
            <section id="connected">
                <div class="col-md-4 list-reponse">
                    <ul class="connected list">
                        <li><img src="<?php echo base_url();?>img/bloc_debut.png"></li>

                        <div class="row"></div>
                        <li>
                            <SELECT class="form-control" name="4" size="1">
                                <OPTION value="1">1</OPTION>
                                <OPTION value="2">2</OPTION>
                                <OPTION value="3">3</OPTION>
                             <!--  <OPTION value="4">4</OPTION>
                                <OPTION value="5">5</OPTION>-->
                            </SELECT>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4 list-question">
                    <ul class="connected list no2">
                        <li><div class="bloc_condition"><SELECT class="" name="0" >
                                    <OPTION value="1">Ouvrir la vanne amont</OPTION>
                                    <OPTION value="2">Ouvrir la porte amont</OPTION>
                                    <OPTION value="3">3</OPTION>
                                    <!--<OPTION value="1">1</OPTION>
                                    <OPTION value="2">2</OPTION>
                                    <OPTION value="3">3</OPTION>
                                    <OPTION value="4">4</OPTION>
                                    <OPTION value="5">5</OPTION>-->
                                </SELECT></div></li>

                        <li><SELECT class="form-control" name="1" size="1">
                                <OPTION value="1">1</OPTION>
                                <OPTION value="2">2</OPTION>
                                <OPTION value="3">3</OPTION>
                               <!-- <OPTION value="4">4</OPTION>
                                <OPTION value="5">5</OPTION>-->
                            </SELECT></li>

                        <div class="row"></div>

                        <li><SELECT class="form-control" name="2" size="1">
                                <OPTION value="1">1</OPTION>
                                <OPTION value="2">2</OPTION>
                                <OPTION value="3">3</OPTION>
                                <!-- <OPTION value="4">4</OPTION>
                                <OPTION value="5">5</OPTION>-->
                            </SELECT></li>

                        <div class="row"></div>

                        <li><SELECT class="form-control" name="3" size="1">
                                <OPTION value="1">1</OPTION>
                                <OPTION value="2">2</OPTION>
                                <OPTION value="3">3</OPTION>
                                <!-- <OPTION value="4">4</OPTION>
                               <OPTION value="5">5</OPTION>-->
                            </SELECT></li>

                        <li><SELECT class="form-control" name="5" size="1">
                                <OPTION value="1">1</OPTION>
                                <OPTION value="2">2</OPTION>
                                <OPTION value="3">3</OPTION>
                            </SELECT></li>

                </div>
            </section>
            <div class="row"></div>
            <div class="col-lg-2">
                <input type="submit"  name="act_soumettre" value="Valide"/>
            </div>
        </form>
        <form method="post" action="<?php echo base_url();?>index.php/users_c/deconnexion" >
            <input type="submit"  name="act_soumettre" value="Deconnexion"/>
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