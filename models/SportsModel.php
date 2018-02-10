<?php
class SportsModel extends BaseModel
{
  public function getAllSports() : array
  {
    $statement = self::$db->query("SELECT sports.name AS sportName,
      venues.venue_name AS venue,
      (SELECT players.full_name FROM players
      RIGHT JOIN medals_has_players ON medals_has_players.players_id = players.id
      RIGHT JOIN medals ON medals.id = medals_has_players.medals_id
      WHERE players.sports_id = sports.id AND medals.type = 1) AS winnerGold,
      (SELECT countries.short_name FROM countries
      RIGHT JOIN players_has_countries ON players_has_countries.countries_id = countries.id
      RIGHT JOIN players ON players.id = players_has_countries.players_id
      WHERE players.full_name = winnerGold) AS countryGold,
      (SELECT players.full_name FROM players
      RIGHT JOIN medals_has_players ON medals_has_players.players_id = players.id
      RIGHT JOIN medals ON medals.id = medals_has_players.medals_id
      WHERE players.sports_id = sports.id AND medals.type = 2) AS winnerSilver,
      (SELECT countries.short_name FROM countries
      RIGHT JOIN players_has_countries ON players_has_countries.countries_id = countries.id
      RIGHT JOIN players ON players.id = players_has_countries.players_id
      WHERE players.full_name = winnerSilver) AS countrySilver,
      (SELECT players.full_name FROM players
      RIGHT JOIN medals_has_players ON medals_has_players.players_id = players.id
      RIGHT JOIN medals ON medals.id = medals_has_players.medals_id
      WHERE players.sports_id = sports.id AND medals.type = 3) AS winnerBronze,
      (SELECT countries.short_name FROM countries
      RIGHT JOIN players_has_countries ON players_has_countries.countries_id = countries.id
      RIGHT JOIN players ON players.id = players_has_countries.players_id
      WHERE players.full_name = winnerBronze) AS countryBronze
      FROM sports
      LEFT JOIN venues ON venues.id = sports.venue
      ORDER BY sports.name ASC");

    $result = $statement->fetch_all(MYSQLI_ASSOC);
    return $result;
  }
}
?>
