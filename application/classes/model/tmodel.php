<?php
/*
 * If a connection of type 'mysql' is defined, then a corrosponding 
 * 'database' => 'database-name' field is mandatory.  
 * 
 * !Caution! The script drops all existing databases, populated or otherwise.
 * 
 * Author: abhishek
 * 
 */
defined('SYSPATH') or die('No direct script access.');

Class Model_Tmodel extends Model {
    public function schema_dump($inputs) {
        echo "<pre>";
        
        $conn = Kohana::config('database')
                ->as_array();
        $n_conn = count($conn);
        echo "\nDumps:\n";
        
        foreach ($conn as $key => $value) {
            //Using only 'type'=>'mysql' connections
            if($value["type"] == "mysql"){
                $username   = $value["connection"]["username"];
                $db         = $value["connection"]["database"];
                $hostname   = $value["connection"]["hostname"];
                $password   = $value["connection"]["password"];
                $dump_file  = "/tmp/schema_$key.sql";
                
                
                
                $run = "mysqldump $db -u $username --host=$hostname -p$password -d -B --add-drop-table > $dump_file";
                $output = shell_exec($run);
                echo "\t$dump_file\n";
            }
        }        

        echo "</pre>";
    }
    
}