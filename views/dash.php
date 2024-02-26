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
                        <h1 class="title is-size-2 p-1 has-text-light">DASHBOARD</h1>
                    </div> 
                    <div class="is-centered m-2 p-2">
                        <div class="panel is-danger">
                            <div class="panel-heading">                       
                                <p>Welcome <span class="has-text-weight-bold"><?= $_SESSION['name'] ?></span></p>
                                <?php if(!empty($_SESSION['login'])){ ?>
                                <a href="index.php?m=profile" class="button is-light has-text-danger my-3">
                                    <strong>Profile</strong>
                                </a>               
                                <?php
                                }
                                ?>
                            </div>                          
                            <div class="panel-tabs">
                                <?php                    
                                if(!empty($_SESSION['name'])){ ?>
                                <div class="my-3">
                                    <div class="card-header columns p-3 m-1">                                                            
                                        <div class="column">
                                            <span class="p-5 material-icons spanIcon">feed</span>
                                            <p class="has-text-weight-bold has-text-grey my-3">All</p>
                                        </div>
                                        <div class="column">
                                            <span class="p-5 material-icons has-text-danger spanIcon">favorite</span>
                                            <p class="has-text-weight-bold has-text-grey my-3">Favorite</p>
                                        </div>
                                        <div class="column">
                                            <span class="p-5 material-icons has-text-info spanIcon">male</span>
                                            <p class="has-text-weight-bold has-text-grey my-3">Male</p>
                                        </div>
                                        <div class="column">
                                            <span class="p-5 material-icons has-text-danger spanIcon">female</span>
                                            <p class="has-text-weight-bold has-text-grey my-3">Female</p>
                                        </div>                            
                                    </div>
                                    <?php 
                                    }
                                    ?>                                    
                                </div>                                
                            </div>                            
                            <div class="is-centered p-1">
                                <div class="columns is-multiline is-centered p-1 mb-3">
                                    <?php if(!empty($allData)){ 
                                        foreach($allData as $key => $value){ ?>  
                                        <div class="column is-3 is-offset-8 p-1 m-1">
                                            <div class="card my-3">
                                                <div class="card-header">
                                                    <p class="card-header-title card-header-name is-size-4 has-background-grey-lighter"><?php echo $value["user_name"];?></p>                                        
                                                </div>
                                                <div class="card-content">                                                  
                                                    <div>
                                                        <div class="card-image">
                                                            <figure class="image">
                                                                <img src="<?php echo $value["user_img"] ?>" alt="Placeholder image">
                                                            </figure>
                                                        </div>                                                 
                                                    </div>   
                                                    <div>
                                                        <p class="card-content has-background-white-ter	my-3 p-2">
                                                            <?php if($value["user_gender"] == "Male"){
                                                                ?><span class="material-icons has-text-info">male</span>&nbsp<span class="has-text-info">Male</span> 
                                                            <?php ; }else { 
                                                                ?><span class="material-icons has-text-danger">female</span>&nbsp<span class="has-text-danger">Female</span> 
                                                            <?php
                                                            } ?>
                                                        </p>
                                                        <p class="card-content has-background-white-ter	my-3 p-2"><span class="material-icons has-text-grey">location_on</span>&nbsp<span class="has-text-grey"><?php echo $value["user_city"];?></span></p>                                        
                                                    </div>                                                   
                                                </div>
                                                <div class="card-footer columns p-2">
                                                    <div class="column">
                                                        <a><span class="p-3 material-icons has-text-link">pets</span></a>
                                                    </div>
                                                    <div class="column">
                                                        <a><span class="p-3 material-icons has-text-primary">question_answer</span></a>
                                                    </div>
                                                    <div class="column">
                                                        <a><span class="p-3 material-icons has-text-danger">favorite_border</span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php 
                                        }
                                    }?>
                                </div>
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

