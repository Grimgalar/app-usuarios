<!--articulo para autentificacion de usuarios
http://www.ingdiaz.org/autenticacion-de-usuarios-usando-php-y-active-directory-de-windows-server/
-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>

    <body>
        <?php
        error_reporting(E_ALL);



// La secuencia básica con LDAP es conectar, amarrar, buscar, interpretar el resultado
// de la búsqueda, y cerrar la conexión.

echo "<h3>Consulta de prueba LDAP</h3>";
$ldapserver="172.*.*.*";
$ldapport=389;
$ldapuser="CN=Administrador,CN=Users,DC=lab,DC=local";
$ldappass="*****";
echo "Conectando ...";
//abrir conexion con el servidor
$ds = ldap_connect($ldapserver);// or die ("Could not connect to LDAP server.");  // Debe ser un servidor LDAP válido!
print_r ($ds);
//validar el protocolo de ldap
ldap_set_option($ds, LDAP_OPT_PROTOCOL_VERSION, 3)
or die ("Imposible asignar el Protocolo LDAP");
echo "<br />conexion a ". $ldapserver ." ok " . $ds . "<br />";

if ($ds) {
    echo "Vinculando ...";
    //autentificacion del usuario
    $r=ldap_bind($ds,$ldapuser,$ldappass)or die ("Imposible Validar en el Servidor LDAP");
    echo "El resultado de la vinculación es " . $r . "<br />";
    if ($r) {
        echo "LDAP bind successful...<br />";
    }

    echo "Buscando ...<br />";
    // Busca la entrada de apellidos

  $dn = "OU=4t,OU=Primaria,DC=lab,DC=local";
  $filter="(|(sn=*)(givenname=*)(mail=*))";
  #$justthese = array("ou", "sn", "givenname", "mail");

  $sr=ldap_search($ds, $dn, $filter);
  $info = ldap_get_entries($ds, $sr);



  echo "Info del arbol<br />";

      $dn ="DC=lab,DC=local";
      $filter="(ou=*)";


      $sr=ldap_search($ds, $dn, $filter);
      $info = ldap_get_entries($ds, $sr);
     // print_r($info);

     $a = [];

      for ($i=$info["count"]; $i>0; $i--) {
          $datos = explode(",",$info[$i]["distinguishedname"][0]);

          for ($j = count($datos); $j >= 0; $j--) {
            $c = count($datos) -$j ;
                print_r($datos[$j]."<br>");

              array_push($a[$c],$datos[$j]);



            //   print_r($c." --".$datos[$j]."<br>");


          }

      }

      print_r($a);
    /*$basedn="DC=lab,DC=local";
    $justthese=array("*");

    $sr=ldap_list($ds, $basedn, "ou=*", $justthese);

    $info=ldap_get_entries($ds,$sr);

    for ($i=0; $i < $info["count"]; $i++) {
        echo $info[$i]["ou"][0];
    }*/

 /* for ($i=0; $i < $info["count"]; $i++){
      echo "Name: ". $info[$i]["sn"][0]."<br />";
      echo "Given Name: ".$info[$i]["givenname"][0]."<br />";
      if(isset($info[$i]["mail"][0])){
        echo "Email: ".$info[$i]["mail"][0]."<br />";
      } else{
        echo "Email: None<br/>";
      }
  }

  $info2["cn"] = "john jones";
  $info2["sn"] = "jones";
  $info2["givenname"] = "john";
  $info2["mail"]= "jon@ejemplo.com";
  $info2["objectclass"][0] = "top";
  $info2["objectclass"][1] = "User";
  $info2["objectclass"][2] = 'organizationalPerson';
  $info2["useraccountcontrol"][0] = 544;


  $in = ldap_add($ds, "CN=john jones,OU=4t,OU=Primaria,DC=lab,DC=local", $info2);*/

  /*if(ldap_error($in) == "Success"){
        echo "si";
    }else{
        echo "no";
    }*/
    //print_r($info2);

}
?>
    </body>
</html>
