<?php
  require("persona.class.php");

  $objeto = new ldap();
  /*$a = $objeto->add(array(
    "cn"=>"dani.campillo",
    "sn"=>"dani",
    "givenname"=>"campillo",
    "mail"=>"campillo@gmail.com",
    "objectclass"=>"user",
    "useraccountcontrol"=>544
));*/
  //print_r(json_encode($a));
  //$a = $objeto->del();
  $a= $objeto->modi_info(array(
    "sn"=>"erer",
    "givenname"=>"erer",
    "mail"=>"ere@gmail.com",
    "objectclass"=>"user",
    "useraccountcontrol"=>544
));

?>
