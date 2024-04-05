<?php
@session_start();

isLogedIn();

function isLogedIn() {
    if (isset($_SESSION['username'])) {
        echo true;
    } else {
        echo false; 
    }
}
?>