<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['validUser']) && $_SESSION['validUser']){
    echo true;
} else {
    echo false;
}
?>