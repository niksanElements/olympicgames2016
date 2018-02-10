<?php
class ForumModel extends BaseModel
{
    public function add(string $title,string $body,int $user_id) :int
    {
        $title = htmlspecialchars($title);
        $body = htmlspecialchars($body);
        $statement = self::$db->prepare(
            "INSERT INTO post(title,body,user_id) VALUES(?,?,?)"
        );
        $statement->bind_param("ssi",$title,$body,$user_id);
        $statement->execute();
        if ($statement->affected_rows !=1)
            return 0;
        return $userID = self::$db -> query("SELECT LAST_INSERT_ID()")->fetch_row()[0];
    }

    public function getById(int $id) :array
    {
        $statement = self::$db->prepare(
            "SELECT post.id, title, body, date, full_name
            FROM post LEFT JOIN users on post.user_id = users.id
            WHERE post.id = ?"
        );
        $statement->bind_param("i",$id);
        $statement->execute();
        $result = $statement->get_result()->fetch_assoc();
        return $result;
    }

    public function getLastPosts(int $maxCount = 5) : array
    {    
        $statement = self::$db->query(
            "SELECT post.id, title, body, date, full_name
            FROM post LEFT JOIN users on post.user_id = users.id
            ORDER BY date DESC  LIMIT $maxCount");
        // var_dump($statement);
        return  $statement->fetch_all(MYSQLI_ASSOC);
    }
}