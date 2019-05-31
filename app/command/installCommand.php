<?php

class installCommand implements CommandInterface
{
    public function start() {
        try {
            $query = file_get_contents(APP_PATH."dump/install.sql");
            $res = DB::prepare($query);

            if($res->execute())
                echo "install finished successfully....";
            else
                echo "error while installing...";
        } catch(Exception $e) {
            echo __CLASS__." ".__METHOD__." ".$e->getMessage();
        }

    }
}
