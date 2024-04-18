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
            <div class="hero-body py-1 my-1">
                <div class="container has-text-centered">
                    <div class="is-centered m-1 p-1">
                        <div class="panel has-background-white-ter">
                            <div class="panel-heading has-background-danger">  
                            <?php if(!empty($petData)){  
                            foreach($petData as $key => $value){ ?>      
                                <h1 class="title is-size-4 p-1 mb-3"><?php echo $value["user_name"];?></h1>
                            </div>                                                                
                            <div class="columns mx-0 has-background-white-ter is-vcentered">  
                                <div class="column is-one-fifth">
                                    <figure>
                                        <img id="imgInfo" class="has-background-white-bis p-1" src="<?php if(str_contains($value["user_img"], "https") == true){echo $value["user_img"];}else{echo "views/img/" .$value['user_img'];} ?>" alt="Placeholder image">
                                    </figure>                                                                                                                                
                                </div>     
                                <div class="column box m-2">
                                    <?php if($value["user_gender"] == "Male"){
                                        ?><span class="material-icons has-text-info has-text-weight-bold is-size-5">male</span>
                                        <p class="has-text-info has-text-weight-bold mx-1">Male</p> 
                                    <?php ; }else { 
                                        ?><span class="material-icons has-text-danger has-text-weight-bold is-size-5">female</span>
                                        <p class="has-text-danger has-text-weight-bold mx-1">Female</p> 
                                    <?php
                                    } ?>
                                </div>
                                <div class="column box m-2">
                                    <span class="material-icons has-text-success has-text-weight-bold is-size-5 mx-2">pets</span>
                                    <p class="has-text-weight-bold has-text-grey"><?php echo $value["user_breed"];?></p>                                        
                                </div>
                                <div class="column box m-2">
                                    <span class="material-icons has-text-warning has-text-weight-bold is-size-5 mx-2">location_on</span>                                
                                    <p class="has-text-weight-bold has-text-grey"><?php echo $value["user_city"];?></p>                                        
                                </div>  
                                <div class="column is-one-fifth">                                    
                                    <div class="columns is-vcentered is-gapless p-3">    
                                        <div class="column is-narrow">
                                            <a href="index.php?m=is_like&id=<?php echo $value["user_id"]; ?>" class="tooltip p-1">
                                                <span class="material-icons has-text-link spanIconInfo">thumb_up</span><span class="badgeInfo is-size-7 px-2 has-background-danger-dark has-text-white has-text-weight-bold"><?php echo $value["user_like"]; ?></span>
                                                <span class="tooltiptext mb-2">Like</span>   
                                            </a>
                                        </div>                                              
                                        <div class="column is-narrow">
                                            <a href="index.php?m=is_favorite&email=<?php echo $value["user_email"]; ?>" class="tooltip p-1">
                                                <span class="material-icons has-text-danger spanIconInfo"><?php if(in_array($value["user_email"], $_SESSION["favorite"])){echo "favorite";}else{echo "favorite_border";}?></span>
                                                <span class="tooltiptext mb-2">Is favorite?</span>
                                            </a> 
                                        </div>
                                    </div>                                
                                </div>                                    
                            </div>   
                            <!-- gallery -->
                            <div class="columns is-mobile is-multiline is-centered">   
                                <?php if(!empty($value["user_gallery"])){ 
                                $t = count($value["user_gallery"]);
                                for ($i=0; $i < $t; $i++) { ?>
                                    <div class="column is-narrow p-1 m-1">
                                        <div class="card-image m-1 p-1">
                                            <figure class="image">
                                                <img src="<?php if(str_contains($value["user_gallery"][$i], "https") == true){echo $value["user_gallery"][$i];}else{echo "views/img/" .$value['user_gallery'][$i];} ?>" alt="Placeholder image">
                                            </figure>
                                        </div>         
                                    </div>
                                <?php }  
                                }else{ ?>
                                <div class="column p-1 m-1">
                                    <div>
                                        <p class="card-content has-background-white-ter	my-3 p-1 has-text-weight-bold has-text-danger">No data gallery</p>                                        
                                    </div>                                                   
                                </div>
                                <?php } ?>                                   
                                
                                <?php                                          
                                    }                                       
                                }
                                ?>                                                                                                                     
                            </div>
                            <div class="columns">
                                <div class="column p-3">
                                    <a class="button has-background-grey has-text-white my-3 tooltip" href="index.php">
                                        <i class="material-icons">backspace</i>
                                        <span class="tooltiptext mb-2">Back</span>
                                    </a>
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
