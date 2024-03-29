<?php

class logFactory {

    function checkSize($file)
    {
        // By default 1 Kbyte
        $maxSize = 10485760;
        if(filesize($file) > $maxSize)
        {
            rename($file,$file.".".date("YmdhIs"));
        }
    }

    public static function log($class,$message)
    {
        global $log_folder;
        logFactory::checkSize($log_folder."app.log");
        try
        {
            $class = str_pad(get_parent_class($class).".".get_class($class), 20);
        }
        catch(Exception $e)
        {
            str_pad($class, 20);
        }
        if(LOG)
        {
            error_log(str_pad(date("Y-m-d h:i:s"), 20)." -- ".str_pad($class, 20)." +++ LOG   +++ ".$message."\n", 3, $log_folder."app.log");
        }
        if(VERBOSE)
        {
            print (str_pad(date("Y-m-d h:i:s"), 20)." -- ".str_pad($class, 20)." +++ LOG   +++ ".$message."\n<br />");
        }
    }

    public static function error($class,$message)
    {
        global $log_folder;
        logFactory::checkSize($log_folder."app.log");
        try
        {
            $class = str_pad(get_parent_class($class).".".get_class($class), 20);
        }
        catch(Exception $e)
        {
            str_pad($class, 20);
        }
        if(LOG)
        {
            error_log(str_pad(date("Y-m-d h:i:s"), 20)." -- ".str_pad($class, 20)." +++ ERROR +++ ".$message."\n", 3, $log_folder."app.log");
        }
        if(VERBOSE)
        {
            print (str_pad(date("Y-m-d h:i:s"), 20)." -- ".str_pad($class, 20)." +++ LOG   +++ ".$message."\n<br />");
        }
        if(VISUAL_ERRORS)
        {
          alert($message);
        }
    }
    
    public static function splunk($message)
    {
        global $log_folder;
        logFactory::checkSize($log_folder."splunk.log");
        error_log(str_pad(date("Y-m-d h:i:s"), 20)." logger=\"splunk\" ".str_pad($class, 20)." ".$message."\n", 3, $log_folder."splunk.log");
    }
}
?>