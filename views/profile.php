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
                                    <form method="POST" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'];?> .?m=save_profile" name="profileForm">
                                        <input type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>">
                                        <div class="card my-3">
                                            <div class="card-header has-background-danger">
                                                <p class="card-header-title card-header-name is-centered is-size-4">Edit your profile</p>                                        
                                            </div>
                                            <div class="card-content">                                                  
                                                <div class="p-1 my-3">
                                                    <div class="card-image mb-5">
                                                        <figre class="image">
                                                            <img src="<?php if(str_contains($_SESSION["img"], "https") == true){echo $_SESSION["img"];}else{echo "views/img/" .$_SESSION['img'];} ?>" alt="Placeholder image">
                                                            <input type="hidden" name="updateImgUser" value="<?php echo $_SESSION["img"]; ?>">
                                                        </figure>
                                                        <div class="control column my-2">
                                                            <label class="button is-info is-light my-1 tooltip p-2s" for="imgProfileFile">
                                                                <i class="material-icons">add_a_photo</i>
                                                                <span class="tooltiptext mb-2">Add file</span>
                                                            </label>
                                                            <span class="is-block py-2 has-text-grey-dark">Insert new profile image</span>
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
                                                    <p class="<?= $_SESSION['msgClass'] ?>" ><?= $_SESSION['msg'] ?></p> 
                                                    <?php $_SESSION['msg'] = ""; 
                                                        $_SESSION['msgClass'] = ""; 
                                                }
                                                ?>                                               
                                            </div>
                                            <div class="card-footer has-background-grey-dark">
                                                <div class="control column">
                                                    <button type="submit" name="profile_save" value="save" class="button has-background-success-light has-text-success tooltip mb-5">
                                                        <i class="material-icons mb-3">save</i>    
                                                        <span class="is-block has-text-grey-lighter has-text-weight-bold">Save</span>
                                                        <span class="tooltiptext mb-2">Save changes</span>
                                                    </button>
                                                </div>                                               
                                            </div>
                                        </div>
                                    </form>
                                </div>   
                                <div class="column is-offset-8 p-1 m-1">                                     
                                    <!-- Gallery form -->
                                    <form enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'];?> .?m=save_gallery" method="POST">
                                        <input type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>">
                                        <div class="card my-3">
                                            <div class="card-header has-background-danger">
                                                <p class="card-header-title card-header-name is-centered is-size-4">Insert and remove photo in your gallery</p>                                        
                                            </div>
                                            <div class="card-content">                                             
                                                <div class="columns is-mobile is-multiline is-centered">   
                                                    <?php if(!empty($_SESSION["gallery"])){ 
                                                    foreach ($_SESSION["gallery"] as $key => $v) { ?>
                                                        <div class="column is-narrow p-1 m-1">
                                                            <div class="card-image m-1 p-1">
                                                                <figure class="image">
                                                                    <img src="<?php if(str_contains($v, "https") == true){echo $v;}else{echo "views/img/" .$v;} ?>" alt="Placeholder image">
                                                                </figure>
                                                                <input type="text" name="dataDel" value="<?php echo $v; ?>" hidden >
                                                                <label for="deleteBtn" class="tooltip">
                                                                    <button onclick="return confirm('Are you sure delete photo: <?php echo $v; ?> ?'); false" type="submit" name="gallery_delete" value="<?php echo $v; ?>" id="deleteBtn" class="delete p-3 m-3 has-background-danger"></button>
                                                                    <span class="is-block has-text-grey-dark is-size-7">Remove photo</span>
                                                                    <span class="tooltiptext mb-2">Delete photo</span>
                                                                </label>
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
                                                </div>   
                                                <div class="control my-3">
                                                    <input type="hidden" name="MAX_FILE_SIZE" value="500000" /> 
                                                    <input class="has-text-centered" type="file" id="imgGalleryFile" name="fileNew" hidden />    
                                                    <label class="button is-info is-light my-1 tooltip p-2" for="imgGalleryFile">
                                                        <i class="material-icons">add_photo_alternate</i>
                                                        <span class="tooltiptext mb-2">Add photo</span>
                                                    </label>
                                                    <span class="is-block py-2 has-text-grey-dark">Insert new photo in gallery</span>
                                                </div>   
                                             <!-- Message  -->
                                            <?php                 
                                                if(!empty($_SESSION['msg_gallery'])){ ?>
                                                <p class="<?= $_SESSION['msgClass'] ?> mt-5 p-3"><?= $_SESSION['msg_gallery'] ?></p> 
                                                <?php $_SESSION['msg_gallery'] = ""; 
                                                    $_SESSION['msgClass'] = ""; 
                                            }
                                            ?>                                                                         
                                            </div>
                                            <div class="card-footer has-background-grey-dark">
                                                <div class="control column">
                                                    <button type="submit" name="gallery_save" value="save" class="button has-background-success-light has-text-success tooltip mb-5">
                                                        <i class="material-icons mb-3">save</i>    
                                                        <span class="is-block has-text-grey-lighter	has-text-weight-bold">Save</span>
                                                        <span class="tooltiptext mb-2">Save photo</span>
                                                    </button>
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

