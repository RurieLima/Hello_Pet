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
                                <h1 class="title is-size-4 p-1">FIND YOUR MATCHPET</h1>
                            </div>                          
                            <div class="panel-tabs has-background-white-ter">
                                <?php                    
                                if(!empty($_SESSION['name'])){ ?>

                                <div class="columns">
                                    <div class="column">
                                        <div class="columns p-1 my-2">                                                            
                                                    <div class="column">
                                                        <a href="index.php" class="tooltip">
                                                            <span class="p-3 material-icons has-text-grey <?php if(empty($_GET["m"])){ echo "has-background-grey-lighter";} ?> spanIcon">feed</span>
                                                            <span class="tooltiptext">All pets</span>
                                                        </a>
                                                    </div>
                                                    <div class="column">
                                                        <a href="index.php?m=favorite" class="tooltip">
                                                            <span class="p-3 material-icons has-text-danger <?php if(!empty($_GET["m"]) && $_GET["m"] == "favorite"){ echo "has-background-grey-lighter";} ?> spanIcon">favorite</span>
                                                            <span class="tooltiptext">Pets favorite</span>
                                                        </a>
                                                    </div>
                                                    <div class="column">
                                                        <a href="index.php?m=male" class="tooltip">
                                                            <span class="p-3 material-icons has-text-info <?php if(!empty($_GET["m"]) && $_GET["m"] == "male"){ echo "has-background-grey-lighter";} ?> spanIcon">male</span>
                                                            <span class="tooltiptext">Male pets</span>
                                                        </a>
                                                    </div>
                                                    <div class="column">
                                                        <a href="index.php?m=female" class="tooltip">
                                                            <span class="p-3 material-icons has-text-danger <?php if(!empty($_GET["m"]) && $_GET["m"] == "female"){ echo "has-background-grey-lighter";} ?> spanIcon">female</span>
                                                            <span class="tooltiptext">Female pets</span>
                                                        </a>
                                                    </div>                            
                                                </div>
                                                <?php 
                                                }
                                                ?>  
                                        </div>
                                        <div class="column">
                                            <div class="p-5 mt-1">
                                                <form method="GET" action="">
                                                    <div class="field is-grouped my-2">
                                                        <div class="m-1">
                                                            <input type="hidden" name="m" value="city">
                                                            <input class="input has-text-centered" name="find_city" type="text" placeholder="Find by city">
                                                        </div>
                                                        <div class="m-1">
                                                            <button type="submit" name="get_city" value="Search" class="tooltip button has-background-danger-light p-2">
                                                                <span class="material-icons">travel_explore</span>
                                                                <span class="tooltiptext mb-3">Search</span>
                                                            </button>
                                                            
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                           
                                        </div>
                                    </div>                                                
                                </div>
                            </div>                           
                            <!-- Message  -->
                            <?php                    
                                if(!empty($_SESSION['msg'])){ ?>
                                    <div class="my-3">
                                    <p class="<?= $_SESSION['msgClass'] ?>" ><?= $_SESSION['msg'] ?></p> 
                                </div>
                                <?php $_SESSION['msg'] = ""; 
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
                                                    <div>
                                                        <div class="card-image">
                                                            <figure class="image">
                                                                <img src="<?php if(str_contains($value["user_img"], "https") == true){echo $value["user_img"];}else{echo "views/img/" .$value['user_img'];} ?>" alt="Placeholder image">
                                                            </figure>
                                                        </div>                                                 
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
                                                <div class="card-footer has-background-light">
                                                    <div class="column">
                                                        <a href="index.php?m=info&email=<?php echo $value["user_email"]; ?>" class="tooltip p-1">
                                                        <span class="p-1 m-1 material-icons has-text-link">pets</span>
                                                        <span class="tooltiptext mb-2">Info's pet</span>
                                                    </a>
                                                    </div>
                                                    <div class="column">
                                                        <a href="index.php?m=contact&email=<?php echo $value["user_email"]; ?>" class="tooltip p-1">
                                                        <span class="p-1 m-1 material-icons has-text-primary">question_answer</span>
                                                        <span class="tooltiptext mb-2">Contact pet</span>
                                                    </a>
                                                    </div>
                                                    <div class="column">
                                                        <a href="index.php" class="tooltip p-1">
                                                            <span class="p-1 m-1 material-icons has-text-danger"><?php if(in_array($value["user_email"], $_SESSION["favorite"])){echo "favorite";}else{echo "favorite_border";}?></span>
                                                            <span class="tooltiptext mb-2">Is favorite?</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php 
                                        }
                                    }?>
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

