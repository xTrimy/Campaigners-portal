<?php 

class Notifications{
    private static function createNotification($recipient_id,$committee_id,$sender_id,$type,$parameters,$refrence_id){
        $unread = 1;
        $created_at = date('Y-m-d H:i:s');
        DB::query('INSERT INTO notifications VALUES(\'\',:recipient_id,:committee_id,:sender_id,:unread,:type,:parameters,:refrence_id,:created_at,0)'
        ,array(
                ':recipient_id'=>$recipient_id,
                ':committee_id'=> $committee_id,
                ':sender_id'=> $sender_id,
                ':unread'=> $unread,
                ':type'=> $type,
                ':parameters' => $parameters,
                ':refrence_id' => $refrence_id,
                ':created_at' => $created_at
        ));
    }
    public static function createNotificationForUser($recipient_id,$type,$parameters,$sender_id = NULL){
        self::createNotification($recipient_id,NULL,$sender_id,$type,$parameters,NULL);
    }
    public static function createPublicNotification($type,$parameters,$sender_id = NULL){
        self::createNotification(NULL, NULL, $sender_id, $type, $parameters, NULL);
    }
    public static function createNotificationForCommittee($committee_id,$type, $parameters,$sender_id = NULL)
    {
        self::createNotification(NULL, $committee_id, $sender_id, $type, $parameters, NULL);
    }

    public static function createNotificationForUserWithRefrence($recipient_id, $type, $parameters,$refrence_id, $sender_id = NULL)
    {
        self::createNotification($recipient_id, NULL, $sender_id, $type, $parameters, $refrence_id);
    }
    public static function createPublicNotificationWithRefrence($type, $parameters,$refrence_id, $sender_id = NULL)
    {
        self::createNotification(NULL, NULL, $sender_id, $type, $parameters, $refrence_id);
    }
    public static function createNotificationForCommitteeWithRefrence($committee_id, $type, $parameters,$refrence_id, $sender_id = NULL)
    {
        self::createNotification(NULL, $committee_id, $sender_id, $type, $parameters, $refrence_id);
    }

    public static function getUserNotifications($user_id,$limit=20){
        if(!is_int($limit)){
            $limit = 20;
        }
        $notifications = DB::query(
            'SELECT n.*,k.name as sender,k.image as sender_image,m.committee_id as committee FROM notifications n LEFT JOIN members m ON n.recipient_id=m.id LEFT JOIN members k ON n.sender_id = k.id WHERE (recipient_id=:user_id OR recipient_id IS NULL) AND (n.committee_id IS NULL OR n.committee_id = m.committee_id) ORDER BY n.unread DESC,n.created_at DESC LIMIT '.$limit
        ,array(':user_id'=>$user_id));
        return $notifications;
    }
}

?>