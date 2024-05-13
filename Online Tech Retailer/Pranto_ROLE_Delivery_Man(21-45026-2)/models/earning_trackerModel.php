<?php

class EarningTrackerModel
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

    public function getSalaryByUsername($username)
    {
        $sql = "SELECT Salary FROM delivery_men WHERE Name = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['Salary'];
        } else {
            return "Not available";
        }
    }

    public function getTotalDoneOrdersByUsername($username)
    {
        $sql = "SELECT COUNT(*) AS total_done_orders FROM delivery_men WHERE Name = ? AND Order_Status = 'Done'";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['total_done_orders'];
        } else {
            return 0;
        }
    }

    public function closeConnection()
    {
        $this->conn->close();
    }
}
?>
