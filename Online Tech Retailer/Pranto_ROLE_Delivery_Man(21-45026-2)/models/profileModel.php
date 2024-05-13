<?php

class ProfileModel
{
    public function getUserData($servername, $username, $password, $database, $sessionUsername)
    {
        // Create connection
        $conn = new mysqli($servername, $username, $password, $database);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare and execute SQL query
        $stmt = $conn->prepare("SELECT * FROM delivery_men WHERE Name = ?");
        $stmt->bind_param("s", $sessionUsername);
        $stmt->execute();
        $result = $stmt->get_result();

        // Get user data
        $userData = null;
        if ($result->num_rows == 1) {
            $userData = $result->fetch_assoc();
        }

        // Close statement and connection
        $stmt->close();
        $conn->close();

        return $userData;
    }

    public function updateUserProfile($servername, $username, $password, $database, $sessionUsername, $Email)
    {
        // Create connection
        $conn = new mysqli($servername, $username, $password, $database);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare and execute SQL query to update user profile
        $stmt = $conn->prepare("UPDATE users SET Email = ? WHERE Name = ?");
        $stmt->bind_param("ss",$Eamil, $sessionUsername);
        $success = $stmt->execute();

        // Close statement and connection
        $stmt->close();
        $conn->close();

        return $success;
    }
}

?>