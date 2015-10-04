<?php

/**
 * A class file to connect to database
 */
class DB_CONNECT {
    protected $con;

    // constructor
    function __construct() {
        // connecting to database
        $this->connect();
    }

    // destructor
    function __destruct() {
        // closing db connection
        $this->close();
    }

    /**
     * Function to connect with database
     */
    function connect() {



        // Connecting to mysql database
        try
        {
            $con = new PDO('mysql:host=localhost;dbname=batman', 'root','');
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $con->exec('SET NAMES "utf8"');
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();

            exit();
        }


        return $con;
    }

    /**
     * Function to close db connection
     */
    function close() {
        // closing db connection
        $con=null;
    }

}

?>