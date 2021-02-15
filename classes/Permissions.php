<?php

class Permissions{
    //Sorted lowest level to highest
    private static $user_permissions = [
        'trainee'=>false,
        'member'=>false,
        'co-head'=>false,
        'head'=>false,
        'ac-manager'=>false,
        'oc-manager'=>false,
        'vice-president'=>false,
        'president'=>false,
        'it-manager'=>false,
    ];
    private static $access_level = 0;
    public static function grantPermission($level_name){
        $level_name = strtolower($level_name);
        switch($level_name){
            case "member":
                self::$user_permissions['member'] =true;
                self::$access_level = ((self::$access_level>1)?self::$access_level:1);
                break;
            case "trainee":
                self::$user_permissions['trainee'] =true;
                break;
            case "head":
                self::$user_permissions['head'] =true;
                self::$access_level = ((self::$access_level>2)?self::$access_level:2);
                break;
            case "co-head":
                self::$user_permissions['co-head'] =true;
                self::$access_level = ((self::$access_level>2)?self::$access_level:2);
                break;
            case "president":
                self::$user_permissions['president'] =true;
                self::$access_level = ((self::$access_level>9)?self::$access_level:9);
                break;
            case "vice president":
                self::$user_permissions['vice-president'] =true;
                self::$access_level = ((self::$access_level>9)?self::$access_level:9);
                break;
            case "oc manager":
                self::$user_permissions['oc-manager'] =true;
                self::$access_level = ((self::$access_level>4)?self::$access_level:4);
                break;
            case "ac manager":
                self::$user_permissions['ac-manager'] =true;
                self::$access_level = ((self::$access_level>3)?self::$access_level:3);
                break;
            case "it manager":
                self::$user_permissions['it-manager'] =true;
                self::$access_level = ((self::$access_level>10)?self::$access_level:10);
                break;
        }
    }
    public static function getAccessLevel(){
        return self::$access_level;
    }
    public static function getUserLevel($user_id){
        $get_user_level = DB::query('SELECT p.name FROM positions p,members m WHERE p.id=m.position_id AND m.id=:id',array(':id'=>$user_id));
        if($get_user_level){
            return $get_user_level[0]['name'];
        }
        header('Location:index.php?error=403');
        exit;
    }
    public static function getHighestPermission($user_id){
        foreach ( array_reverse(self::$user_permissions) as $permission => $value ) {
            if($value){
                return $permission;
            }
        }

    }

}

?>