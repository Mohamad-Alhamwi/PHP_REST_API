<?php

    function requistsLogger($method, $responseTime, $timeStamp)
    {
        // Note For Me:
        // __FILE__ is the full path of the currently running PHP script. 
        // dirname() returns the containing directory of a given file.
        // Getting PHP Script Directory.
        //$currentDirectory = dirname(__FILE__);

        // Opening The File.
        $file = fopen('../../logs/requistsLogs.txt', 'a');

        //Writing To The File.
        fwrite($file, "\"" . $method . ", " . $responseTime . ", " . $timeStamp . "\"" . "\n");
        
        //Closing The File.
        fclose($file);
    }
