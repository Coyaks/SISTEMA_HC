<?php

    function humanDatetime($datetime){ //2022-02-25 02:10:26 ->25/02/2022 02:10:26
        $datetime=date_create($datetime);
        return date_format($datetime,"d/m/Y H:i:s");
    }

    function getDatetimeDB(){
        // Set the new timezone
        date_default_timezone_set('America/Lima');
        $date = date('Y-m-d h:i:s');
        return $date;
    }
    
    function getHumanDatetime(){ //2022-02-25 02:10:26 ->25/02/2022 02:10:26
        $datetimeDB=getDatetimeDB();
        return humanDatetime($datetimeDB);
    }

?>