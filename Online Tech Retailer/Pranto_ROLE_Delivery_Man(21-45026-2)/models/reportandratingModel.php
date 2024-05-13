<?php
class OrderModel
{
    private $conn;

    // Constructor is not used in this approach

    public function connect($servername, $username, $password, $database)
    {
        $this->conn = new mysqli($servername, $username, $password, $database);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function getOrdersByUsername($username)
    {
        $stmt = $this->conn->prepare("SELECT Tasks, Task_Status FROM delivery_men WHERE Name = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        $orders = [];
        while ($row = $result->fetch_assoc()) {
            $orders[] = $row;
        }

        $stmt->close();

        return $orders;
    }

    public function closeConnection()
    {
        $this->conn->close();
    }
}
?>
