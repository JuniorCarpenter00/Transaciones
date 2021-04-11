<?php 

Class Log{

    public function logger($log){
        if (!file_exists(('log.txt'))) {
            file_put_contents('log.txt', '');
        }
        date_default_timezone_set("America/Santo_Domingo");
        $time = date('m/d/y h:iA', time());

        $contents = file_get_contents('log.txt');
        $contents .= "<b>$time</b>\t$log\r";

        file_put_contents('log.txt',$contents);

    }

}
