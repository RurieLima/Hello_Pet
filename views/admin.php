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
                    <div class="columns p-1 mx-1 my-3 box has-background-danger">
                        <div class="column">
                            <div>
                                <a class="button is-primary is-light my-3 tooltip" href="index.php?m=insert"><i class="material-icons">add_box</i>
                                    <span class="tooltiptext mb-3">New pet</span>
                                </a>
                            </div>
                        </div>
                        <div class="column">
                            <div>
                                <a class="button has-background-grey has-text-white my-3 tooltip" href="index.php"><i class="material-icons">backspace</i>
                                    <span class="tooltiptext mb-3">Back</span>
                                </a>
                            </div>
                        </div>
                        <div class="column">
                            <div>
                                <?php if(!empty($data)){$t = count($data);}else{$t=0;} ?>
                                <p class="my-3 has-text-weight-bold has-text-grey-lighter">Total Users:&nbsp <span class="is-size-4 has-text-white-bis"><?php echo $t; ?></span></p>
                            </div>
                        </div>
                    </div>
                    <div class="has-background-white-bis box p-3 mb-3">
                        <div class="table-container p-1">
                            <table class="table table is-bordered table is-striped">
                                <thead>
                                    <tr class="has-background-danger">
                                        <th class="has-text-centered has-text-light">ID</th>
                                        <th class="has-text-centered has-text-light">EMAIL</th>
                                        <th class="has-text-centered has-text-light">GENDER</th>
                                        <th class="has-text-centered has-text-light">NAME</th>
                                        <th class="has-text-centered has-text-light">BREED</th>
                                        <th class="has-text-centered has-text-light">CITY</th>
                                        <th class="has-text-centered has-text-light">IMAGE</th>
                                        <th class="has-text-centered has-text-light">ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if(!empty($data)){
                                            foreach($data as $key => $value){ 
                                            ?>
                                                <tr>
                                                    <td class="is-vcentered has-text-weight-bold has-text-grey-lighter"><?php echo $value["user_id"];?></td>
                                                    <td class="is-vcentered has-text-weight-bold has-text-grey_dark"><?php echo $value["user_email"];?></td>
                                                    <td class="is-vcentered has-text-weight-bold <?php $classGender = ($value["user_gender"] == "Female") ? "has-text-danger" : "has-text-info"; echo $classGender;  ?> "><?php echo $value["user_gender"];?></td>
                                                    <td class="is-vcentered has-text-weight-bold has-text-grey"><?php echo $value["user_name"];?></td>
                                                    <td class="is-vcentered has-text-weight-bold has-text-grey"><?php echo $value["user_breed"];?></td>
                                                    <td class="is-vcentered has-text-weight-bold has-text-grey"><?php echo $value["user_city"];?></td>
                                                    <td class="is-vcentered">
                                                        <figure>
                                                            <img src="<?php if(str_contains($value["user_img"], "https") == true){echo $value["user_img"];}else{echo "views/img/" .$value['user_img'];} ?>" class="figImgAdmin m-3" alt="Placeholder image">
                                                        </figure>
                                                    </td>
                                                    <td class="tdMenuAdmin p-3">
                                                        <a class="button box is-link is-light tooltip is-small my-2 p-1" href="index.php?m=edit&id=<?php echo $value['user_id']; ?>"><i class="material-icons">edit</i>
                                                            <span class="tooltiptext mb-3">Edit user</span>
                                                        </a>
                                                        <a class="button box is-danger is-light tooltip is-small my-2 p-1" href="index.php?m=delete&id=<?php echo $value['user_id']; ?>" 
                                                            onclick="return confirm('Are you sure delete user id: <?php echo $value['user_id']; ?> ?'); false"><i class="material-icons">delete</i>
                                                            <span class="tooltiptext mb-3">Delete user</span>
                                                        </a>
                                                    </td>
                                                </tr>   
                                            <?php    
                                            }
                                        }else{
                                            echo "<tr><td>No data</td></tr>";
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <main>  
    <?php
        require_once("includes/footer.php");
    ?>