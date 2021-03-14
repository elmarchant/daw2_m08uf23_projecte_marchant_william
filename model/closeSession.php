<?php
    session_start();
    unset($_SESSION['adm']);
    unset($_SESSION['cts']);
    header('location: ..');
?>