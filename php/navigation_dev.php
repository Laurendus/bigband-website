<?php

/**
 * User: Laurens
 * Date: 23.01.2016
 * Time: 21:26
 */
?>
<script>
    function myFunction() {
        document.getElementsByClassName("topnav")
        [0].classList.toggle("responsive");
    }
</script>
<ul class="topnav">
    <li class="default"><a href="index.php?section=startseite">Home</a></li>
    <li class="normal"><a href="index.php?section=instrumente">Instrumente</a></li>
    <li class="normal"><a href="index.php?section=musikstuecke">Musikst&uuml;cke</a></li>
    <li class="default"><a href="index.php?section=impressum">Impressum</a></li>
    <li class="moderator"><a href="index.php?section=upload">Upload</a></li>
    <li class="admin"><a href="index.php?section=register">Register</a></li>
    <li class="default"><a href="index.php?section=login">Login</a></li>
    <li class="normal"><a href="index.php?section=logout">Logout</a></li>
</ul>