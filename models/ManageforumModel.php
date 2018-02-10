<?php

class ManageforumModel extends BaseModel
{
    public function getAllPosts()
    {
        $statement = self::$db->query(
            "SELECT * FROM post"
        );
        return $statement->fetch_all(MYSQLI_ASSOC);
    }

    public function getById(int $id)
    {
        $statement = self::$db->query(
            "SELECT * FROM post WHERE id = $id"
        );
        return $statement->fetch_assoc();
    }

    public function edit(int $id,string $title,string $body) : bool
    {
        $statement = self::$db->prepare(
            "UPDATE post SET title = ?, body = ? WHERE id = ?"
        );
        $statement->bind_param("ssi",$title,$body,$id);
        $statement->execute();
        return $statement->affected_rows == 1;
    }

    public function deleteComments(int $id) : bool
    {
        $statement = self::$db->prepare("DELETE FROM post_comments WHERE posts_id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();
        if(!$statement->errno)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function delete(int $id):bool
    {
        $statement = self::$db->prepare(
            "DELETE FROM post
             WHERE id = ?"
        );
        $statement->bind_param("i",$id);
        $statement->execute();
        return $statement->affected_rows == 1;
    }
}