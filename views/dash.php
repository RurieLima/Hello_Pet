<?php
    require_once("includes/headDoc.php");
?>
<body>
    <main>  
        <section class="hero is-medium">
            <div class="hero-head">
                <?php
                    require_once("includes/header.php");
                ?>
            </div>
            <div class="hero-body py-1">
                <div class="container has-text-centered">
                    <div class="is-centered m-1 p-1">
                        <div class="panel has-background-white-ter">
                            <div class="panel-heading has-background-danger">       
                                <h1 class="title is-size-4 p-1">FIND YOUR MATCHPET!</h1>
                            </div>                          
                            <div id="divFilter" class="panel-tabs has-background-grey-dark mb-3">
                                <?php                    
                                if(!empty($_SESSION['name'])){ ?>
                                    <div class="column p-5">
                                        <div class="columns p-3">                                                            
                                            <div class="column">
                                                <a href="index.php" class="tooltip">
                                                    <span class="has-text-white has-text-weight-bold is-underlined p-2 <?php if(empty($_GET["m"])){ echo "has-background-dark is-italic";} ?>">All pets</span>
                                                    <span class="tooltiptext">All the pets</span>
                                                </a>
                                            </div>
                                            <div class="column">
                                                <a href="index.php?m=favorite" class="tooltip">
                                                    <span class="has-text-white has-text-weight-bold is-underlined p-2 <?php if(!empty($_GET["m"]) && $_GET["m"] == "favorite"){ echo "has-background-dark is-italic";} ?>">Favorite</span>
                                                    <span class="tooltiptext">Only the favorites</span>
                                                </a>
                                            </div>
                                            <div class="column">
                                                <a href="index.php?m=male" class="tooltip">
                                                    <span class="has-text-white has-text-weight-bold is-underlined p-2 <?php if(!empty($_GET["m"]) && $_GET["m"] == "male"){ echo "has-background-dark is-italic";} ?>">Male</span>
                                                    <span class="tooltiptext">Only the males</span>
                                                </a>
                                            </div>
                                            <div class="column">
                                                <a href="index.php?m=female" class="tooltip">
                                                    <span class="has-text-white has-text-weight-bold is-underlined p-2 <?php if(!empty($_GET["m"]) && $_GET["m"] == "female"){ echo "has-background-dark is-italic";} ?>">Female</span>
                                                    <span class="tooltiptext">Only the females</span>
                                                </a>
                                            </div>   
                                            <div class="column is-half">
                                                <form method="GET" action="">
                                                    <div class="field is-grouped">                                                   
                                                        <div class="m-1">
                                                            <input type="hidden" name="m" value="city">
                                                            <input class="input has-text-centered" name="find_city" type="text" placeholder="Enter the name city">
                                                        </div>
                                                        <div class="m-1">
                                                            <button type="submit" name="get_city" value="Search" class="tooltip button has-background-danger-light p-2">
                                                                <span class="material-icons">travel_explore</span>
                                                                <span class="tooltiptext mb-3">Search by city</span>
                                                            </button>                                                        
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>                                                                                                                                
                                        <?php 
                                        }
                                        ?>  
                                    </div>                                 
                                </div>  
                            </div>  
                            <!-- Message  -->
                            <?php                    
                                if(!empty($_SESSION['msg'])){ ?>
                                    <div class="my-3 p-3 has-background-white box">
                                        <p class="<?= $_SESSION['msgClass'] ?> has-text-weight-bold"><?= $_SESSION['msg'] ?></p> 
                                    </div>
                            <?php 
                                $_SESSION['msg'] = ""; 
                                $_SESSION['msgClass'] = ""; 
                            }
                            ?>
                            <div class="is-centered p-1">
                                <div class="columns is-multiline is-centered p-1 mb-3">
                                    <?php if(!empty($allData)){ 
                                        foreach($allData as $key => $value){ ?>  
                                        <div class="column is-3 is-offset-8 p-1 m-1">
                                            <div class="card my-3">
                                                <div class="card-header has-background-danger">
                                                    <p class="card-header-title card-header-name is-centered is-size-4"><?php echo $value["user_name"];?></p>                                        
                                                </div>
                                                <div class="card-content">                                                  
                                                        <div class="card-image">
                                                            <figure class="image has-text-centered">
                                                                <img src="<?php if(str_contains($value["user_img"], "https") == true){echo $value["user_img"];}else{echo "views/img/" .$value['user_img'];} ?>" alt="Placeholder image">
                                                            </figure>
                                                        </div>                                                 
                                                    <div>
                                                        <p class="card-content has-background-white-ter	my-3 p-1">
                                                            <?php if($value["user_gender"] == "Male"){
                                                                ?><span class="material-icons has-text-info has-text-weight-bold">male</span>&nbsp<span class="has-text-info has-text-weight-bold">Male</span> 
                                                            <?php ; }else { 
                                                                ?><span class="material-icons has-text-danger has-text-weight-bold">female</span>&nbsp<span class="has-text-danger has-text-weight-bold">Female</span> 
                                                            <?php
                                                            } ?>
                                                        </p>
                                                        <p class="card-content has-background-white-ter	my-3 p-1 has-text-weight-bold has-text-grey"><?php echo $value["user_breed"];?></p>                                        
                                                        <p class="card-content has-background-white-ter	my-3 p-1 has-text-weight-bold has-text-grey"><?php echo $value["user_city"];?></p>                                        
                                                    </div>                                                   
                                                </div>
                                                <div class="card-footer has-background-grey-dark px-5">
                                                    <div class="column">
                                                        <a href="index.php?m=info&name=<?php echo $value["user_name"]; ?>" class="tooltip p-1">
                                                            <span class="p-1 material-icons has-text-info">preview</span>
                                                            <span class="is-block py-2 has-text-grey-lighter">See pet!</span>
                                                            <span class="tooltiptext mb-2">View this profile</span>
                                                        </a>
                                                    </div>                                                                                              
                                                    <div class="column">
                                                        <a href="index.php?m=is_favorite&id=<?php echo $value["user_id"]; ?>" class="tooltip p-1">
                                                            <span class="p-1 material-icons has-text-danger"><?php if(in_array($value["user_email"], $_SESSION["favorite"])){echo "favorite";}else{echo "favorite_border";}?></span>
                                                            <span class="is-block py-2 has-text-grey-lighter">Like it?</span>
                                                            <span class="tooltiptext mb-2">Save as favorite</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php 
                                        }
                                    } ?>
                                </div>
                            </div>    
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <main>  
    <?php
        require_once("includes/footer.php");
    ?>

