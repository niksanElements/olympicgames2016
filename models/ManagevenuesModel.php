<?php
class ManagevenuesModel extends BaseModel
{
  public function getAllVenues() : array
  {
    $statement = self::$db->query("SELECT * FROM venues");
    $result = $statement -> fetch_all(MYSQLI_ASSOC);
    return $result;
  }

  public function addVenue($venue_name, $sport, $capacity, $lon, $lat) : bool
  {
    $venue_name = htmlspecialchars($venue_name);
    $sport = htmlspecialchars($sport);
    $capacity = htmlspecialchars($capacity);
    $lon = htmlspecialchars($lon);
    $lat = htmlspecialchars($lat);

    $statement = self::$db->prepare("INSERT INTO venues (venue_name, sport, capacity, lon, lat)
    VALUES (?, ?, ?, ?, ?)");
    $statement->bind_param("ssidd", $venue_name, $sport, $capacity, $lon, $lat);
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

  public function getVenue($id) : array
  {
    $statement = self::$db->prepare("SELECT * FROM venues WHERE id = ?");
    $statement->bind_param("i", $id);
    $statement->execute();
    $result = $statement ->get_result()->fetch_assoc();
    return $result;
  }

  public function editVenue($id, $venue_name, $sport, $capacity, $lon, $lat) : bool
  {
    $venue_name = htmlspecialchars($venue_name);
    $sport = htmlspecialchars($sport);
    $capacity = htmlspecialchars($capacity);
    $lon = htmlspecialchars($lon);
    $lat = htmlspecialchars($lat);

    $statement = self::$db->prepare("UPDATE venues SET venue_name = ?, sport = ?, capacity = ?, lon = ?, lat = ?
      WHERE id = ?");
    $statement->bind_param("sssddi", $venue_name, $sport, $capacity, $lon, $lat, $id);
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

  public function deleteVenue($id) : bool
  {
    $statement = self::$db->prepare("DELETE FROM venues WHERE id = ?");
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
