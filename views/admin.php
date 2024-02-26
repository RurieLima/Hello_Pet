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
                        <h1 class="title is-size-2 p-1 has-text-light">ADMIN</h1>
                    </div>
                    <div class="columns p-1 my-1">
                        <div class="column my-2">
                            <div>
                                <a class="button is-success my-3" href="index.php?m=insert"><i class="material-icons">add_circle_outline</i>&nbsp New user</a>
                            </div>
                        </div>
                        <div class="column my-2">
                            <div>
                                <a class="button is-warning my-3" href="index.php"><i class="material-icons">backspace</i>&nbsp Back</a>
                            </div>
                        </div>
                        <div class="column my-2">
                            <div>
                                <?php  if(!empty($data)){$t = count($data);}else{$t=0;} ?>
                                <p class="my-3 p-1 has-text-weight-bold">Total Users:&nbsp <span class="is-size-4 has-text-link"><?php echo $t; ?></span></p>
                            </div>
                        </div>
                    </div>
                    <div class="columns is-centered my-1">
                        <div class="table-container column box">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>EMAIL</th>
                                        <th>NAME</th>
                                        <th>GENDER</th>
                                        <th>BRRED</th>
                                        <th>CITY</th>
                                        <th colspan="2">ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if(!empty($data)){
                                            foreach($data as $key => $value){ 
                                            ?>
                                                <tr class="m-3 p-3">
                                                    <td class="m-3 p-3"><?php echo $value["user_id"];?></td>
                                                    <td><?php echo $value["user_email"];?></td>
                                                    <td><?php echo $value["user_name"];?></td>
                                                    <td><?php echo $value["user_gender"];?></td>
                                                    <td><?php echo $value["user_breed"];?></td>
                                                    <td><?php echo $value["user_city"];?></td>
                                                    <td colspan="2">
                                                        <a class="button is-link is-light mx-1" href="index.php?m=edit&id=<?php echo $value['user_id']; ?>"><i class="material-icons">edit</i></a>
                                                        <a class="button is-danger is-light mx-1" href="index.php?m=delete&id=<?php echo $value['user_id']; ?>" 
                                                        onclick="return confirm('Are you sure?'); false"><i class="material-icons">delete</i></a></td>
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