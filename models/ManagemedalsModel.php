<?php
class ManagemedalsModel extends BaseModel
{
  public function getAllMedals() : array
  {
    $statement = self::$db->query("SELECT medals.*, players.full_name AS winner FROM medals
    LEFT JOIN medals_has_players ON medals_has_players.medals_id = medals.id
    LEFT JOIN players ON players.id = medals_has_players.players_id");
    $result = $statement -> fetch_all(MYSQLI_ASSOC);
    return $result;
  }

  public function getAllAthletes() : array
  {
    $statement = self::$db->query("SELECT id, full_name FROM players");
    $result = $statement -> fetch_all(MYSQLI_ASSOC);
    return $result;
  }

  public function addMedal($name, $type, $playerID) : bool
  {
    $name = htmlspecialchars($name);
    $type = htmlspecialchars($type);
    $playerID = htmlspecialchars($playerID);
    $statement = self::$db->prepare("INSERT INTO medals (name, type) VALUES (?, ?)");
    $statement->bind_param("ss", $name, $type);
    $statement->execute();
    if($statement->affected_rows == 1)
    {
      $medalID = self::$db -> query("SELECT LAST_INSERT_ID()")->fetch_row()[0];
      $statement = self::$db->prepare("INSERT INTO medals_has_players (medals_id, players_id) VALUES (?, ?)");
      $statement->bind_param("ii", $medalID, $playerID);
      $statement->execute();
      if($statement->affected_rows == 1)
      {
        $statement = self::$db->prepare("INSERT INTO medals_has_countries (medals_id, countries_id)
        VALUES (?, (SELECT countries.id FROM countries
          RIGHT JOIN players_has_countries ON players_has_countries.countries_id = countries.id
          RIGHT JOIN players ON players.id = players_has_countries.players_id
          WHERE players.id = ?))");
        $statement->bind_param("ii", $medalID, $playerID);
        $statement->execute();
        if($statement->affected_rows == 1)
        {
          return true;
        }
        else
        {
          return false;
        }
      }
      else
      {
        return false;
      }
    }
    else
    {
      return false;
    }
  }

  public function getMedal($id) : array
  {
    $statement = self::$db->prepare("SELECT medals.*, medals_has_players.players_id AS playerID FROM medals
      LEFT JOIN medals_has_players ON medals_has_players.medals_id = medals.id
      WHERE id = ?");
    $statement->bind_param("i", $id);
    $statement->execute();
    $result = $statement ->get_result()->fetch_assoc();
    return $result;
  }

  public function editMedal($id, $name, $type, $playerID) : bool
  {
    $name = htmlspecialchars($name);
    $type = htmlspecialchars($type);
    $playerID = htmlspecialchars($playerID);
    $statement = self::$db->prepare("UPDATE medals SET name = ?, type =? WHERE id = ?");
    $statement->bind_param("ssi",$name, $type, $id);
    $statement->execute();
    if(!$statement->errno)
    {
      $statement = self::$db->prepare("UPDATE medals_has_players SET players_id = ?
      WHERE medals_id = ?");
      $statement->bind_param("ii", $playerID, $id);
      $statement->execute();
      if(!$statement->errno)
      {
        $statement = self::$db->prepare("UPDATE medals_has_countries SET countries_id = (
          SELECT countries.id FROM countries
          RIGHT JOIN players_has_countries ON players_has_countries.countries_id = countries.id
          RIGHT JOIN players ON players.id = players_has_countries.players_id
          WHERE players.id = ?)
          WHERE medals_id = ?");
        $statement->bind_param("ii", $playerID, $id);
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
      else
      {
        return false;
      }
    }
    else
    {
      return false;
    }
  }

  public function deleteMedal($id) : bool
  {
    $statement = self::$db->prepare("DELETE FROM medals_has_countries WHERE medals_id = ?");
    $statement->bind_param("i", $id);
    $statement->execute();
    if(!$statement->errno)
    {
      $statement = self::$db->prepare("DELETE FROM medals_has_players WHERE medals_id = ?");
      $statement->bind_param("i", $id);
      $statement->execute();
      if(!$statement->errno)
      {
        $statement = self::$db->prepare("DELETE FROM medals WHERE id = ?");
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
      else
      {
        return false;
      }
    }
    else
    {
      return false;
    }
  }
}
?>
