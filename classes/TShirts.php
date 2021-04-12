<?php

    class TShirts{
        public static function getTShirtsFormAvailability(){
            $date = date('Y-m-d');
            $check = DB::query('SELECT id FROM tshirts_form WHERE start_date <= :date AND end_date >= :date',array(':date'=>$date));
            if($check){
                return $check[0]['id'];
            }
            return false;
        }
        public static function getTshirtsFormData($id){
            return DB::query('SELECT * FROM tshirts_form WHERE id=:id',array(':id'=>$id));
        }
        public static function checkUserFilledTheForm($id,$user_id)
        {
            if(DB::query('SELECT 1 FROM tshirts_registrees WHERE form_id=:id AND member_id=:member_id', array(':id' => $id,':member_id'=>$user_id)))
                return true;
            return false;
        }
    }
?>