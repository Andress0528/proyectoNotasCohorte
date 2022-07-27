<?php 
	function conectar(){
		$host = "ec2-23-20-124-77.compute-1.amazonaws.com";
        $dbname = "d5e85ocvqe3mr8";
        $username = "ltuplbpywjpcpp";
        $password = "288b4943760ea93f9bacf926721bc72e533771f06bb2b53714920c85299ce9cf";
        try{
			$conn = pg_connect("host =$host dbname = $dbname user = $username password = $password");
		} catch (Exception $exp) {
            echo("no se pudo conectar a la base de datos $exp");
        }
        return $conn;
	}

?>