<?php
class UserModel
{
    private $conn;

    public function getConnection($servername, $username, $password, $database)
    {
        // Create connection
        $this->conn = new mysqli($servername, $username, $password, $database);

        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function checkExistingUsername($username)
    {
        $stmt = $this->conn->prepare("SELECT id FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        $stmt->close();
        return $result->num_rows > 0;
    }

    public function registerUser($username, $password, $mobile_number)
    {
        $stmt = $this->conn->prepare("INSERT INTO users (username, password, mobile_number) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $password, $mobile_number);

        $success = $stmt->execute();

        $stmt->close();
        return $success;
    }

    public function closeConnection()
    {
        $this->conn->close();
    }
}
?>
