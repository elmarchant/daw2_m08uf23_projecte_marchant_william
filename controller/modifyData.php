<?php
    require '../vendor/autoload.php';
    require '../model/ldapConnection.php';
    use Laminas\Ldap\Attribute;
    use Laminas\Ldap\Ldap;
    
    session_start();
    if(isset($_SESSION['adm']) && isset($_SESSION['cts'])){
        $ldap = new Ldap($opcions);
        $dna = $_SESSION['adm'];
        $ctsnya = $_SESSION['cts'];
        try{
            $ldap->bind($dna,$ctsnya);
            $sessionStatus = true;
        } catch (Exception $e){
            unset($_SESSION['adm']);
            unset($_SESSION['cts']);
            $sessionStatus = false;
        }
    }else{
        echo '
            <h1>Prohibido</h1>
            <hr>
            <a href="/prhm08uf23/?page=inicio/">Inicio</a>    
        ';
    }
    
    if(!$sessionStatus) echo '
        <h1>Prohibido</h1>
        <hr>
        <a href="/prhm08uf23/?page=inicio/">Inicio</a>
    ';
    
    if(!isset($_POST['uid']) && !isset($_POST['unorg'])) header('location: /prjm08uf23/?page=dashboard');
    
    ini_set('display_errors', 0);
    #
    # Atribut a modificar --> Número d'idenficador d'usuari
    #
    
    $valores = [
        'num-id' => 'uidNumber',
        'grup' => 'gidNumber',
        'dir-pers' => 'homeDirectory',
        'sh' => 'loginShell',
        'cn' => 'cn',
        'sn' => 'sn',
        'nombre' => 'givenName',
        'movil' => 'mobile',
        'direccion' => 'postalAddress',
        'telefono' => 'telephoneNumber',
        'titulo' => 'title',
        'descripcion' => 'description'
    ];
    
    $atribut=''; # El número identificador d'usuar té el nom d'atribut uidNumber
    $nou_contingut='';
    
    foreach($_POST as $key => $value){
        if(isset($valores[$key])) {
            if($key == 'num-id' || $key == 'grup') $value = intval($value);
            $nou_contingut = $value;
            $atribut = $valores[$key];
        }
    }
    
    
    
    
    #
    # Entrada a modificar
    #
    $uid = $_POST['uid'];
    $unorg = $_POST['unorg'];
    $dn = 'uid='.$uid.',ou='.$unorg.',dc=fjeclot,dc=net';
    #
    #Opcions de la connexió al servidor i base de dades LDAP
    
    #
    # Modificant l'entrada
    #
    $entrada = $ldap->getEntry($dn);
    if ($entrada){
        Attribute::setAttribute($entrada,$atribut,$nou_contingut);
        $ldap->update($dn, $entrada);
        echo "Atributo modificado";
    } else echo "<b>Este usuario no existe</b><br><br>";
    echo '<a href="/prjm08uf23/?page=dashboard">Volver</a>';
?>