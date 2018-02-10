<?php
class ManageathletesModel extends BaseModel
{
  public function getCountries() : array
  {
    $statement = self::$db->query("SELECT id, full_name FROM countries");
    $result = $statement->fetch_all(MYSQLI_ASSOC);
    return $result;
  }

  public function getSports() : array
  {
    $statement = self::$db->query("SELECT id, name FROM sports");
    $result = $statement->fetch_all(MYSQLI_ASSOC);
    return $result;
  }

  public function getAllAthletes() : array
  {
    $statement = self::$db->query("SELECT players.id AS playerID, players.full_name AS playerName,
      players.age AS playerAge, players.isTeam,
      sports.name AS sportName, countries.full_name AS countryName
      FROM players
      JOIN sports ON players.sports_id = sports.id
      JOIN players_has_countries ON players.id = players_has_countries.players_id
      JOIN countries ON players_has_countries.countries_id = countries.id");
    $result = $statement->fetch_all(MYSQLI_ASSOC);
    return $result;
  }

  public function addAthlete($isTeam, $full_name, $age, $sportID, $countryID) : bool
  {
    $isTeam = htmlspecialchars($isTeam);
    $full_name = htmlspecialchars($full_name);
    $age = htmlspecialchars($age);
    $sportID = htmlspecialchars($sportID);
    $countryID = htmlspecialchars($countryID);

    $statement = self::$db->prepare("INSERT INTO players (full_name, age, sports_id, isTeam) VALUES (?, ?, ?, ?)");
    $statement->bind_param("siii", $full_name, $age, $sportID, $isTeam);
    $statement->execute();
    if($statement->affected_rows == 1)
    {
      $playerID = self::$db->query("SELECT LAST_INSERT_ID()")->fetch_row()[0];
      $statement = self::$db->prepare("INSERT INTO players_has_countries (players_id, countries_id)
      VALUES (?, ?)");
      $statement->bind_param("ii", $playerID, $countryID);
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

  public function getAthlete($id) : array
  {
    $id = htmlspecialchars($id);
    $statement = self::$db->prepare("SELECT players.id AS playerID, players.full_name AS playerName,
      players.age AS playerAge, players.isTeam,
      sports.id AS sportID, sports.name AS sportName,
      countries.id AS countryID, countries.full_name AS countryName
      FROM players
      JOIN sports ON players.sports_id = sports.id
      JOIN players_has_countries ON players.id = players_has_countries.players_id
      JOIN countries ON players_has_countries.countries_id = countries.id
      WHERE players.id = ?");
    $statement->bind_param("i", $id);
    $statement->execute();
    $result = $statement->get_result()->fetch_assoc();
    return $result;
  }

  public function editAthlete($id, $full_name, $age, $sportID, $countryID, $isTeam) : bool
  {
    $id = htmlspecialchars($id);
    $full_name = htmlspecialchars($full_name);
    $age = htmlspecialchars($age);
    $sportID = htmlspecialchars($sportID);
    $countryID = htmlspecialchars($countryID);
    $isTeam = htmlspecialchars($isTeam);

    $statement = self::$db->prepare("UPDATE players SET full_name = ?, age = ?, sports_id = ?, isTeam = ?
    WHERE id = ?");
    $statement->bind_param("siiii", $full_name, $age, $sportID, $isTeam, $id);
    $statement->execute();
    if(!$statement->errno)
    {
      $statement = self::$db->prepare("UPDATE players_has_countries SET countries_id = ?
      WHERE players_id = ?");
      $statement->bind_param("ii", $countryID, $id);
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

  public function deleteAthlete($id) : bool
  {
    $id = htmlspecialchars($id);
    $statement = self::$db->prepare("DELETE FROM players_has_countries WHERE players_id = ?");
    $statement->bind_param("i", $id);
    $statement->execute();
    var_dump($statement->error);
    if($statement->affected_rows == 1)
    {
      $statement = self::$db->prepare("DELETE FROM players WHERE id = ?");
      $statement->bind_param("i", $id);
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
}
?>
