<?php
class Course{
    private $conn;
    public $courseName;
    public $data;

    public function __construct($db){
        $this->conn = $db;
    }

    public function show(){
        $query = "SELECT * FROM quiz_data WHERE CourseName=? ";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->courseName);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->courseName = $row['CourseName'];
        $this->data = $row['Data'];
    }
}

?>