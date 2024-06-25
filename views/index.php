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
                    <h1 class="title is-2 p-1 has-text-white">HELLO PET</h1>
                </div>
                <div class="container has-text-centered py-2">
                    <div class="columns is-centered">
                        <div class="column is-one-third my-2 mx-3 p-3 m-5">
                            <h2 class="title is-3 has-text-danger p-3 m-3">Welcome to your pet community</h2>
                            <p class="subtitle is-5 has-text-danger p-3 m-3">Would you like to meet new pet friends? Find your Matchpet!</p>
                            <p class="is-7 has-text-grey p-2 m-2">Doesn't your pet have an account?</p>       
                            <a href="index.php?m=register" class="button p-2 is-danger is-light tooltip mx-2">
                                <strong><span>Sign up</span></strong>
                                <span class="tooltiptext mb-2">Register</span>
                            </a>       
                        </div>
                        <div class="column is-one-third my-2 p-3 mx-3">
                            <p class="is-7 has-text-grey p-2">Is your pet already registered?</p>       
                        <!-- Access form -->
                            <form method="POST" action="http://localhost/hello_pet/index.php">
                                <div class="field box has-background-white-ter m-4">
                                    <div class="control">
                                        <input class="input has-text-centered has-background-white has-text-grey-light my-1" type="text" name="user_name" placeholder="Pet name">
                                    </div>                                   
                                </div>
                                <div class="field box has-background-white-ter m-4">
                                    <div class="control">
                                        <input class="input has-text-centered has-background-white has-text-grey-light my-1" type="email" name="user_email" placeholder="Owner's email">
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
                                <div class="field">
                                    <div class="control py-3">
                                        <button type="submit" name="user_login" value="login" class="button is-danger has-text-white tooltip">
                                            <strong><span>Sign in</span></strong>
                                            <span class="tooltiptext mb-3">Log in</span>
                                        </button>
                                    </div>
                                </div>
                            </form>                     
                        </div>                   
                    </div>
                </div>
            </div>
        </section>
    <main>  
<?php
    require_once("includes/footer.php");
?>