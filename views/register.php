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
                        <h1 class="title is-size-2 p-1 has-text-light">REGISTER</h1>
                    </div> 
                    <div class="is-centered mb-2 p-2">                                       
                        <div class="columns is-centered p-1">                            
                            <div class="column is-3 is-offset-8 p-1 m-1">
                                <!-- Register form -->
                                <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?> .?m=save_register" name="registerForm" enctype="multipart/form-data">
                                    <div class="card mt-3">
                                        <div class="card-header has-background-danger">
                                            <p class="card-header-title card-header-name is-centered is-size-4">Pet Info</p>                                        
                                        </div>
                                        <!-- Message  -->                                
                                        <?php            
                                        if(!empty($_SESSION['msg'])){ ?>
                                            <div class="pt-3">
                                            <p class="help is-danger is-size-6"><?= $_SESSION['msg'] ?></p> 
                                        </div> 
                                        <?php $_SESSION['msg'] = ""; 
                                        }
                                        ?>                                                        
                                        <div class="card-content"> 
                                            <div>  
                                                <div class="card-image">
                                                    <figure class="image ml-2">
                                                        <img src="views\img\logo_hello_pet_dark.png" alt="Placeholder image">
                                                        <input type="hidden" name="userImgNew" value="logoHelloPet.png">
                                                    </figure>
                                                    <div class="control my-2">
                                                        <label class="button is-warning is-light p-2 my-1" for="imgFile">Choose File</label>
                                                        <input class="has-text-centered" type="file" id="imgFile" name="file" hidden>    
                                                        <input type="hidden" name="MAX_FILE_SIZE" value="30000" />                                            
                                                    </div>
                                                </div>                                                 
                                            </div>   
                                            <div>       
                                                <div class="control my-2">
                                                    <input type="hidden" name="id">
                                                    <input class="input has-text-centered has-text-grey-light" type="text" name="name" placeholder="User name">
                                                </div>
                                                <div class="control my-2">
                                                    <input class="input has-text-centered has-text-grey-light" type="email" name="email" placeholder="User email">
                                                </div>
                                                <div class="control my-2">
                                                    <select name="breed" class="input has-text-centered has-text-grey-light"> 
                                                    <?php                                                                        
                                                        $json = file_get_contents("./config/breeds.json");
                                                        $result = json_decode($json, true);
                                                        $t = count($result);
                                                        for ($i=0; $i < $t; $i++) {  ?>                                                                      
                                                            <option value=<?php echo $result[$i] ?> ><?php echo $result[$i]?></option>                                                                                                                                               
                                                        <?php }                                                                
                                                    ?>
                                                    </select>
                                                </div>
                                                <div class="control my-2">
                                                    <input class="input has-text-centered has-text-grey-light" type="text" name="city" placeholder="User city">
                                                </div>
                                                <div class="control my-2">
                                                    <div class="control">
                                                        <label class="radio has-text-centered has-text-grey-light">
                                                            <input class="" type="radio" name="gender" value="Male">
                                                            <span class="material-icons has-text-info">male</span>&nbsp Male
                                                        </label>
                                                        <label class="radio has-text-centered has-text-grey-light">
                                                            <input class="" type="radio" name="gender" value="Female">
                                                            <span class="material-icons has-text-danger">female</span>&nbsp Female
                                                        </label>
                                                    </div>           
                                                </div>                                             
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
                                            <div class="column">                                            
                                                <div class="control py-3">
                                                    <button type="submit" name="register_save" value="save" class="button has-background-info has-text-white">
                                                    <input type="hidden" name="m" value="save_register">
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
                    </div>
                </div>
            </div>
        </section>
    <main>  
<?php
require_once("includes/footer.php");
?>