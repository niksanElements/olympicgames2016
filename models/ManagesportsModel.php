<?php
class ManagesportsModel extends BaseModel
{
  public function getAllSports() : array
  {
    $statement = self::$db->query("SELECT sports.*, venues.venue_name AS venue FROM sports
    LEFT JOIN venues ON venues.id = sports.venue");
    $result = $statement -> fetch_all(MYSQLI_ASSOC);
    return $result;
  }

  public function getAllVenues() : array
  {
    $statement = self::$db->query("SELECT * FROM venues");
    $result = $statement -> fetch_all(MYSQLI_ASSOC);
    return $result;
  }

  public function addSport($name, $venueID) : bool
  {
    $name = htmlspecialchars($name);
    $venueID = htmlspecialchars($venueID);
    $statement = self::$db->prepare("INSERT INTO sports (name, venue) VALUES (?, ?)");
    $statement->bind_param("si", $name, $venueID);
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

  public function getSport($id) : array
  {
    $statement = self::$db->prepare("SELECT * FROM sports WHERE id = ?");
    $statement->bind_param("i", $id);
    $statement->execute();
    $result = $statement ->get_result()->fetch_assoc();
    return $result;
  }

  public function editSport($id, $name, $venueID) : bool
  {
    $name = htmlspecialchars($name);
    $statement = self::$db->prepare("UPDATE sports SET name = ?, venue = ? WHERE id = ?");
    $statement->bind_param("sii", $name, $venueID, $id);
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

  public function deleteSport($id) : bool
  {
    $statement = self::$db->prepare("DELETE FROM sports WHERE id = ?");
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
}
?>
