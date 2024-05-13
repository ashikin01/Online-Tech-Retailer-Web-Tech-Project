<?php

class UserModel
{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "your_database";

    public function getConnection()
    {
        // Create connection
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->database);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }

    public function getNotifications($username)
    {
        $conn = $this->getConnection();
        $stmt = $conn->prepare("SELECT Tasks, Task_Status FROM delivery_men WHERE Name = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        $orderNotifications = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $orderNotifications[] = $row;
            }
        }

        $stmt->close();
        $conn->close();

        return $orderNotifications;
    }

    public function updateOrderStatus($username, $taskId)
    {
        $conn = $this->getConnection();
        $update_stmt = $conn->prepare("UPDATE delivery_men SET Task_Status = 'Done' WHERE Name = ? AND Tasks = ?");
        $update_stmt->bind_param("si", $username, $taskId);
        $update_result = $update_stmt->execute();
        $update_stmt->close();
        $conn->close();

        return $update_result;
    }
}

?>