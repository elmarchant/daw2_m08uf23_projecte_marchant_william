<?php
    use Laminas\Ldap\Ldap;

    require 'vendor/autoload.php';
    include 'model/ldapConnection.php';
    
    $sessionStatus = false;
    session_start();
    if(isset($_SESSION['adm']) && isset($_SESSION['cts'])){
        $ldap = new Ldap($opcions);
        $dn = $_SESSION['adm'];
        $ctsnya = $_SESSION['cts'];
        try{
            $ldap->bind($dn,$ctsnya);
            $sessionStatus = true;
        } catch (Exception $e){
            unset($_SESSION['adm']);
            unset($_SESSION['cts']);
            $sessionStatus = false;
        }
    }
?>