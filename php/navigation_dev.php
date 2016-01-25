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
<div class="nav_wrapper">
    <ul class="topnav">
        <?php
            if (isset($_SESSION['userLevel'])) {
                switch($_SESSION['userLevel']) {
                    case 1:
                        echo '
                             <li>
                                <a href="/startseite">Home</a>
                                <a id="menubutton" href="javascript:void(0)" onclick="myFunction()">
                                    <img src="/media/menu-icon.svg">
                                </a>
                            </li>
                            <li><a href="/instrumente">Instrumente</a></li>
                            <li><a href="/musikstuecke">Musikst&uuml;cke</a></li>
                            <li><a href="/impressum">Impressum</a></li>
                            <li><a href="/upload">Upload</a></li>
                            <li><a href="/register">Register</a></li>
                            <li><a href="/logout">Logout</a></li>';
                        break;
                    case 2:
                        echo '
                             <li>
                                <a href="/startseite">Home</a>
                                <a id="menubutton" href="javascript:void(0)" onclick="myFunction()">
                                    <img src="/media/menu-icon.svg">
                                </a>
                            </li>
                            <li><a href="/instrumente">Instrumente</a></li>
                            <li><a href="/musikstuecke">Musikst&uuml;cke</a></li>
                            <li><a href="/impressum">Impressum</a></li>
                            <li><a href="/upload">Upload</a></li>
                            <li><a href="/logout">Logout</a></li>';
                        break;
                    case 3:
                        echo '
                             <li>
                                <a href="/startseite">Home</a>
                                <a id="menubutton" href="javascript:void(0)" onclick="myFunction()">
                                    <img src="/media/menu-icon.svg">
                                </a>
                            </li>
                            <li><a href="/instrumente">Instrumente</a></li>
                            <li><a href="/musikstuecke">Musikst&uuml;cke</a></li>
                            <li><a href="/impressum">Impressum</a></li>
                            <li><a href="/logout">Logout</a></li>';
                        break;
                }
            } else {
                echo '
                <li>
                    <a href="/startseite">Home</a>
                    <a id="menubutton" href="javascript:void(0)" onclick="myFunction()">
                        <img src="/media/menu-icon.svg">
                    </a>
                </li>
                <li><a href="/impressum">Impressum</a></li>
                <li><a href="/login">Login</a></li>';
            }
        ?>
    </ul>
</div>
<!--<div class="nav_wrapper">
    <ul class="topnav">
        <li class="default">
            <a href="/startseite">Home</a>
            <a id="menubutton" href="javascript:void(0)" onclick="myFunction()">
                <img src="/media/menu-icon.svg">
            </a>
        </li>
        <li class="normal"><a href="/instrumente">Instrumente</a></li>
        <li class="normal"><a href="/musikstuecke">Musikst&uuml;cke</a></li>
        <li class="default"><a href="/impressum">Impressum</a></li>
        <li class="moderator"><a href="/upload">Upload</a></li>
        <li class="admin"><a href="/register">Register</a></li>
        <li class="default"><a href="/login">Login</a></li>
        <li class="normal"><a href="/logout">Logout</a></li>
    </ul>

</div>-->