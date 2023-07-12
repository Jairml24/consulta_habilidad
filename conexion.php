<?php
Class Connection
{
	public $obj_mysql;
	
	function Connection()
	{
      $pass = "ccpamazo_habilidad";
      $user = "ccpamazo_habilidad";
      $nombreBaseDeDatos = "ccpamazo_habilidad";
      $rutaServidor = "localhost";

		try {
         $this->obj_mysql = new PDO("mysql:host=$rutaServidor;dbname=$nombreBaseDeDatos", $user, $pass);
         $this->obj_mysql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          } catch (Exception $e) {
             echo "Ocurriио un error con la base de datos: " . $e->getMessage();
          }
	}
	
	function CloseConnection()
	{
		$this->obj_mysql=null;
   }

}

?>