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
                        <h1 class="title is-size-2 p-1 has-text-light">SIGN UP</h1>
                    </div> 
                    <div class="is-centered mb-2 p-2">                                       
                        <div class="columns is-centered p-1">                            
                            <div class="column is-3 is-offset-8 p-1 m-1">
                                <!-- Register form -->
                                <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?> .?m=save_register" name="registerForm" enctype="multipart/form-data">
                                    <div class="card mt-3">
                                        <div class="card-header has-background-danger">
                                            <p class="card-header-title card-header-name is-centered is-size-4">Enter the pet's data</p>                                        
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
                                                        <label class="button is-info is-light p-2 my-1 tooltip" for="imgFile">
                                                            <i class="material-icons">add_a_photo</i>
                                                            <span class="tooltiptext mb-2">Insert file photo</span>
                                                        </label>
                                                        <span class="is-block py-2 has-text-grey-dark">Add photo profile</span>
                                                        <input class="has-text-centered" type="file" id="imgFile" name="file" hidden>    
                                                        <input type="hidden" name="MAX_FILE_SIZE" value="50000" />                                            
                                                    </div>
                                                </div>                                                 
                                            </div>   
                                            <div>       
                                                <div class="control my-2">
                                                    <input type="hidden" name="id">
                                                    <input class="input has-text-centered has-text-grey-light" type="text" name="name" placeholder="Pet name">
                                                </div>
                                                <div class="control my-2">
                                                    <input class="input has-text-centered has-text-grey-light" type="email" name="email" placeholder="Owner's email">
                                                </div>
                                                <div class="control my-2">
                                                    <select name="Pet breed" class="input has-text-centered has-text-grey-light"> 
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
                                                    <input class="input has-text-centered has-text-grey-light" type="text" name="city" placeholder="Pet city">
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
                                                <p class="<?= $_SESSION['msgClass'] ?>" ><?= $_SESSION['msg'] ?></p> 
                                                <?php $_SESSION['msg'] = ""; 
                                                    $_SESSION['msgClass'] = ""; 
                                            }
                                            ?>
                                            <div class="column has-background-grey-dark">                                            
                                                <div class="control py-3">
                                                    <button type="submit" name="register_save" value="save" class="button has-background-success-light has-text-success tooltip mb-5">
                                                        <input type="hidden" name="m" value="save_register">
                                                        <i class="material-icons mb-3">save</i>   
                                                        <span class="is-block has-text-grey-lighter has-text-weight-bold">Save</span> 
                                                        <span class="tooltiptext mb-2">Save data pet</span>
                                                    </button>
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