<?php

    // Setting Headers.
    header('Access-control-Allow-Origins: *');
    header('Content-Type: application/json');

    // Including Functions From Other Files.
    include_once '../../config/Database.php';
    include_once '../../models/Student.php';
    include_once '../../utils/generatingRequistsLogs.php';
    include_once '../../utils/responseTime.php';

    // Instantiating Database Object & Connection.
    $database = new Database();

    $student = new Student($database -> connect());

    // Student Query.
    $result = $student -> fetchStudent();

    // Get Row Count.
    $num = $result -> rowCount();

    // Check if any students.
    if($num > 0)
    {
        $studentsArray = array();
        $studentsArray['data'] = array();

        while($row = $result -> fetch(PDO::FETCH_ASSOC))
        {
            extract($row);

            $studentItem = array(
                'id' => $id,
                'fullName' => $fullName, 
                'birthDate' => $birthDate,
                'birthPlace' => $birthplace,
                'createdDate' => $createdDate
            );

            // Push to "data".
            array_push($studentsArray['data'], $studentItem);
        }

        // Getting The Method Type. 
        $method = $_SERVER['REQUEST_METHOD'];

        // Getting The Response Time.
        $responseTime = 'Not Accomplished';

        // Getting The Timestamp.
        $timeStamp = $_SERVER['REQUEST_TIME'];

        // Sending The Information To The Log File.
        requistsLogger($method, $responseTime, $timeStamp);

         // Turn to JSON & output
        echo json_encode($studentsArray);
    }

    // If No Students.
    else
    {
        echo json_encode
        (
            array('message' => 'No Students Found')
        );
    }

?>