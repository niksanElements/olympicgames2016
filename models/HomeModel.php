<?php
class HomeModel extends BaseModel
{
    public function getHomeContentGuest()
    {
        $statement = self::$db -> query("SELECT homePageGuest FROM content LIMIT 0, 1");
        $result = $statement -> fetch_all(MYSQLI_ASSOC);
        return $result[0]["homePageGuest"];
    }

    public function getHomeContentUser()
    {
        $statement = self::$db -> query("SELECT homePageUser FROM content LIMIT 0, 1");
        $result = $statement -> fetch_all(MYSQLI_ASSOC);
        return $result[0]["homePageUser"];
    }
    
}
?>
