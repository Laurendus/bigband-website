/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if(isUserLoggedIn === true & userLevel == 1) {
    document.getElementById("nav").innerHTML =
    "<ul id='menu'>" +
    "<li><a href='index.php?section=startseite'>Home</a></li>" +
    "<li><a href='index.php?section=instrumente'>Instrumente</a></li>" +
    "<li><a href='index.php?section=musikstuecke'>Musikstücke</a></li>" +
    "<li><a href='index.php?section=impressum'>Impressum</a></li>" +
    "<li><a href='index.php?section=register'>Register</a></li>"  +
    "<li><a href='index.php?section=logout'>Logout</a></li>"  +
    "</ul>";
} else {
    if(isUserLoggedIn === true) {
        document.getElementById("nav").innerHTML =
    "<ul id='menu'>" +
    "<li><a href='index.php?section=startseite'>Home</a></li>" +
    "<li><a href='index.php?section=instrumente'>Instrumente</a></li>" +
    "<li><a href='index.php?section=musikstuecke'>Musikstücke</a></li>" +
    "<li><a href='index.php?section=impressum'>Impressum</a></li>" +
    "<li><a href='index.php?section=logout'>Logout</a></li>"  +
    "</ul>";
    } else {
        document.getElementById("nav").innerHTML =
"<ul id='menu'>" +
"<li><a href='index.php?section=startseite'>Home</a></li>" +
"<li><a href='index.php?section=impressum'>Impressum</a></li>" +
"<li><a href='index.php?section=login'>Login</a></li>" +
"</ul>";
    }
}
