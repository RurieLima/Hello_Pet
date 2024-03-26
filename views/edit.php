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
                        <?php if(isset($data)){ ?>                                        
                            <div class="columns is-centered p-1 mb-3">                                    
                                <div class="column is-3 is-offset-8 p-1 m-1">
                                        <!-- Edit form -->
                                    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?> .?m=update">
                                        <?php 
                                            $_SESSION["user_edit_favorite"] = $dato['user_favorite']; 
                                            $_SESSION["user_edit_gallery"] = $dato['user_gallery'];                                         
                                        ?>
                                        <div class="card my-3">
                                            <div class="card-header has-background-danger">
                                                <p class="card-header-title card-header-name is-centered is-size-4"><?php echo $dato['user_name']; ?></p>                                        
                                            </div>
                                            <div class="card-content">                                                  
                                                <div>
                                                    <div class="card-image">
                                                        <figure class="image mx-2">
                                                            <img src="<?php if(str_contains($dato["user_img"], "https") == true){echo $dato["user_img"];}else{echo "views/img/" .$dato['user_img'];} ?>" alt="Placeholder image">
                                                        </figure>
                                                        <div class="control my-2">
                                                            <input type="hidden" name="editImgUser" value="<?php echo $dato['user_img'] ?>">
                                                            <label class="button is-warning is-light p-2 my-1" for="imgFile">Choose File</label>
                                                            <input class="has-text-centered" type="file" id="imgFile" name="file" hidden>    
                                                            <input type="hidden" name="MAX_FILE_SIZE" value="30000" />       
                                                        </div>
                                                    </div>                                                 
                                                </div>   
                                                <div>
                                                    <p class="card-content has-background-white-ter	my-3 p-2">
                                                    <div class="control my-2">
                                                        <input type="hidden" name="id" value="<?php echo $dato['user_id'] ?>">
                                                        <input class="input has-text-centered has-text-grey-light" type="text" name="name" value="<?php echo $dato["user_name"] ?>" placeholder="<?php echo $dato["user_name"];?>">
                                                    </div>
                                                    <div class="control my-2">
                                                        <input class="input has-text-centered has-text-grey-light" type="email" name="email" value="<?php echo $dato["user_email"] ?>" placeholder="<?php echo $dato["user_email"];?>">
                                                    </div>
                                                    <div class="control my-2">
                                                        <select name="breed" class="input has-text-centered has-text-grey-light"> 
                                                        <?php                                                                        
                                                            $json = file_get_contents("./config/breeds.json");
                                                            $result = json_decode($json, true);
                                                            $t = count($result);
                                                            for ($i=0; $i < $t; $i++) {  
                                                                if($dato["user_breed"] == $result[$i]){ ?>                                                                      
                                                                        <option value=<?php echo $result[$i] ?> selected ><?php echo $result[$i]?></option>                                                                                                                                               
                                                                <?php }else{ ?>
                                                                        <option value=<?php echo $result[$i] ?> ><?php echo $result[$i]?></option>
                                                                <?php }
                                                            }                                                                
                                                        ?>
                                                        </select>
                                                    </div>
                                                    <div class="control my-2">
                                                        <input class="input has-text-centered has-text-grey-light" type="text" name="city" value="<?php echo $dato["user_city"] ?>" placeholder="<?php echo $dato["user_city"];?>">
                                                    </div>
                                                    <div class="control my-2">
                                                        <div class="control">
                                                            <label class="radio has-text-centered has-text-grey-light">
                                                                <input class="" type="radio" name="gender" value="Male" <?php if($dato["user_gender"] == "Male"){echo "checked=checked";} ?>>
                                                                Male
                                                            </label>
                                                            <label class="radio has-text-centered has-text-grey-light">
                                                                <input class="" type="radio" name="gender" value="Female" <?php if($dato["user_gender"] == "Female"){echo "checked=checked";}?>>
                                                                Female
                                                            </label>
                                                        </div>           
                                                    </div>                                                     
                                                    </p>                                                 
                                                </div>                                                   
                                            </div>
                                            <div class="card-footer has-background-light">
                                                <!-- Message  -->
                                                <?php                    
                                                    if(!empty($_SESSION['msg'])){ ?>
                                                    <p class="help is-success"><?= $_SESSION['msg'] ?></p> 
                                                    <?php $_SESSION['msg'] = ""; 
                                                }
                                                ?>
                                                <div class="column p-1">                                                     
                                                    <div class="control py-3">
                                                        <input type="submit" name="edit_save" value="Save" class="button has-background-info has-text-white">
                                                    </div>
                                                </div>     
                                                <div class="column p-1">
                                                    <div class="control py-3">
                                                        <a href="index.php?m=admin" class="button has-background-grey has-text-white">
                                                            <strong>Back</strong>
                                                        </a>
                                                    </div>         
                                                </div>                                                      
                                            </div>
                                        </div>
                                    </form>
                                </div>  
                            </div>   
                        <?php } ?>                                          
                    </div>
                </div>
            </div>
        </section>
    <main>  
    <?php
        require_once("includes/footer.php");
    ?>

