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
                                <div class="column p-1 m-1">
                                        <!-- Gallery form -->
                                    <form enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'];?> .?m=save_gallery" method="POST">
                                        <input type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>">
                                        <div class="card my-3">
                                            <div class="card-header has-background-danger">
                                                <p class="card-header-title card-header-name is-centered is-size-4">Gallery</p>                                        
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
                                                <div class="control">
                                                    <input type="hidden" name="MAX_FILE_SIZE" value="500000" /> 
                                                    <input class="has-text-centered" type="file" id="imgGalleryFile" name="fileNew" hidden />    
                                                    <label class="button is-primary is-light my-1 tooltip" for="imgGalleryFile">
                                                        <i class="material-icons">add_photo_alternate</i>
                                                        <span class="tooltiptext mb-2">Add photo</span>
                                                    </label>
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
                                            <div class="card-footer has-background-light level">
                                                <div class="column level-item has-text-right">
                                                    <div class="control my-2">
                                                        <button type="submit" name="gallery_save" value="save" class="button has-background-info has-text-white tooltip">
                                                            <i class="material-icons">save</i>    
                                                            <span class="tooltiptext mb-2">Save</span>
                                                        </button>
                                                    </div>      
                                                </div>
                                                <div class="column level-item has-text-left">
                                                    <div class="control my-2">
                                                        <a href="index.php" class="button has-background-grey has-text-white tooltip">
                                                            <i class="material-icons">backspace</i>
                                                            <span class="tooltiptext mb-2">Back</span>
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

