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
                                    <h1 class="title is-size-4 p-1 mb-3">Send a message to: <?php echo $value["user_name"];?></h1>
                            </div>                                                                
                            <div class="columns mx-0 has-background-white-ter is-vcentered">  
                                <div class="column is-one-fifth">
                                    <figure>
                                        <img id="imgInfo" class="has-background-white-bis p-1" src="<?php if(str_contains($value["user_img"], "https") == true){echo $value["user_img"];}else{echo "views/img/" .$value['user_img'];} ?>" alt="Placeholder image">
                                    </figure>                                                                                                                                
                                </div>  
                                <div class="column">
                                   <div class="card">
                                    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?> .?m=save_contact" name="contactForm">
                                            <div class="card-content">
                                                <div class="control my-3">
                                                    <textarea class="textarea is-focused" placeholder="Your message here" name="contact_msg"></textarea>
                                                    <input type="hidden" name="contact_name" value="<?php echo $value["user_name"]; ?>">
                                                </div>
                                            </div>
                                             <!-- Message  -->                                
                                            <?php            
                                                if(!empty($_SESSION['msg'])){ ?>
                                                <div>
                                                    <p class="help mb-3 is-size-6 <?= $_SESSION['msgClass'] ?>"><?= $_SESSION['msg'] ?></p> 
                                                </div> 
                                                <?php $_SESSION['msg'] = ""; 
                                                    $_SESSION['msgClass'] = "";
                                                }
                                            ?>  
                                            <div class="card-footer has-background-grey-dark">
                                                <div class="control column my-3">
                                                    <button type="submit" name="contact_save" value="save" class="button has-background-success-light has-text-success tooltip mb-5 p-3">
                                                        <i class="material-icons mb-3">save</i>    
                                                        <span class="is-block has-text-grey-lighter has-text-weight-bold">Send</span>
                                                        <span class="tooltiptext mb-2">Send message</span>
                                                    </button>
                                                </div>
                                            </div>                                         
                                        </form>
                                   </div>
                                </div>                                                             
                            </div>                              
                            <?php 
                                    }                                          
                                }                                      
                            ?>                                                                                                                  
                        </div>
                    </div>
                </div>            
            </div>
        </section>
    <main>  
    <?php
        require_once("includes/footer.php");
    ?>
