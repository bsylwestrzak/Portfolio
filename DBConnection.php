<?php

class DBConnection {

  private $link;
  private $connection;

  public function connect()
  {
    $db_config = json_decode(file_get_contents(__DIR__ . '/config/database.json'));
    $link = mysqli_init();
    $connection = mysqli_real_connect(
       $link,
       $db_config->host,
       $db_config->user,
       $db_config->password,
       $db_config->database,
       $db_config->port
    );
    if($connection)
      $this->link = $link;
    else
      throw new Exception("Nie udało się połączyć z bazą danych!");
  }

  public function query($sql, $select = false) {
    $result = [];
    $answer = mysqli_query($this->link, $sql);
    if($select) {
      while($row = $answer->fetch_assoc()) {
        $result[] = $row;
      }
    }
    return $result;
  }

}
