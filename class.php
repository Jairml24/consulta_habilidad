<?php
include_once('/home/ccpamazo/public_html/cons_habilidad/conexion.php');

class Contador
{
   function Buscar_Contador_Dni($nro_dni)
   {
	  $objCnx=new Connection();
        $stmt  = $objCnx->obj_mysql->prepare("select * from bd_contadores where DNI=?");
        $stmt->execute([$nro_dni]);
	return $stmt->fetchAll(PDO::FETCH_OBJ);
        
            
     $objCnx->CloseConnection();
	
   }

   function Buscar_Contador_Nombres($nombres)
   {
	  $objCnx=new Connection();
        $stmt  = $objCnx->obj_mysql->prepare("select * FROM  bd_contadores where CONCAT(NOMBRES, ' ', APELLIDO_PATERNO,' ', APELLIDO_MATERNO) like ?");
        $stmt->execute(['%'.$nombres.'%']);
	return $stmt->fetchAll(PDO::FETCH_OBJ);
        
            
     $objCnx->CloseConnection();
	
   }

   function Buscar_Contador_Ccp($ccp)
   {
	  $objCnx=new Connection();
        $stmt  = $objCnx->obj_mysql->prepare("select * from bd_contadores where CCP=?");
        $stmt->execute([$ccp]);
	return $stmt->fetchAll(PDO::FETCH_OBJ);
        
            
     $objCnx->CloseConnection();
	
   }
   
}
?>
