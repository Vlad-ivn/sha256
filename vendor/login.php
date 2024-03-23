<?php
include 'db_connect.php';
require_once 'salt.php';

global $connect;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Проверяем, были ли введены все необходимые поля
    if (!empty($_POST['lastName']) && !empty($_POST['password'])) {
        $lastName = $_POST['lastName'];
        $password = hash_hmac('sha256', $_POST['password'], $salt);

        // Проверяем существует ли пользователь с указанными данными
        $sql = "SELECT * FROM Users_hash WHERE lastname=:lastName";
        
        $stmt = $connect->prepare($sql);
        $stmt->bindParam(':lastName', $lastName);
        
        try {
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
            // Добавляем отладочный вывод
            echo "<pre>";
            print_r($result);
            echo "</pre>";
        
            if ($result) {

                
                // Сверяем хеши паролей
                if (hash_equals($result['pass'], $password)) {
                    echo "Успешный вход. Привет, " . $result['lastname'];
                    // Вы можете выполнить дополнительные действия после успешного входа, например, установить сессию
                } else {
                    echo "Неверный пароль";
                }
            } else {
                echo "Пользователь с таким lastname не найден";
            }
        } catch(PDOException $e) {
            echo "Ошибка: " . $e->getMessage();
        }        
    } else {
        // Если не все поля заполнены, выдаем ошибку
        echo "Пожалуйста, заполните все поля.";
    }
}
?>