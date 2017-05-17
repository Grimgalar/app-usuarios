<?php

/**
 *
 */
class ldap {

    function __construct()
    {
        # code...
    }

    private function _conn(){
        //se definen los datos del servidor ldap
        $conection['server']="172.*.*.*";
        $conection['port']=389;
        $conection['dn']="CN=Administrador,CN=Users,DC=lab,DC=local";
        $conection['pss']="******";

        //creamos conexion
        //abrir conexion con el servidor
        $connect=ldap_connect($conection['server'])or die("Could not connect to LDAP server.");

        //validar el protocolo de ldap
        ldap_set_option($connect, LDAP_OPT_PROTOCOL_VERSION, 3)or die ("Imposible asignar el Protocolo LDAP");

        //autentificacion del usuario
        $r=ldap_bind($connect,$conection['dn'],$conection['pss'])or die ("Imposible Validar en el Servidor LDAP");

    return $connect;
    }

    private function _close(){
       ldap_close($this->_conn());
    }

    public function info($data){
        /*if(!empty($data["cn"])){
            $retorno = $data;
        }else{
            $retorno = "error";
        }
        return $retorno;*/
    }
//añadir un usuario
    public function add($data){

    /*    $usuario= ldap_add($this->_conn(),"CN=dani.campillo,OU=4t,OU=Primaria,DC=lab,DC=local",$data);
        if($usuario){
                return $usuario;
        }*/

    }
//eliminar u usuario
    public function del(){
      //  $usuario= ldap_delete($this->_conn(),"CN=dani.campillo,OU=4t,OU=Primaria,DC=lab,DC=local");
    }

//modificar informacion
  public function modi_info($data){
  $dn="CN=dani.campillo,OU=4t,OU=Primaria,DC=lab,DC=local";

  ldap_modify($this->_conn(),$dn, $data);
  /************codigo ejemplo todo junto*******
    if(!empty($data["cn"])){
      $newcn = $data["cn"];
      $newparent="OU=4t,OU=Primaria,DC=lab,DC=local";
      ldap_rename($this->_conn(),$dn,$newcn,$newparent,true);
      $dn="CN=".$data["cn"].",OU=4t,OU=Primaria,DC=lab,DC=local";
      ldap_modify($this->_conn(),$dn, $data);
    }else{
      ldap_modify($this->_conn(),$dn, $data);
    }*/


  }
//cambiar nombre
  public function modi_name($data){
    $dn="CN=dani.campillo,OU=4t,OU=Primaria,DC=lab,DC=local";
    $newcn = $data["cn"];
    $newparent="OU=4t,OU=Primaria,DC=lab,DC=local";
    ldap_rename($this->_conn(),$dn,$newcn,$newparent,true);
  }



}


?>
