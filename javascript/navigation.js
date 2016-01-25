// **DEBUG**

/*document.getElementById("debug").innerHTML =
    "isUserLoggedIn: " +  isUserLoggedIn +
    "<br>userLevel: " + userLevel;*/

// **DEBUG**

if (isUserLoggedIn == 1) {
    switch (userLevel) {
        case 1:
            document.getElementById("nav").innerHTML =
            "<div id='menu'>" +
            "<a href='index.php?section=startseite' id='nav1'>Home</a>" +
            "<a href='index.php?section=instrumente' id='nav2'>Instrumente</a>" +
            "<a href='index.php?section=musikstuecke' id='nav3'>Musikst&uuml;cke</a>" +
            "<a href='index.php?section=impressum' id='nav4'>Impressum</a>" +
            "<a href='index.php?section=upload' id='nav8'>Upload</a>" +
            "<a href='index.php?section=register' id='nav7'>Register</a>"  +
            "<a href='index.php?section=logout' id='nav6'>Logout</a>" +
            "</div>";
            break;
        case 2:
            document.getElementById("nav").innerHTML =
            "<div id='menu'>" +
            "<a href='index.php?section=startseite' id='nav1'>Home</a>" +
            "<a href='index.php?section=instrumente' id='nav2'>Instrumente</a>" +
            "<a href='index.php?section=musikstuecke' id='nav3'>Musikst&uuml;cke</a>" +
            "<a href='index.php?section=upload' id='nav8'>Upload</a>" +
            "<a href='index.php?section=impressum' id='nav4'>Impressum</a>" +
            "<a href='index.php?section=logout' id='nav6'>Logout</a>" +
            "</div>";
            break;
        case 3:
            document.getElementById("nav").innerHTML =
            "<div id='menu'>" +
            "<a href='index.php?section=startseite' id='nav1'>Home</a>" +
            "<a href='index.php?section=instrumente' id='nav2'>Instrumente</a>" +
            "<a href='index.php?section=musikstuecke' id='nav3'>Musikst&uuml;cke</a>" +
            "<a href='index.php?section=impressum' id='nav4'>Impressum</a>" +
            "<a href='index.php?section=logout' id='nav6'>Logout</a>" +
            "</div>";
            break;
        default:
            document.getElementById("nav").innerHTML =
            "<div id='menu'>" +
            "<a href='index.php?section=startseite' id='nav1'>Home</a>" +
            "<a href='index.php?section=impressum' id='nav4'>Impressum</a>" +
            "<a href='index.php?section=logout' id='nav6'>Logout</a>" +
            "</div>";
            break;
    }
} else {
    document.getElementById('nav').innerHTML =
    "<div id='menu'>" +
    "<a href='index.php?section=startseite' id='nav1'>Home</a>" +
    "<a href='index.php?section=impressum' id='nav4'>Impressum</a>" +
    "<a href='index.php?section=login' id='nav5'>Login</a>" +
    "</div>";
}


switch (currentlyActive) {
    case '':
    case 'startseite':
        document.getElementById("nav1").className = "currentlyActive";
        break;
    case 'instrumente':
        document.getElementById("nav2").className = "currentlyActive";
        break;
    case 'musikstuecke':
        document.getElementById("nav3").className = "currentlyActive";
        break;
    case 'impressum':
        document.getElementById("nav4").className = "currentlyActive";
        break;
    case 'login':
        document.getElementById("nav5").className = "currentlyActive";
        break;
    case 'logout':
        document.getElementById("nav6").className = "currentlyActive";
        break;
    case 'register':
        document.getElementById("nav7").className = "currentlyActive";
        break;
    case 'upload':
        document.getElementById("nav8").className = "currentlyActive";
        break;
    default:
        break;
}
