<?php
class ProfileModel
{
    private $conn;

    public function openConnection($servername, $username, $password, $database)
    {
        // Create connection
        $this->conn = new mysqli($servername, $username, $password, $database);

        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function getUserByUsernameAndPassword($username, $password)
    {
        // Prepare SQL query to fetch user by username and password
        $stmt = $this->conn->prepare("SELECT * FROM delivery_men WHERE Name = ? AND `Delivery Man PIN` = ?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        // Close statement
        $stmt->close();

        // Return user data if found
        if ($result->num_rows == 1) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

    public function closeConnection()
    {
        // Close database connection
        if ($this->conn) {
            $this->conn->close();
        }
    }
}
?>