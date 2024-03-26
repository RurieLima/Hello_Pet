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
                    <div class="is-centered m-1 p-1">
                        <div class="panel has-background-white-ter">
                            <div class="panel-heading has-background-danger">  
                            <?php if(!empty($petData)){  
                                foreach($petData as $key => $value){ ?>      
                                    <h1 class="title is-size-4 p-1"><?php echo $value["user_name"];?></h1>
                            </div>    
                            <div>                                  
                         
                                    <div class="columns p-1 m-1">                                                                               
                                        <div class="column p-1 m-1">
                                            <div class="card my-3">
                                                <div class="card-content">                                                  
                                                    <div>
                                                        <p class="card-content has-background-white-ter	my-3 p-1">
                                                            <?php if($value["user_gender"] == "Male"){
                                                                ?><span class="material-icons has-text-info has-text-weight-bold">male</span>&nbsp<span class="has-text-info has-text-weight-bold">Male</span> 
                                                            <?php ; }else { 
                                                                ?><span class="material-icons has-text-danger has-text-weight-bold">female</span>&nbsp<span class="has-text-danger has-text-weight-bold">Female</span> 
                                                            <?php
                                                            } ?>
                                                        </p>
                                                    </div>                                                   
                                                </div>
                                            </div>
                                        </div>
                                        <div class="column p-1 m-1">
                                            <div class="card my-3">
                                                <div class="card-content">                                                  
                                                    <div>
                                                        <p class="card-content has-background-white-ter	my-3 p-1 has-text-weight-bold has-text-grey"><?php echo $value["user_breed"];?></p>                                        
                                                    </div>                                                   
                                                </div>
                                            </div>
                                        </div>
                                        <div class="column p-1 m-1">
                                            <div class="card my-3">
                                                <div class="card-content">                                                  
                                                    <div>
                                                        </p>
                                                        <p class="card-content has-background-white-ter	my-3 p-1 has-text-weight-bold has-text-grey"><?php echo $value["user_city"];?></p>                                        
                                                    </div>                                                   
                                                </div>
                                            </div>
                                        </div>                                 
                                    </div>    
                                    <?php     
                                    //gallery                                 
                                        
                                   
                                }       
                                                                
                            }
                            ?>  
                            </div> 
                                                                                           
                            <div>
                                <a class="button is-warning is-light my-3" href="index.php"><i class="material-icons">backspace</i>&nbsp Back</a>
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
