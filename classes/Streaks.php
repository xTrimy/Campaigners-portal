<?php

class Streaks{

    public static function getStreakInfo($user_id){
        $query = 'SELECT HOUR(NOW()) as currtime, MAX(streak) AS streak
FROM (
  SELECT id, user_id, `Timestamp`,
         DATEDIFF((NOW() - INTERVAL 1 DAY), `Timestamp`),
         @streak := IF( DATEDIFF((NOW() - INTERVAL 1 DAY), `Timestamp`) - @days_diff > 1, @streak, 
                       IF(@days_diff := DATEDIFF((NOW() - INTERVAL 1 DAY), `Timestamp`), @streak+1, @streak+1))  AS streak                                        
  FROM streaks
  CROSS JOIN (SELECT @streak := 0, @days_diff := -1) AS vars
  WHERE user_id = :user_id AND `Timestamp` <= NOW()
  ORDER BY `Timestamp` DESC) AS t';

        $streak_count = DB::query($query, array(':user_id' => $user_id));
       
        return ($streak_count[0]);
    }
    public static function getStreakCount($user_id){
        return self::getStreakInfo($user_id)['streak'];
    }
    public static function streakAlmostDies($user_id)
    {
        if (self::getStreakInfo($user_id)['currtime'] > 19 && self::checkTodayStreak($user_id)) {
            return "⌛";
        }
        return NULL;
    }
    public static function checkTodayStreak($user_id){
        $check_today_streak = DB::query('SELECT 1 FROM streaks WHERE user_id=:user_id AND `Timestamp` = CURDATE()', array(':user_id' => $user_id));
        return $check_today_streak;
    }
    public static function addNewStreakIfNotExist($user_id)
    {
        if(!self::checkTodayStreak($user_id)){
            DB::query('INSERT INTO streaks VALUES(\'\',:user_id,NOW(),0)',array(':user_id'=>$user_id));
        }
    }
    public static function getStreakCountMoreThanTwo($user_id)
    {
        $streak_count = self::getStreakCount($user_id);
        if($streak_count > 2){
            return $streak_count;
        }
        return 0;
    }

}

?>