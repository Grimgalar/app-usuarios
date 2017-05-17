<?php

    class ldap{
        var $con;
        function Conexion($ldapserver,$ldapport,$ldapuser,$ldappass){
            //se definen los datos del servidor ldap
            $conection['server']="172.*.*.*";
            $conection['port']=389;
            $conection['dn']="CN=Administrador,CN=users,DC=sdsbdn,DC=local";
            $conection['pss']="*******";

        //creamos conexion
            //abrir conexion con el servidor
            $conect=ldap_connect($conection['server'])or die("Could not connect to LDAP server.");
            //validar el protocolo de ldap
            ldap_set_option($conect, LDAP_OPT_PROTOCOL_VERSION, 2)
                or die ("Imposible asignar el Protocolo LDAP");
                //autentificacion del usuario
                $r=ldap_bind($conect,$conection['user'],$conection['pss'])or die ("Imposible Validar en el Servidor LDAP");

        }
        function getConexion(){
            return $this->con;
        }
        function Close(){
            ldap_close($this->con);
        }


        function consulta(){
            var $conexion;
            var $consulta;
            var $resultado;

        }


    }

    $conexion = new conexion();
    $conexion->autentificacion();
 ?>
