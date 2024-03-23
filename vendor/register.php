<?php
include 'db_connect.php';
require_once 'salt.php';


global $connect;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = hash_hmac('sha256', $_POST['password'], $salt);

    $sql = "INSERT INTO Users_hash (firstname, lastname, email, pass) VALUES (:firstName, :lastName, :email, :password)";
    
    $stmt = $connect->prepare($sql);
    $stmt->bindParam(':firstName', $firstName);
    $stmt->bindParam(':lastName', $lastName);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);

    try {
        $stmt->execute();
        echo "Регистрация прошла успешно";
    } catch(PDOException $e) {
        echo "Ошибка: " . $e->getMessage();
    }
}
?>