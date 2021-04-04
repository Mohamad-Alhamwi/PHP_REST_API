<?php 

    // Setting Headers.
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

    // Including Functions From Other Files.
    include_once '../../config/Database.php';
    include_once '../../models/Student.php';
    include_once '../../utils/generatingRequistsLogs.php';

    // Instantiating Database Object & Connection.
    $database = new Database();

    $student = new Student($database -> connect());

    // Getting Raw Student Data.
    $data = json_decode(file_get_contents("php://input"));

    $student -> id = $data -> id;
    $student -> fullName = $data -> fullName;
    $student -> birthDate = $data -> birthDate;
    $student -> birthplace = $data -> birthplace;

    // Adding New Student.
    if($student->addStudent()) 
    {
        // Getting The Method Type. 
        $method = $_SERVER['REQUEST_METHOD'];

        // Getting The Response Time.
        $responseTime = 'Not Accomplished';

        // Getting The Timestamp.
        $timeStamp = $_SERVER['REQUEST_TIME'];
        
        // Sending The Information To The Log File.
        requistsLogger($method, $responseTime, $timeStamp);

        echo json_encode
        (
            array('message' => 'Student Has Been Added.')
        );
    } 
    else 
    {
        echo json_encode
        (
        array('message' => 'Student Has Not Been Added.')
        );
    }
    
?>