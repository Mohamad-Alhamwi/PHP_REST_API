<?php

    class Student
    {
        // Database Stuff.
        private $connection;
        private $table = 'students';

        // Student Properties.
        public $id;
        public $fullName;
        public $birthDate;
        public $birthPlace;
        public $createdDate;

        // Constructor With Database.
        public function __construct($database)
        {
            $this -> connection = $database;
        }    

        // Fetching (GET) Students.
        public function fetchStudent()
        {
            // Creating Query.
            $query = 
                    'SELECT 
                            students.id,
                            students.fullName,
                            students.birthDate,
                            students.birthplace,
                            students.createdDate
                    FROM
                            ' . $this -> table.'
                    ';
            
            // Praparing Statement.
            $statment = $this -> connection -> prepare($query);

            // Executing Query.
            $statment -> execute();

            return $statment;
        }

        // Adding (Post) Students.
        public function addStudent() 
        {
            // Creating Query.
            $query = 'INSERT INTO ' . $this -> table . ' SET id = :id, fullName = :fullName, birthDate = :birthDate, birthplace = :birthplace';

            // Prepare Statement.
            $statment = $this-> connection -> prepare($query);

            // Cleaning Data.
            $this -> id = htmlspecialchars(strip_tags($this -> id));
            $this -> fullName = htmlspecialchars(strip_tags($this -> fullName));
            $this -> birthDate = htmlspecialchars(strip_tags($this -> birthDate));
            $this -> birthplace = htmlspecialchars(strip_tags($this -> birthplace));

            // Binding data.
            $statment -> bindParam(':id', $this -> id);
            $statment -> bindParam(':fullName', $this -> fullName);
            $statment -> bindParam(':birthDate', $this -> birthDate);
            $statment -> bindParam(':birthplace', $this -> birthplace);

            // Executing Query.
            if($statment -> execute()) 
            {
                return true;
            }

            // Print Error If Something Goes Wrong.
            printf("Error: %s.\n", $statment -> error);

            return false;
        }

        // Updating (PUT) Students.
        public function updateStudent()
        {
            // Creating Query.
            $query = 'UPDATE ' . $this->table . ' SET id = :id, fullName = :fullName, birthDate = :birthDate, birthplace = :birthplace WHERE id = :id';

            // Prepare Statement.
            $statment = $this-> connection -> prepare($query);

            // Cleaning Data.
            $this -> id = htmlspecialchars(strip_tags($this -> id));
            $this -> fullName = htmlspecialchars(strip_tags($this -> fullName));
            $this -> birthDate = htmlspecialchars(strip_tags($this -> birthDate));
            $this -> birthplace = htmlspecialchars(strip_tags($this -> birthplace));

            // Binding data.
            $statment -> bindParam(':id', $this -> id);
            $statment -> bindParam(':fullName', $this -> fullName);
            $statment -> bindParam(':birthDate', $this -> birthDate);
            $statment -> bindParam(':birthplace', $this -> birthplace);

            // Executing Query.
            if($statment -> execute()) 
            {
                return true;
            }

            // Print Error If Something Goes Wrong.
            printf("Error: %s.\n", $statment -> error);

            return false;
        }

        public function DropStudent() 
        {
            // Creating Query.
            $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';

            // Preparing Statement.
            $statment = $this-> connection -> prepare($query);

            // Cleaning Data.
            $this -> id = htmlspecialchars(strip_tags($this -> id));

            // Binding data.
            $statment -> bindParam(':id', $this -> id);

            // Executing Query.
            if($statment -> execute()) 
            {
                return true;
            }

            // Print Error If Something Goes Wrong.
            printf("Error: %s.\n", $statment -> error);

            return false;
        }
    }