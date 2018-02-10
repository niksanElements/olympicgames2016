<?php
class CommentsModel extends BaseModel
{
    /**   News Comments **/
    public function addNewsComment($msg,int $newsID,int $userID = null) : bool
    {
        $comment = htmlspecialchars($msg);
        $statement = self::$db->prepare(
            "INSERT INTO news_comments(body,news_id,users_id) VALUES(?,?,?)"
        );
        $statement->bind_param("sii",$comment,$newsID,$userID);
        $statement->execute();
        return $statement->affected_rows == 1;
    }
    public  function  getNewsComments(int $newsId) : array
    {
        $statement  = self::$db->query(
            "SELECT id, body, users_id, date
            FROM news_comments WHERE news_id = $newsId
            ORDER BY date DESC");
        return  $statement->fetch_all(MYSQLI_ASSOC);
    }

    public function deleteNewsComments(int $id)
    {
        $statement = self::$db->prepare("DELETE FROM news_comments WHERE news_id = ?");
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

    /**   Post Comments **/
    public function addPostComment($msg,int $postID,int $userID = null) : bool
    {
        $comment = htmlspecialchars($msg);
        $statement = self::$db->prepare(
            "INSERT INTO post_comments(body,posts_id,users_id) VALUES(?,?,?)"
        );
        $statement->bind_param("sii",$comment,$postID,$userID);
        $statement->execute();
        return $statement->affected_rows == 1;
    }
    public  function  getPostComments(int $postId) : array
    {
        $statement  = self::$db->query(
            "SELECT id,  body, users_id, date
            FROM post_comments WHERE posts_id = $postId
            ORDER BY date DESC");
        return  $statement->fetch_all(MYSQLI_ASSOC);
    }

    //this function return the post titles and ides
    //order by post_comments last update
    public function getRecantComments(int $maxComments = 5) : array
    {
        $statement = self::$db->query(
            "SELECT post.title,post.id
                FROM post
                LEFT JOIN post_comments
                ON post_comments.posts_id = post.id
                ORDER BY post_comments.date DESC
                LIMIT $maxComments"
                # GROUP BY post.id
        );
        return $statement->fetch_all(MYSQLI_ASSOC);
    }

    public function getForumComments(string $char)
    {
        $statement = self::$db->query(
            "SELECT post.title,post.id
            FROM post
            WHERE LEFT(title,1) = \"$char \"
            ORDER BY title"
        );
        return $statement->fetch_all(MYSQLI_ASSOC);
    }

    public function getForumCommentsAll()
    {
        $statement = self::$db->query(
            "SELECT post.title,post.id
            FROM post
            ORDER BY title"
        );
        return $statement->fetch_all(MYSQLI_ASSOC);
    }


    /** General **/

    public function delete(string $dbName, int $id)
    {
        if($dbName === "post_comments" || $dbName === "news_comments") {
            $statement = self::$db->prepare("DELETE FROM $dbName WHERE id = ?");
            $statement->bind_param("i", $id);
            $statement->execute();
        }
        return $statement->affected_rows == 1;
    }

}