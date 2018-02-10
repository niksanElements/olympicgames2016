<?php
class ManagecontactusModel extends BaseModel
{
  public function getAllContacts() : array
  {
    $statement = self::$db->query("SELECT * FROM contactus");
    $result = $statement -> fetch_all(MYSQLI_ASSOC);
    return $result;
  }

  public function addContact($name, $age, $body, $education, $passion, $work) : bool
  {
    $name = htmlspecialchars($name);
    $body = htmlspecialchars($body);
    $age = htmlspecialchars($age);
    $education = htmlspecialchars($education);
    $passion = htmlspecialchars($passion);
    $work = htmlspecialchars($work);
    $statement = self::$db->prepare("INSERT INTO contactus (name, age, body, education, passion, work ) VALUES (?,?,?,?,?,?)");
    $statement->bind_param("sissss", $name, $age, $body, $education, $passion, $work);
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

  public function getContact($id) : array
  {
    $statement = self::$db->prepare("SELECT * FROM contactus WHERE id = ?");
    $statement->bind_param("i", $id);
    $statement->execute();
    $result = $statement ->get_result()->fetch_assoc();
    return $result;
  }

  public function editContact($id, $name, $age, $body, $education, $passion, $work) : bool
  {
    $name = htmlspecialchars($name);
    $body = htmlspecialchars($body);
    $age = htmlspecialchars($age);
    $education = htmlspecialchars($education);
    $passion = htmlspecialchars($passion);
    $work = htmlspecialchars($work);
    
    $statement = self::$db->prepare("UPDATE contactus SET name = ?, age = ?, body = ?, education =?, passion =?, work = ?
      WHERE id = ?");
    $statement->bind_param("sissssi", $name, $age, $body, $education, $passion, $work, $id);
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

  public function deleteContact($id) : bool
  {
    $statement = self::$db->prepare("DELETE FROM contactus WHERE id = ?");
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
}
?>
