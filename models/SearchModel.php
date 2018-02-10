<?php
class SearchModel extends BaseModel
{
  public function searchNews($search) : array
  {
    $searchArr = explode(" ", $search);
    $query = "SELECT * FROM news WHERE 1 != 1";
    foreach($searchArr as $searchWord)
    {
      $query .= " OR title LIKE '%" . $searchWord . "%' OR body LIKE '%" . $searchWord . "%'";
    }
    $statement = self::$db->query($query);
    $result = $statement->fetch_all(MYSQLI_ASSOC);
    return $result;
  }

  public function searchPosts($search) : array
  {
    $searchArr = explode(" ", $search);
    $query = "SELECT * FROM post WHERE 1 != 1";
    foreach($searchArr as $searchWord)
    {
      $query .= " OR title LIKE '%" . $searchWord . "%' OR body LIKE '%" . $searchWord . "%'";
    }
    $statement = self::$db->query($query);
    $result = $statement->fetch_all(MYSQLI_ASSOC);
    return $result;
  }
}
?>
