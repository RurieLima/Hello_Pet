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
            <div class="hero-body my-1 py-1">
                <div class="container has-text-centered">
                    <h1 class="title is-size-2 p-1 has-text-light">HELLO PET</h1>
                </div>
                <div class="container has-text-centered py-3">
                    <div class="columns is-centered">
                        <div class="column is-one-third box my-3">
                        <!-- Access form -->
                            <form method="POST" action="http://localhost/hello_pet/index.php">
                                <div class="field box has-background-white-ter m-2">
                                    <label class="label has-text-grey-light">Username</label>
                                    <div class="control">
                                        <input class="input has-text-centered has-text-grey-light" type="text" name="user_name" placeholder="Enter your user name">
                                    </div>                                   
                                </div>
                                <div class="field box has-background-white-ter m-2">
                                    <label class="label has-text-grey-light">Email</label>
                                    <div class="control">
                                        <input class="input has-text-centered has-text-grey-light" type="email" name="user_email" placeholder="Enter your user email">
                                    </div>
                                </div>
                                 <!-- Message  -->
                                 <?php                    
                                        if(!empty($_SESSION['msg'])){ ?>
                                        <p class="help is-success"><?= $_SESSION['msg'] ?></p> 
                                        <?php $_SESSION['msg'] = ""; 
                                    }
                                    ?>
                                <div class="field">
                                    <div class="control py-3">
                                        <button type="submit" name="user_login" value="login" class="button has-background-danger has-text-white">
                                            <strong>Login</strong>
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