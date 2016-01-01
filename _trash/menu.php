 <ul>
    <li><a href="index.php?section=startseite">Start</a></li>
    <!--<li><a href="index.php?section=instrumente">Instrumente</a></li>-->
    <li><a href="index.php?section=musikstuecke">Musikstücke</a></li>
    <li><a href="index.php?section=impressum">Impressum</a></li>
    <li><a href="index.php?section=login">Login</a></li>
    <?php if($authorization->isUserLoggedIn()) { ?>
        <li><a href="index.php?section=write_news">News schreiben</a></li>
        <?php }
    ?>
</ul>