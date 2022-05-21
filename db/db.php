<?php

    function conectar($base='hotel',$user='root',$pwd='') //conexiones solo para consultar
	{
		try{
            $dsn="mysql:host=localhost;dbname=$base";
            $dbh=new PDO($dsn, $user, $pwd);
        }catch (PDOException $e){
            echo $e->getMessage();
        }
		if ($dbh)
		{
			return $dbh;
		}
		else
			return 0;
	}
    function desconectar($dbh){
        $dbh=null;
    }
	
	
?>