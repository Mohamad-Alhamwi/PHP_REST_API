<?php

    class Database
    {
        // Database Parameters.
        private $host = 'YOUR_HOST_NAME';
        private $databaseName = 'YOUR_DATABASE_NAME';
        private $userName = 'YOUR_USER_NAME';
        private $password = 'YOUR_PASSWORD';
        private $connection;
    
        // Database Connection.
        public function connect()
        {
            $this -> connection = null;

            try
            {
                // Creating PDO Object.
                $this -> connection = new PDO('mysql:host='.$this->host.';dbname='.$this->databaseName,$this->userName,$this->password);

                // Setting The Error Mode.
                $this -> connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } 
            catch(PDOException $error)
            {
                // Printing The Error Message.
                echo 'Connection Error: ' . $error -> getMessage();
            }

            // Returning The Connection.
            return $this -> connection;
        }
    }
