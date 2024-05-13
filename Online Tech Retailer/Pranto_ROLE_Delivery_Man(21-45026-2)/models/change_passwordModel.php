<?php

class UserModel
{
    private $conn;

    // Method to establish database connection
    private function connectToDatabase($servername, $username, $password, $database)
    {
        $this->conn = new mysqli($servername, $username, $password, $database);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    // Method to update user's password
    public function updatePassword($servername, $username, $password, $database, $usernameParam, $newPassword)
    {
        // Establish database connection
        $this->connectToDatabase($servername, $username, $password, $database);

        // Prepare SQL statement to update password
        $sql = "UPDATE delivery_men SET `Delivery Man PIN` = ? WHERE Name = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ss", $newPassword, $usernameParam);

        if ($stmt->execute()) {
            // Close statement and connection
            $stmt->close();
            $this->conn->close();
            return true; // Password updated successfully
        } else {
            // Close statement and connection
            $stmt->close();
            $this->conn->close();
            return false; // Error updating password
        }
    }
}

?>
