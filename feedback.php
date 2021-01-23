<?php

require_once 'source2/db_connect.php';

if(isset($_POST['feedback-btn'])) {

      $name = $_POST['name'];
      $email = $_POST['email'];
      $message = $_POST['message'];


    try {
      $SQLInsert = "INSERT INTO users (name, email, message, to_date)
                   VALUES (:name, :email, :message,  now())";

      $statement = $conn->prepare($SQLInsert);
      $statement->execute(array(':name' => $name, ':email' => $email , ':message' => $message));

      if($statement->rowCount() == 1) {
        header('location: travellerspot.html');
      }
    }
    catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
    }

}

?>