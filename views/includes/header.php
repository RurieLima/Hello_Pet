<!-- header menu de navegación -->
<nav class="navbar p-5 columns" id="navBar" role="navigation" aria-label="main navigation">    
    <div class="p-4 mt-3 navbar-brand column columns is-mobile">  
        <div class="column is-one-fifth">
            <a class="navbar-item" href="index.php">
                <img src="views\img\logohpet.png" class="mx-3">
            </a>   
        </div>
        <div class="column is-one-fifth">
            <?php if(empty($_SESSION['login'])){ ?>                            
                <?php if(strpos($_SERVER["REQUEST_URI"], "m=admin")){ ?>
                    <a class="navbar-item button is-grey is-light tooltip" href="index.php"><i class="material-icons">backspace</i>
                        <span class="tooltiptext mb-3">Back</span>
                    </a>
                <?php
                }elseif(strpos($_SERVER["REQUEST_URI"], "m=register")){ ?>
                    <a class="navbar-item button is-grey is-light tooltip" href="index.php"><i class="material-icons">backspace</i>
                        <span class="tooltiptext mb-3">Back</span>
                    </a>                        
                <?php  }elseif(!strpos($_SERVER["REQUEST_URI"], "m=") || strpos($_SERVER["REQUEST_URI"], "m=logout")){ ?>
                <a href="index.php?m=admin" class="navbar-item button p-2 is-warning is-light tooltip">
                    <strong><span class="material-icons">admin_panel_settings</span></strong>
                    <span class="tooltiptext mb-2">Admin panel</span>
                </a>   
                <?php  
                }elseif(strpos($_SERVER["REQUEST_URI"], "m=insert")){ ?>
                    <a class="navbar-item button is-grey is-light tooltip" href="index.php"><i class="material-icons">backspace</i>
                        <span class="tooltiptext mb-3">Back</span>
                    </a>   
                <?php  } 
            }else{ ?>
                <a href="index.php?m=logout" class="navbar-item button is-grey is-light is-small tooltip">
                    <i class="material-icons">logout</i>
                    <span class="is-block">Exit</span>
                    <span class="tooltiptext mb-2">Logout</span>
                </a> 
            <?php }
            ?>     
        </div>
    </div>   
    <div class="column columns is-vcentered is-mobile is-centered px-3 mx-3">
        <?php if(!empty($_SESSION['login'])){ ?>    
                <?php if(strpos($_SERVER["REQUEST_URI"], "m=profile")){ ?>
                    <div class="navbar-item">
                        <a href="index.php" class="button is-light has-text-danger my-3 tooltip">
                            <span class="material-icons">dashboard</span>
                            <span class="is-block">View all</span>
                            <span class="tooltiptext mb-2">See all the pets</span>
                        </a>
                    </div>
        <?php }elseif(strpos($_SERVER["REQUEST_URI"], "m=contact")){ ?>
            <div class="navbar-item">
                <a href="index.php" class="button is-light has-text-danger my-3 tooltip">
                    <span class="material-icons">dashboard</span>
                    <span class="is-block">View alls</span>
                    <span class="tooltiptext mb-2">See all the pets</span>
                </a>
            </div>
            <div class="navbar-item">
                <a href="index.php?m=profile" class="button is-light has-text-danger my-3 tooltip">
                    <span class="material-icons">settings</span>
                    <span class="is-block">Profile</span>
                    <span class="tooltiptext mb-2">Manage profile</span>
                </a>
            </div>                              
            <?php 
            }elseif(strpos($_SERVER["REQUEST_URI"], "m=info")){ ?>
                <div class="navbar-item is-inline">
                    <a href="index.php" class="button is-light has-text-danger my-3 tooltip">
                        <span class="material-icons">dashboard</span>
                        <span class="is-block">View all</span>
                        <span class="tooltiptext mb-2">See all the pets</span>
                    </a>
                </div>
                <div class="navbar-item is-inline">
                    <a href="index.php?m=profile" class="button is-light has-text-danger my-3 tooltip">
                        <span class="material-icons">settings</span>
                        <span class="is-block">Profile</span>
                        <span class="tooltiptext mb-2">Manage profile</span>
                    </a>
                </div>    
            <?php 
            }elseif(!strpos($_SERVER["REQUEST_URI"], "m=profile")){ ?>
                <div class="navbar-item">
                    <a href="index.php?m=profile" class="button is-light has-text-danger my-3 tooltip">
                        <span class="material-icons">settings</span>
                        <span class="is-block">Profile</span>
                        <span class="tooltiptext mb-2">Manage profile</span>
                    </a>
                </div>     
            <?php }
            }
        ?>             
    </div>
</nav>

