<header class="header">
    <nav class="header__nav">
        <a class="header__logo" href="index.php" >
        <?php include 'components\svg\logo.php ' ?>
        </a>
        <form class="header__form" method="get">
            <input class="header__search"  type="text" name="search" placeholder="Search...">
            <div id="livesearch"></div>
        </form>
        <a class="header__log header__link" href="logout.php">log out</a>
        <a class="header__sign header__link" href="">
        <?php include 'components\svg\user.php ' ?>

        </a>  
    </nav>


</header>