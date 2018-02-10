<?php
class ManagenewsModel extends BaseModel
{
    public function getAllNews() : array
    {
        $statement = self::$db->query("SELECT * FROM news");
        $result = $statement -> fetch_all(MYSQLI_ASSOC);
        return $result;
    }
}
?>
