

<div class="container">
    <section id="content">
        <?php if($titre=="connexion"):?>
        <h1 style="font-family: alamain;font-size:36px">HoloProg</h1>

        <?php echo form_open('users_c/aff_connexion'); ?>
            <h1>Connexion</h1>
            <div>
                <input type="text" name="login" value="<?php echo set_value('login');?>" placeholder="Identifiant" required="" id="username" />
            </div>
            <div>
                <input type="password" name="pass"  placeholder="Mot de passe" required="" id="password" />
                <?php echo form_error('pass','<span class="error">',"</span>");?>
                <?php if(isset($erreur))echo '<span class="error">'.$erreur."</span>";?>
            </div>
            <div>
                <input type="submit" value="Se connecter" />
                <?php echo anchor('users_c/inscriptionUsers','Inscrivez vous!')?>


            </div>
        <?php echo form_close(); ?>
        <?php endif?>
        <?php if($titre=="deconnexion"):?>
            <?php echo form_open('users_c/deconnexion'); ?>
            <input type="submit" value="deconnexion" />
            <?php echo form_close(); ?>
        <?php endif?>

    </section>
</div>