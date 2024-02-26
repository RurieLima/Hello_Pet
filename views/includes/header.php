<!-- header menu de navegación -->
<nav class="navbar px-2 py-3" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item" href="index.php">
            <img src="views\img\logoHelloPetDark.png">
        </a>
        <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbar">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>
    <div id="navbar" class="navbar-menu">
        <div class="navbar-start has-text-weight-bold">
        <a href="index.php" class="navbar-item aBackground">
            Home
        </a>
        </div>
        <div class="navbar-end">
            <div class="navbar-item">
                <div class="buttons">
                <a href="index.php?m=admin" class="button is-light has-text-danger">
                    <strong>Admin</strong>
                </a>
                <?php if(!empty($_SESSION['login'])){ ?>
                <a href="index.php?m=register" class="button is-light has-text-danger">
                    <strong>Register</strong>
                </a>               
                <?php
                }
                ?>
                </div>
            </div>
        </div>
    </div>
</nav>
