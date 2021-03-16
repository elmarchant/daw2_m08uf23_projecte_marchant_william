<?php
    require '../vendor/autoload.php';
    require '../model/ldapConnection.php';
    use Laminas\Ldap\Attribute;
    use Laminas\Ldap\Ldap;
    
    ini_set('display_errors', 0);
    #Dades de la nova entrada
    #
    
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
    
    $handler = true;
    $dataPostName = array(
        'uid',
        'unorg',
        'num-id',
        'grup',
        'dir-pers',
        'sh',
        'cn',
        'sn',
        'nombre',
        'movil',
        'direccion',
        'telefono',
        'titulo',
        'descripcion'
    );
    
    foreach($dataPostName as $item){
        if(!isset($_POST[$item]) || !$_POST[$item]){
            $handler = false; 
            break;
        }
    }
    
    if($handler && $sessionStatus){
        $uid = $_POST[$dataPostName[0]];
        $unorg = $_POST[$dataPostName[1]];
        $num_id = intval($_POST[$dataPostName[2]]);
        $grup = intval($_POST[$dataPostName[3]]);
        $dir_pers = '/home/'.$_POST[$dataPostName[4]];
        $sh = $_POST[$dataPostName[5]];
        $cn = $_POST[$dataPostName[6]];
        $sn = $_POST[$dataPostName[7]];
        $nom = $_POST[$dataPostName[8]];
        $mobil = $_POST[$dataPostName[9]];
        $adressa = $_POST[$dataPostName[10]];
        $telefon = $_POST[$dataPostName[11]];
        $titol = $_POST[$dataPostName[12]];
        $descripcio = $_POST[$dataPostName[13]];
        $objcl =array('inetOrgPerson','organizationalPerson','person','posixAccount','shadowAccount','top');
        #
        #Afegint la nova entrada
        $ldap = new Ldap($opcions);
        $ldap->bind($dn, $ctsnya);
        $nova_entrada = [];
        Attribute::setAttribute($nova_entrada, 'objectClass', $objcl);
        Attribute::setAttribute($nova_entrada, 'uid', $uid);
        Attribute::setAttribute($nova_entrada, 'uidNumber', $num_id);
        Attribute::setAttribute($nova_entrada, 'gidNumber', $grup);
        Attribute::setAttribute($nova_entrada, 'homeDirectory', $dir_pers);
        Attribute::setAttribute($nova_entrada, 'loginShell', $sh);
        Attribute::setAttribute($nova_entrada, 'cn', $cn);
        Attribute::setAttribute($nova_entrada, 'sn', $sn);
        Attribute::setAttribute($nova_entrada, 'givenName', $nom);
        Attribute::setAttribute($nova_entrada, 'mobile', $mobil);
        Attribute::setAttribute($nova_entrada, 'postalAddress', $adressa);
        Attribute::setAttribute($nova_entrada, 'telephoneNumber', $telefon);
        Attribute::setAttribute($nova_entrada, 'title', $titol);
        Attribute::setAttribute($nova_entrada, 'description', $descripcio);
        $dn = 'uid='.$uid.',ou='.$unorg.',dc=fjeclot,dc=net';
        if($ldap->add($dn, $nova_entrada)){
            echo '
                <h1>Usuario creado</h1>
                <a href="/prjm08uf23/?page=dashboard">volver</a>
            ';
        }else{
            echo '
                <h1>No se ha podido crear el usuario. :(</h1>
                <a href="/prjm08uf23/?page=dashboard">volver</a>
            ';
        }
    }else{
        echo '
            <h1>No se ha podido crear el usuario, faltan datos.</h1>
            <a href="/prjm08uf23/?page=dashboard">volver</a>
        ';
    }
    
    foreach($dataPostName as $item){
        unset($_POST[$item]);
    }
?>