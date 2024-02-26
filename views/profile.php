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
                    <div>
                        <h1 class="title is-size-2 p-1 has-text-light">PROFILE</h1>
                    </div> 
                    <div class="is-centered mb-2 p-2">
                        <?php if($_SESSION["login"]){ ?>
                                                 
                                <div class="columns is-centered p-1 mb-3">
                                    
                                        <div class="column is-3 is-offset-8 p-1 m-1">
                                             <!-- Profile form -->
                                            <form method="POST" action="http://localhost/hello_pet/index.php">
                                                <div class="card my-3">
                                                    <div class="card-header">
                                                        <p class="card-header-title card-header-name is-size-4 has-background-grey-lighter"><?php echo $_SESSION["name"];?></p>                                        
                                                    </div>
                                                    <div class="card-content">                                                  
                                                        <div>
                                                            <div class="card-image">
                                                                <figure class="image">
                                                                    <img src="<?php echo $_SESSION["img"] ?>" alt="Placeholder image">
                                                                </figure>
                                                            </div>                                                 
                                                        </div>   
                                                        <div>
                                                            <p class="card-content has-background-white-ter	my-3 p-2">
                                                                <div class="control my-2">
                                                                    <input class="input has-text-centered has-text-grey-light" type="text" name="user_name" placeholder="<?php echo $_SESSION["name"];?>">
                                                                </div>
                                                                <div class="control my-2">
                                                                    <input class="input has-text-centered has-text-grey-light" type="email" name="user_email" placeholder="<?php echo $_SESSION["email"];?>">
                                                                </div>
                                                                <div class="control my-2">
                                                                    <select name="allBredds" id="breeds" class="input has-text-centered has-text-grey-light"> 
                                                                    <?php                                                                        
                                                                         $json = file_get_contents("./config/breeds.json");
                                                                         $result = json_decode($json, true);
                                                                        $t = count($result);
                                                                        for ($i=0; $i < $t; $i++) {  
                                                                           if($_SESSION["breed"] == $result[$i]){ ?>                                                                      
                                                                                    <option value=<?php echo $result[$i] ?> selected ><?php echo $result[$i]?></option>                                                                                                                                               
                                                                          <?php }else{ ?>
                                                                                    <option value=<?php echo $result[$i] ?> ><?php echo $result[$i]?></option>
                                                                          <?php }
                                                                        }                                                                
                                                                    ?>
                                                                    </select>
                                                                </div>
                                                                <div class="control my-2">
                                                                    <input class="input has-text-centered has-text-grey-light" type="email" name="user_city" placeholder="<?php echo $_SESSION["city"];?>">
                                                                </div>
                                                                <div class="control my-2">
                                                                    <div class="control">
                                                                        <label class="radio has-text-centered has-text-grey-light">
                                                                            <input class="" type="radio" name="user_gender" value="male" checked="<?php if($_SESSION["gender"] == "male"){echo "checked";} ?>">
                                                                            Male
                                                                        </label>
                                                                        <label class="radio has-text-centered has-text-grey-light">
                                                                            <input class="" type="radio" name="user_gender" value="female" checked="<?php if($_SESSION["gender"] == "male"){echo "checked";}?>">
                                                                            Female
                                                                        </label>
                                                                    </div>           
                                                                </div>                                                     

                                                            </p>
                                                  

                                                        </div>                                                   
                                                    </div>
                                                    <div class="card-footer columns p-2">

                                                       <!-- Message  -->
                                                       <?php                    
                                                            if(!empty($_SESSION['msg'])){ ?>
                                                            <p class="help is-success"><?= $_SESSION['msg'] ?></p> 
                                                            <?php $_SESSION['msg'] = ""; 
                                                        }
                                                        ?>

                                                        <div class="column">
                                                     
                                                            <div class="field">
                                                                <div class="control py-3">
                                                                    <button type="submit" name="profile_save" value="save" class="button has-background-info has-text-white">
                                                                        <strong>Save</strong>
                                                                    </button>
                                                                </div>
                                                            </div>                                                        
                                                        </div>
                                                        <div class="column">
                                                            <div class="control py-3">
                                                                    <button type="reset" name="profile_reset" value="reset" class="button has-background-grey has-text-white">
                                                                        <strong>Reset</strong>
                                                                    </button>
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

