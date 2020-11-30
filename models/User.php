<?php

class User {

    public $conn;

    public function __construct() {

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "sigma";

        // Create connection
        $this->conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

    }

    public function insert() {

        $sql = "INSERT INTO usuarios (departamento, ciudad, nombre, email)
                VALUES ('" . $_POST['departamento'] . "', '" . $_POST['ciudad'] . "', '" . $_POST['nombre'] . "', '" . $_POST['email'] . "')";

        return $this->conn->query($sql);

    }

    public function checkUserByEmail() {

        $sql = "SELECT * FROM usuarios WHERE email='" . $_POST['email'] . "'";
        $result = $this->conn->query($sql);

        return $result->num_rows > 0;

    }

    public function selectRows() {

        $sql = "SELECT * FROM usuarios";
        $result = $this->conn->query($sql);
        $table = array();

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              
                $table[] = $row;
                
            }
        }

        return $table;

    }

}