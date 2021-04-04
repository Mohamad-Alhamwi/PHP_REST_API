<?php 

    // Setting Headers.
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: DELETE');
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

    // Setting ID To Update.
    $student -> id = $data -> id;

    // Updatting The Student Information.
    if( $student -> DropStudent() ) 
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
            array('message' => 'Student Has Been Deleted.')
        );
    } 
    else 
    {
        echo json_encode
        (
            array('message' => 'Student Has NOT Been Deleted.')
        );
    }

?>