<!-- header menu de navegación -->
<nav class="navbar px-2 py-3" id="navBar" role="navigation" aria-label="main navigation">
    <div class="navbar-brand p-1">
        <a class="navbar-item" href="index.php">
            <img src="views\img\logohpet.png">
        </a>
        <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbar">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>
    <div class="navbar-menu p-2">
        <div class="navbar-end">
            <div class="navbar-item px-3">
                <div class="buttons mt-3">                
                    <?php if(empty($_SESSION['login'])){ ?>                            
                        <?php if(!strpos($_SERVER["REQUEST_URI"], "m=admin")){ ?>
                            <a href="index.php?m=admin" class="button p-2 is-danger tooltip mx-2">
                                <strong><span class="material-icons">admin_panel_settings</span></strong>
                                <span class="tooltiptext mb-2">Admin panel</span>
                            </a> 
                        <?php } 
                        if(!strpos($_SERVER["REQUEST_URI"], "m=register")){ ?>   
                        <a href="index.php?m=register" class="button p-2 is-danger tooltip mx-2">
                            <strong><span class="material-icons">app_registration</span></strong>
                            <span class="tooltiptext mb-2">Register</span>
                        </a>             
                    <?php
                        }
                    }else{ ?>
                        <p class="mb-2 m-3 tooltip">Welcome <span class="has-text-weight-bold"><?= $_SESSION['name'] ?><span class="p-2 m-1 material-icons has-text-link spanIconHeader">thumb_up</span><span class="badgeHeader is-size-7 px-2 has-background-danger-dark has-text-white has-text-weight-bold"><?php echo $_SESSION["like"]; ?></span></span><span class="tooltiptext mb-2" id="tootipTextHeader">your likes</span></p>
                        <?php if(strpos($_SERVER["REQUEST_URI"], "m=gallery")){ ?>
                        <a href="index.php" class="button is-light has-text-danger my-3 tooltip">
                            <span class="material-icons">dashboard</span>
                            <span class="tooltiptext mb-2">View Pets</span>
                        </a>
                        <a href="index.php?m=profile" class="button is-light has-text-danger my-3 tooltip">
                            <span class="material-icons">settings</span>
                            <span class="tooltiptext mb-2">Profile pet</span>
                        </a>
                        <?php }elseif(strpos($_SERVER["REQUEST_URI"], "m=profile")){ ?>
                            <a href="index.php" class="button is-light has-text-danger my-3 tooltip">
                                <span class="material-icons">dashboard</span>
                                <span class="tooltiptext mb-2">View Pets</span>
                            </a>
                            <a href="index.php?m=gallery" class="button is-light has-text-danger my-3 tooltip">
                                <span class="material-icons">collections</span>
                                <span class="tooltiptext mb-2">Gallery</span>
                            </a>
                        <?php }elseif(strpos($_SERVER["REQUEST_URI"], "m=info")){ ?>
                            <a href="index.php" class="button is-light has-text-danger my-3 tooltip">
                                <span class="material-icons">dashboard</span>
                                <span class="tooltiptext mb-2">View Pets</span>
                            </a>
                            <a href="index.php?m=gallery" class="button is-light has-text-danger my-3 tooltip">
                                <span class="material-icons">collections</span>
                                <span class="tooltiptext mb-2">Gallery</span>
                            </a>
                            <a href="index.php?m=profile" class="button is-light has-text-danger my-3 tooltip">
                                <span class="material-icons">settings</span>
                                <span class="tooltiptext mb-2">Profile pet</span>
                            </a>
                        <?php }elseif(!strpos($_SERVER["REQUEST_URI"], "m=profile" && !strpos($_SERVER["REQUEST_URI"], "m=gallery"))){ ?>
                            <a href="index.php?m=profile" class="button is-light has-text-danger my-3 tooltip">
                                <span class="material-icons">settings</span>
                                <span class="tooltiptext mb-2">Profile pet</span>
                            </a>
                            <a href="index.php?m=gallery" class="button is-light has-text-danger my-3 tooltip">
                                <span class="material-icons">collections</span>
                                <span class="tooltiptext mb-2">Gallery</span>
                            </a>
                        <?php } ?>
                        <a href="index.php?m=logout" class="button is-danger is-light my-3 tooltip">
                            <i class="material-icons">logout</i>
                            <span class="tooltiptext mb-2">Logout</span>
                        </a> 
                    <?php }
                    ?>                
                </div>
            </div>
        </div>
    </div>
</nav>
