<?php
class DB
{
    // DB Connection 
    private static function connect()
    {
        $pdo = new PDO('mysql:host=localhost;dbname=campaigners_portal;charset=utf8mb4;collation=utf8_general_ci', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }

    // Query method that takes params 
    public static function query($query, $params = array())
    {

        //is_deleted handling START
        $query = str_replace(","," , ",$query);
        $query_exploded =explode(' ', $query);
        if($query_exploded[0] == 'SELECT'){
            $counter=0;
            foreach($query_exploded as $q){
                $counter++;
                if($q == "FROM"){
                    break;
                }
            }
            $table_name = $query_exploded[$counter];
            if(!empty($query_exploded[$counter+1])){
                if(strlen($query_exploded[$counter+1]) == 1){
                    $table_name = $query_exploded[$counter+1];
                }
            }
            if(strpos($query,'WHERE')){
                $query = str_replace("WHERE","WHERE ".$table_name.".is_deleted=0 AND",$query);
            }else if(strpos($query,'ORDER BY')){
                $query = str_replace("ORDER BY","WHERE ".$table_name.".is_deleted=0 ORDER BY",$query);
            }else{
                $query .= " WHERE ".$table_name.".is_deleted=0";
            }
        }
        //is_deleted handling END

        $statement = self::connect()->prepare($query);
        $statement->execute($params);

        if($query_exploded[0] == 'SELECT'){
        $data = $statement->fetchAll();
        return $data;
           }

        } 
}
?>