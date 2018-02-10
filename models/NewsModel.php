<?php

/**
 * Created by PhpStorm.
 * User: Nikolay
 * Date: 8/9/2016
 * Time: 7:29 PM
 */
class NewsModel extends BaseModel
{
    public function getLastNews(int $maxCount = 5) : array
    {
        $statement  = self::$db->query(
            "SELECT news.id, title, body, date, full_name
            FROM news LEFT JOIN users on news.users_id = users.id
            ORDER BY date DESC  LIMIT $maxCount");
        return  $statement->fetch_all(MYSQLI_ASSOC);
    }

    public function insert(string $title, $body, int $user_id): bool
    {
        $title = htmlspecialchars($title);
        $body = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $body);
        $statement = self::$db->prepare(
            "INSERT INTO news(title,body,users_id) VALUES(?,?,?)"
        );
        $statement->bind_param("ssi",$title,$body,$user_id);
        $statement->execute();
        if ($statement->affected_rows !=1)
            return false;
        return true;
    }

    public function update(int $id,$title,$body) : bool
    {
        $statement = self::$db->prepare(
            "UPDATE news 
            SET title=?,body=?,
            date=CURRENT_TIMESTAMP where id = ?"
        );
        $statement->bind_param("ssi",$title,$body,$id);
        $statement->execute();
        return $statement->affected_rows == 1;
    }

    public function getById(int $id) :array
    {
        $statement = self::$db->prepare(
            "SELECT news.id, title, body, date, full_name
            FROM news LEFT JOIN users on news.users_id = users.id
            WHERE news.id = ?"
        );
        $statement->bind_param("i",$id);
        $statement->execute();
        $result = $statement->get_result()->fetch_assoc();
        return $result;
    }
    
    public function getUserNewsTitles(int $user_id)
    {
        $statement = self::$db->query(
            "SELECT id, title, users_id,date 
             FROM news WHERE users_id = $user_id
             ORDER BY date DESC"
        );
        return $statement->fetch_all(MYSQLI_ASSOC);
    }

    public function remove(int $id):bool
    {
        $statement = self::$db->prepare(
            "DELETE FROM news
             WHERE id = ?"
        );
        $statement->bind_param("i",$id);
        $statement->execute();
        return $statement->affected_rows == 1;
    }
}