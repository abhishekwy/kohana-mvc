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
    
    public function phpcli($input_get){
        echo "<pre>";

        for($j=0; $j < $n_tables; $j++){
                $tablename = $r_tables[$j]["Tables_in_mysql"];
                //echo "$db_to_ignore.$tablename\n";
                $db_tb = $db_to_ignore.".".$tablename;
                echo $db_tb."\n";
                $ignore=$header.$db_tb;
                //echo $ignore."\n";
                $aggregated_ignore=$aggregated_ignore.$ignore." ";
        }
       //echo $aggregated_ignore;
        /*
         * Created an ignore list for all tables in database: 'mysql'
         * Append $aggregated_ignore to do this.
         */
        
        $shell_program="mysqldump";
        $username="root";
        $password="webyog";
        $append=" --ignore-table mysql.`slow_log`";
        
        //$run = "$shell_program -u $username -d --add-drop-table --all-databases -p$password ";
        $run = "$shell_program -u $username -d --add-drop-table --all-databases -p$password ".$aggregated_ignore;
        //echo "/* QUERY= ".$run." */\n";
        $output = shell_exec($run);
        echo $output;
        
        echo "</pre>";
        }
}