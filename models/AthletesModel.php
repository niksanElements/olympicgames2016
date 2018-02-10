<?php
class AthletesModel extends BaseModel
{
  public function getAllAthletes($sort = NULL) : array
  {
    $sortQuery = "";
    if($sort)
    {
      switch($sort)
      {
        case "athleteAsc":
        {
          $sortQuery = " ORDER BY players.full_name ASC";
        }break;
        case "athleteDesc":
        {
          $sortQuery = " ORDER BY players.full_name DESC";
        }break;
        case "ageAsc":
        {
          $sortQuery = " ORDER BY players.age ASC";
        }break;
        case "ageDesc":
        {
          $sortQuery = " ORDER BY players.age DESC";
        }break;
        case "sportAsc":
        {
          $sortQuery = " ORDER BY sports.name ASC";
        }break;
        case "sportDesc":
        {
          $sortQuery = " ORDER BY sports.name DESC";
        }break;
        case "countryAsc":
        {
          $sortQuery = " ORDER BY countries.full_name ASC";
        }break;
        case "countryDesc":
        {
          $sortQuery = " ORDER BY countries.full_name DESC";
        }break;
        case "medalAsc":
        {
          $sortQuery = " ORDER BY medals.type ASC";
        }break;
        case "medalDesc":
        {
          $sortQuery = " ORDER BY medals.type DESC";
        }break;
      }
    }

    $statement = self::$db->query("SELECT players.full_name AS playerName,
      players.age AS playerAge,
      sports.name AS sportName, countries.full_name AS countryName,
      medals.name AS medalName, medals.type AS medalType
      FROM players
      LEFT JOIN sports ON players.sports_id = sports.id
      LEFT JOIN players_has_countries ON players.id = players_has_countries.players_id
      LEFT JOIN countries ON players_has_countries.countries_id = countries.id
      LEFT JOIN medals_has_players ON players.id = medals_has_players.players_id
      LEFT JOIN medals ON medals_has_players.medals_id = medals.id" . $sortQuery);
    $result = $statement->fetch_all(MYSQLI_ASSOC);
    return $result;
  }
}
?>
