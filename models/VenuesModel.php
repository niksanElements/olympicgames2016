<?php

class VenuesModel extends BaseModel
{
    public function getVenues() : array
    {
        $statement  = self::$db->query(
            "SELECT * FROM venues");
        return  $statement->fetch_all(MYSQLI_ASSOC);
    }
}