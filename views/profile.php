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
                    <div class="is-centered mb-2 p-2">
                        <?php if($_SESSION["login"]){ ?>                                                 
                            <div class="columns is-centered p-1 mb-3">                                    
                                <div class="column is-3 is-offset-8 p-1 m-1">
                                        <!-- Profile form -->
                                    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?> .?m=save_profile" name="profileForm">
                                        <input type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>">
                                        <div class="card my-3">
                                            <div class="card-header has-background-danger">
                                                <p class="card-header-title card-header-name is-centered is-size-4"><?php echo $_SESSION["name"];?></p>                                        
                                            </div>
                                            <div class="card-content">                                                  
                                                <div>
                                                    <div class="card-image">
                                                        <figure class="image">
                                                            <img src="<?php if(str_contains($_SESSION["img"], "https") == true){echo $_SESSION["img"];}else{echo "views/img/" .$_SESSION['img'];} ?>" alt="Placeholder image">
                                                            <input type="hidden" name="updateImgUser" value="<?php echo $_SESSION["img"]; ?>">
                                                        </figure>
                                                        <div class="control my-2">
                                                            <label class="button is-warning is-light p-2 my-1" for="imgProfileFile">Choose File</label>
                                                            <input class="has-text-centered" type="file" id="imgProfileFile" name="file" hidden />    
                                                            <input type="hidden" name="MAX_FILE_SIZE" value="30000" /> 
                                                        </div>
                                                    </div>                                                 
                                                </div>   
                                                <div>
                                                    <div class="control my-2">
                                                        <input class="input has-text-centered has-text-grey-light" type="text" name="name" value="<?php echo $_SESSION['name']; ?>" placeholder="<?php echo $_SESSION["name"];?>">
                                                    </div>
                                                    <div class="control my-2">
                                                        <input class="input has-text-centered has-text-grey-light" type="email" name="email" value="<?php echo $_SESSION['email']; ?>" placeholder="<?php echo $_SESSION["email"];?>">
                                                    </div>
                                                    <div class="control my-2">
                                                        <select name="breed" id="breeds" class="input has-text-centered has-text-grey-light"> 
                                                        <?php                                                                        
                                                            $json = file_get_contents("./config/breeds.json");
                                                            $result = json_decode($json, true);
                                                            $t = count($result);
                                                            for ($i=0; $i < $t; $i++) {  
                                                                if($_SESSION["breed"] == $result[$i]){ ?>    
                                                                                                                                
                                                                        <option value="<?php echo $result[$i]; ?>" selected ><?php echo $result[$i]; ?></option>                                                                                                                                               
                                                                <?php }else{ ?>
                                                                        <option value="<?php echo $result[$i]; ?>" ><?php echo $result[$i]; ?></option>
                                                                <?php }
                                                            }                                                                
                                                        ?>
                                                        </select>
                                                    </div>
                                                    <div class="control my-2">
                                                        <input class="input has-text-centered has-text-grey-light" type="text" name="city" value="<?php echo $_SESSION['city']; ?>" placeholder="<?php echo $_SESSION["city"];?>">
                                                    </div>
                                                    <div class="control my-2">
                                                        <div class="control">
                                                            <label class="radio has-text-centered has-text-grey-light">
                                                                <input class="" type="radio" name="gender" value="male" checked="<?php if($_SESSION["gender"] == "male"){echo "checked";} ?>">
                                                                Male
                                                            </label>
                                                            <label class="radio has-text-centered has-text-grey-light">
                                                                <input class="" type="radio" name="gender" value="female" checked="<?php if($_SESSION["gender"] == "male"){echo "checked";}?>">
                                                                Female
                                                            </label>
                                                        </div>           
                                                    </div>                                                                                              
                                                </div> 
                                                <!-- Message  -->
                                                <?php                    
                                                    if(!empty($_SESSION['msg'])){ ?>
                                                    <div>
                                                        <p class="help is-success "><?= $_SESSION['msg'] ?></p> 
                                                    </div>
                                                    <?php $_SESSION['msg'] = ""; 
                                                    }
                                                ?>                                                  
                                            </div>
                                            <div class="card-footer has-background-light">
                                                <div class="column">                        
                                                    <div class="control py-3">
                                                        <button type="submit" name="profile_save" value="save" class="button has-background-info has-text-white">
                                                            <strong>Save</strong>
                                                        </button>
                                                    </div>                                               
                                                </div>   
                                                <div class="column">
                                                    <div class="control py-3">
                                                        <a href="index.php" class="button has-background-grey has-text-white">
                                                            <strong>Back</strong>
                                                        </a>
                                                    </div>         
                                                </div>                                                                   
                                            </div>
                                        </div>
                                    </form>
                                </div>     
                            </div>                                             
                        <?php  } ?>
                    </div>
                </div>
            </div>
        </section>
    <main>  
    <?php
        require_once("includes/footer.php");
    ?>

