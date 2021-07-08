 <?php
#01. Start a session:  session_start();
#02. End a session:    session_unset() or session_destry();
#03. Session will be resume on the every request
#04. Session ID: session_id([string sid]);
#05. $_SESSION is a Super global used to store session variable
#06. sesstion

session_start();
$_SESSION['username'] = "Jason";
echo("Name:" . $_SESSION['username']);
unset($_SESSION['name']);
echo("Name:" . $_SESSION['username']);


// Initiate session and create a few session variables
session_start();
// Set a few session variables.
$_SESSION['username'] = "jason";
$_SESSION['loggedon'] = date("M d Y H:i:s");
// Encode all session data into a single string and return the result
$sessionVars = session_encode();
echo $sessionVars;

