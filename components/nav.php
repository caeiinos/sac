<header class="header">
    <a class="header__logo" href="index.php" >
        <?php include 'svg/logo.php' ?>
    </a>
    <form class="header__form" action="search.php" method="get">
        <input class="header__search"  type="text" name="search" placeholder="Search...">
        <button type="submit">Search</button>
    </form>
    <a class="header__log header__link" href="">log in</a>
    <a class="header__sign header__link" href="">sign up</a>
    <a class="header__set header__link" href=""><?php include 'svg/user.php' ?></a>

</header>