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
                            <!-- Message  -->                                
                            <?php            
                                if(!empty($_SESSION['msg'])){ ?>
                                    <div class="pt-3">
                                    <p class="help is-size-6 <?= $_SESSION['msgClass'] ?>"><?= $_SESSION['msg'] ?></p> 
                                </div> 
                                <?php $_SESSION['msg'] = ""; 
                                        $_SESSION['msgClass'] = "";
                                }
                            ?>                                                               
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
                            </div>  
                            <div class="columns mx-0 my-3 is-vcentered is-centered has-background-grey-dark">
                                <div class="column is-one-fifth p-0 m-0">                                    
                                    <div class="columns is-vcentered is-gapless is-centered p-3">                                                 
                                        <div class="column is-narrow mx-3 p-3">
                                            <a href="index.php?m=is_favorite&id=<?php echo $value["user_id"]; ?>" class="tooltip p-1">
                                                <span class="p-1 m-1 material-icons has-text-danger"><?php if(in_array($value["user_email"], $_SESSION["favorite"])){echo "favorite";}else{echo "favorite_border";}?></span>
                                                <span class="is-block py-2 has-text-grey-lighter">Like it?</span>
                                                <span class="tooltiptext mb-2">Save as favorite</span>
                                            </a> 
                                        </div>
                                        <div class="column is-narrow mx-3 p-3">
                                            <a href="index.php?m=contact&name=<?php echo $value["user_name"]; ?>" class="tooltip p-1">
                                                <span class="p-1 m-1 material-icons has-text-success">perm_phone_msg</span>
                                                <span class="is-block py-2 has-text-grey-lighter">Get in touch</span>
                                                <span class="tooltiptext mb-2">Send message</span>
                                            </a>
                                        </div>
                                    </div>                                
                                </div>                  
                            </div>  
                            <!-- gallery -->
                            <div class="columns is-mobile is-multiline is-centered p-3">   
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
                        </div>
                    </div>
                </div>            
            </div>
        </section>
    <main>  
    <?php
        require_once("includes/footer.php");
    ?>
