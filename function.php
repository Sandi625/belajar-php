<?php
session_start();
class Connection{
  public $host = "localhost";
  public $user = "root";
  public $password = "";
  public $db_name = "produk";
  public $conn;

  public function __construct(){
    $this->conn = mysqli_connect($this->host, $this->user, $this->password, $this->db_name);
  }
}
class Register extends Connection {
  public function registration($name, $username, $email, $phone_number, $password) {
    $group_id = 3; 
    $duplicate = mysqli_query($this->conn, "SELECT * FROM users WHERE username = '$username' OR email = '$email'");
    
    if(mysqli_num_rows($duplicate) > 0){
      return 10; 
    } else {
     
      $stmt = $this->conn->prepare("INSERT INTO users (name, username, email, phone_number, password, group_id) VALUES (?, ?, ?, ?, ?, ?)");
      $stmt->bind_param("sssssi", $name, $username, $email, $phone_number, $password, $group_id);

      if ($stmt->execute()) {
        return 1; 
      } else {
        return 0; 
      }
    }
  }
}

class Login extends Connection{
  public $id;
  public function login($usernameemail, $password){
    $result = mysqli_query($this->conn, "SELECT * FROM users WHERE username = '$usernameemail' OR email = '$usernameemail'");
    $row = mysqli_fetch_assoc($result);

    if(mysqli_num_rows($result) > 0){
      if($password == $row["password"]){
        $this->id = $row["id"];
        return 1;
        // Login successful
      }
      else{
        return 10;
        // Wrong password
      }
    }
    else{
      return 100;
      // User not registered
    }
  }

  public function idUser(){
    return $this->id;
  }
}

class Select extends Connection{
  public function selectUserById($id){
    $result = mysqli_query($this->conn, "SELECT * FROM users WHERE id = $id");
    return mysqli_fetch_assoc($result);
  }
}
