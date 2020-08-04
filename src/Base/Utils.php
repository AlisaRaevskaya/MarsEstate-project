<?php

namespace Alisa\MarsEstate\Base\Utils;

class Utils{

    public static function getRandom(){
            $max_len =10;
            $chars = 'abdefhiknrstyzABDEFGHKNQRSTYZ23456789';
            $session_name = substr($chars, rand(1, strlen($chars)), $max_len);
            return $session_name;
            }
    }

    public static function getSessionId(){
        return 
    }
}