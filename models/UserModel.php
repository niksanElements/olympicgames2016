<?php
/**
 * Created by PhpStorm.
 * User: Tani
 * Date: 06.08.2016 г.
 * Time: 13:56 ч.
 */
class UserModel extends BaseModel
{
    public function registration(
        string $username, string $password, string $fullName, string $email){
        $password_hash = password_hash($password,PASSWORD_DEFAULT);

        $username = htmlspecialchars($username);
        $fullName = htmlspecialchars($fullName);
        $email = htmlspecialchars($email);

        $statement = self:: $db->prepare(
            "INSERT INTO users (username, password_hash, full_name, email) values (?,?,?,?)");
        $statement->bind_param("ssss", $username, $password_hash, $fullName, $email);
        $statement->execute();
        if ($statement->affected_rows !=1)
            return false;
        $userID = self::$db -> query("SELECT LAST_INSERT_ID()")->fetch_row()[0];
        return $userID;
    }
    public function login(string $username, string $password)
    {
        $returnResult = Array();
        $statement = self::$db->prepare(
        "SELECT id, password_hash, status FROM users WHERE username = ?");
        $statement ->bind_param("s", $username);
        $statement->execute();
        $result = $statement ->get_result()->fetch_assoc();
        if (password_verify($password, $result['password_hash'])){
          $returnResult["userID"] = $result["id"];
          if($result['status'] == 'A'){
            $returnResult["status"] = "A";
          }
          else if($result['status'] == 'R'){
              $returnResult['status'] = 'R';
          }
          else {
            $returnResult["status"] = "U";
          }
          return $returnResult;
        }
        return false;
    }

    public function getUserAccount($id)
    {
        $statement = self::$db->prepare(
            "SELECT * FROM users WHERE id = ?");
        $statement ->bind_param("i", $id);
        $statement->execute();
        $result = $statement ->get_result()->fetch_assoc();
        return $result;
    }

    public function editUserAccount($id, $full_name, $email, $password)
    {
        $id = htmlspecialchars($id);
        $full_name = htmlspecialchars($full_name);
        $email = htmlspecialchars($email);

        if($password != NULL) {
            $password_hash = password_hash($password, PASSWORD_DEFAULT);
            $statement = self::$db->prepare(
                "UPDATE users SET full_name = ?, email = ?, password_hash = ? 
            WHERE id = ?");
            $statement->bind_param("sssi", $full_name, $email, $password_hash, $id);
            $statement->execute();
        }
        else {
            $statement = self::$db->prepare(
                "UPDATE users SET full_name = ?, email = ? 
            WHERE id = ?");
            $statement->bind_param("ssi", $full_name, $email, $id);
            $statement->execute();
        }
        if($statement->errno)
        {
            return false;
        }
        else {
            return true;
        }
    }
}
