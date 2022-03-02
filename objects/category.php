<?php
class Category {

    // подключение к базе данных и имя таблицы 
    private $conn;
    private $table_name = "categories";

    // свойства объекта 
    public $id;
    public $name;

    public function __construct($db) {
        $this->conn = $db;
    }

    // данный метод используется в раскрывающемся списке 
    function read() {

        // запрос MySQL: выбираем столбцы в таблице «categories» 
        $query = "SELECT
                    id, name
                FROM
                    " . $this->table_name . "
                ORDER BY
                    name";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    // получение названия категории по её ID 
    function readName() {

      // запрос MySQL 
      $query = "SELECT name FROM " . $this->table_name . " WHERE id = ? limit 0,1";

      $stmt = $this->conn->prepare($query);
      $stmt->bindParam(1, $this->id);
      $stmt->execute();

      $row = $stmt->fetch(PDO::FETCH_ASSOC);

      $this->name = $row['name'];
    }

}
?>