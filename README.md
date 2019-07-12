# Welcome to Origami.
This is a web application that allows users to create and edit personal notes. Hope you enjoy it!

Creator: Weslley Victor (wvict)

# Install
If you want to take a look into the web application, proceed as following:

##### Make sure you have LAMP (or WAMP) installed on your local machine.
##### Clone this repository inside /var/www/ (or /xampp/htdocs on windows).
##### Create a username and a password on Mysql (if you don't have one).

You can do so with: 
`CREATE USER 'newuser'@'localhost' IDENTIFIED BY 'password';`


You also need to grant all privileges to your user:
`GRANT ALL PRIVILEGES ON * . * TO 'newuser'@'localhost';`

'newuser' is your username.

##### Create a new database called 'origami'.

`CREATE DATABASE origami;`

##### Using the terminal, import the file origami_structure.sql into MySQL.
To do this, go to the folder database_structures

`cd /var/www/html/origami/database_structures`(on linux)

`cd /xampp/htdocs/origami/database_structures` (on windows)

And import the origami_structure.sql file into the database you created:

`mysql -u yourusername -p origami < origami_structure.sql;`

That should import the database structures into MySQL.

##### Create a file called Database.php on origami/classes.
The file should contain the following code:

` <php?

	class Database {

		private $serverName = 'localhost';
		private $userName = 'yourusername';
		private $password = 'yourpassword';
		private $dbName = 'origami';

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
	}` 
  
Now go to http://localhost/origami and enjoy the web application!


