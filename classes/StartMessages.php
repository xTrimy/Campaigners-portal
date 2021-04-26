<?php 
    class SM{
        public static function markAsRead($user_id,$message_id){
            DB::query('INSERT INTO member_seen_start_message VALUES(\'\',:user_id,:message_id,0)',array(
                ':user_id'=>$user_id,
                ':message_id'=>$message_id,
            ));
        }

        public static function getNewMessages($user_id){
            $check_new_messages = DB::query('SELECT *,s.id as s_id FROM start_messages s,start_messages_pages p WHERE p.message_id = s.id AND s.id NOT IN (SELECT m.message_id FROM member_seen_start_message m WHERE m.user_id=:user_id) LIMIT 10',array(
                ':user_id'=>$user_id
            ));
            if($check_new_messages){
                self::markAsRead($user_id, $check_new_messages[0]['s_id']);
                return $check_new_messages;
            }
            return 0;
        }

    }
?>