<?php 

	class Database {

		private $serverName = 'localhost';
		private $userName = 'wvict';
		private $password = '$securedatabase.@';
		private $dbName = 'oop_database';

		protected function connect(){

			try { //This will create a connection using PDO and, if it fails, an error message will be displayed. It is done using this try/catch method.
				$dsn = 'mysql:host='.$this->serverName.';dbname='.$this->dbName;
				$pdo = new PDO($dsn, $this->userName, $this->password);
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//This will create an exception - a message if anything goes wrong with the connection with the database. It is used later on in the catch part. 
				return $pdo;
				
			} catch (PDOException $e) {
				echo "Connection failed: ". $e->getMessage();//This will print out the exact problem with the connection failure.
			}
			

		}

	}