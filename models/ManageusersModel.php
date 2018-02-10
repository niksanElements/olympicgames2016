<?php
/**
 * Created by PhpStorm.
 * User: Chelikov
 * Date: 18.8.2016 г.
 * Time: 19:31 ч.
 */

class ManageusersModel extends BaseModel
{
    public function getAllUsers() : array
    {
        $statement = self::$db -> query("SELECT * FROM users");
        $result = $statement -> fetch_all(MYSQLI_ASSOC);
        return $result;
    }

    public function getUser($id) : array
    {
        $statement = self::$db->prepare(
            "SELECT * FROM users WHERE id = ?");
        $statement ->bind_param("i", $id);
        $statement->execute();
        $result = $statement ->get_result()->fetch_assoc();
        return $result;
    }

    public function editUser(
        $id, $username, $full_name, $email, $status, $password
    ) : bool
    {
        $id = htmlspecialchars($id);
        $username = htmlspecialchars($username);
        $full_name = htmlspecialchars($full_name);
        $email = htmlspecialchars($email);
        $status = htmlspecialchars($status);

        if($password != NULL) {
            $password_hash = password_hash($password, PASSWORD_DEFAULT);
            $statement = self::$db->prepare(
                "UPDATE users SET username = ?, full_name = ?, email = ?, password_hash = ?, status = ? 
            WHERE id = ?");
            $statement->bind_param("sssssi", $username, $full_name, $email, $password_hash, $status, $id);
            $statement->execute();
        }
        else {
            $statement = self::$db->prepare(
                "UPDATE users SET username = ?, full_name = ?, email = ?, status = ? 
            WHERE id = ?");
            $statement->bind_param("ssssi", $username, $full_name, $email, $status, $id);
            $statement->execute();
        }
        if($statement->affected_rows != 1)
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    public function deleteUser($id)
    {
        $statement = self::$db->prepare("DELETE FROM users WHERE id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();
        if($statement->affected_rows != 1)
        {
            return false;
        }
        else
        {
            return true;
        }
    }
}