<?php
    function formatTime($current) {    
        $timestamp = strtotime($current);
        $date = \Carbon\Carbon::createFromTimestamp($timestamp);

        return $date->diffForHumans(); //output the DiffForHumans()

    }    
?>