<div class="main clearfix">
    <nav id="menu" class="nav">
        <ul>
            <li>
                <a href="<?php echo base_url();?>index.php/prof_c/index">
								<span class="icon">
									<i aria-hidden="true" class="icon-home"></i>
								</span>
                    <span>Home</span>
                </a>
            </li>


            <li>
                <a href="#">
								<span class="icon">
									<i aria-hidden="true" class="icon-portfolio"></i>
								</span>
                    <span>Documentations</span>
                </a>
            </li>
            <li>

            </li>
            <li>
                <a href="#">
								<span class="icon">
									<i aria-hidden="true" class="icon-team"></i>
								</span>
                    <span>A propos</span>
                </a>
            </li>

            <?php foreach($listeClasses as $classe): ?>
                <li>
                    <a href="<?php echo base_url();?>index.php/prof_c/voirClasse/<?php echo $classe->id_classe; ?>">
                        <span class="icon">
                            <i aria-hidden="true" class="icon"></i>
                        </span>
                        <span ><?php echo $classe->nom_classe; ?></span>
                    </a>
                </li>
            <?php endforeach; ?>
            <li>
                <a href="<?php echo base_url(); ?>index.php/users_c/deconnexion">
								<span class="icon">
									<i aria-hidden="true" class="icon"></i>
								</span>
                    <span>Déconnexion</span>
                </a>
            </li>
        </ul>
    </nav>



    <br>



</div>


<script>
    //  The function to change the class REDUX FRAMEWORK
    var changeClass = function (r,className1,className2) {
        var regex = new RegExp("(?:^|\\s+)" + className1 + "(?:\\s+|$)");
        if( regex.test(r.className) ) {
            r.className = r.className.replace(regex,' '+className2+' ');
        }
        else{
            r.className = r.className.replace(new RegExp("(?:^|\\s+)" + className2 + "(?:\\s+|$)"),' '+className1+' ');
        }
        return r.className;
    };

    //  Creating our button in JS for smaller screens
    var menuElements = document.getElementById('menu');
    menuElements.insertAdjacentHTML('afterBegin','<button type="button" id="menutoggle" class="navtoogle" aria-hidden="true"><i aria-hidden="true" class="icon-menu"> </i> Menu</button>');

    //  Toggle the class on click to show / hide the menu
    document.getElementById('menutoggle').onclick = function() {
        changeClass(this, 'navtoogle active', 'navtoogle');
    }


    document.onclick = function(e) {
        var mobileButton = document.getElementById('menutoggle'),
            buttonStyle =  mobileButton.currentStyle ? mobileButton.currentStyle.display : getComputedStyle(mobileButton, null).display;

        if(buttonStyle === 'block' && e.target !== mobileButton && new RegExp(' ' + 'active' + ' ').test(' ' + mobileButton.className + ' ')) {
            changeClass(mobileButton, 'navtoogle active', 'navtoogle');
        }
    }
</script>
