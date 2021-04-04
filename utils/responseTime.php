<?php

    // The source of this function.
    // .
    // ..
    // ...
    // https://tech.fireflake.com/2008/09/17/using-php-to-check-response-time-of-http-server/
    
    // check responsetime for a webbserver
    function pingDomain($domain)
    {
        $starttime = microtime(true);

        // supress error messages with @
        $file      = @fsockopen($domain, 80, $errno, $errstr, 10);
        $stoptime  = microtime(true);
        $status    = 0;

        if (!$file)
        {
            $status = -1;  // Site is down
        }

        else
        {
            fclose($file);
            $status = ($stoptime - $starttime) * 1000;
            $status = floor($status);
        }

        return $status;
    }
?>