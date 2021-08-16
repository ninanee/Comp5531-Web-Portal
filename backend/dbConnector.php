<?php
class DatabaseConnector {

    private $dbConnection = null;

    public function __construct()
    {
        $host = '127.0.0.1';
        $port = '3306';
        $db   = 'final_project';
        $user = 'root';
        $pass = '123456';
        // $host = 'xic5531.encs.concordia.ca';
        // $port = '3306';
        // $db   = 'xic55311';
        // $user = 'xic55311';
        // $pass = 'HuNiOl12';

        try {
            $this->dbConnection = new PDO(
                "mysql:host=$host;port=$port;charset=utf8mb4;dbname=$db",
                $user,
                $pass
            );
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function getConnection()
    {
        return $this->dbConnection;
    }
}
?>
<?php
// // $DATABASE_HOST = 'xic5531.encs.concordia.ca';
// // $DATABASE_USER = 'xic55311';
// // $DATABASE_PASS = 'HuNiOl12';
// // $DATABASE_NAME = 'xic55311';
// // $DATABASE_PORT = '3306';
// $DATABASE_HOST = '127.0.0.1';
// $DATABASE_USER = 'root';
// $DATABASE_PASS = '123456';
// $DATABASE_NAME = 'final_project';
// $DATABASE_PORT = '3306';
// // Try and connect using the info above.
// $con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME, $DATABASE_PORT);

// if ( mysqli_connect_errno() ) {
// 	// If there is an error with the connection, stop the script and display the error.
// 	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
// }
?>