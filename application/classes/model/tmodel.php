<?php

defined('SYSPATH') or die('No direct script access.');

Class Model_Tmodel extends Model {

    public function do_tiwari_insert($fuck) {
        $query = "insert into tiwari_tbl (_t2_var, _t3_int)
                    values
                      (:blah_var, :blah_int) ;";

        $ret = DB::query(Database::INSERT, $query)
                ->param(':blah_var', $fuck['blah_var'])
                ->param(':blah_int', $fuck['blah_int'])
                ->execute();

        echo "<pre>";
        var_dump($ret);
        echo "</pre>";
        return 'done';
    }

    public function do_tiwari_select() {

        $query = 'select * from tiwari_tbl;';

        $ret = DB::query(Database::SELECT, $query)
                ->execute()
                ->as_array();
        echo "<pre>";
        var_dump($ret);
        echo "</pre>";
    }

}