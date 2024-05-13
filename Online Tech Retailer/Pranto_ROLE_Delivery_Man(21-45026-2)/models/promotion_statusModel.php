<?php

class PromotionModel
{
    private $conn;

    // Setter method to set the database connection
    public function setConnection($conn)
    {
        $this->conn = $conn;
    }

    public function getUserInfoByUsername($username)
    {
        $stmt = $this->conn->prepare("SELECT Rating, account_age, eligible_for_promotion FROM delivery_men WHERE Name = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        $userInfo = [];

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $userInfo['rating'] = $row['Rating'];
            $userInfo['account_age'] = $row['account_age'];
            $userInfo['eligible_for_promotion'] = $row['eligible_for_promotion'];
        }

        $stmt->close();

        return $userInfo;
    }

    public function updateEligibilityForPromotion($username, $eligible)
    {
        $update_stmt = $this->conn->prepare("UPDATE delivery_men SET eligible_for_promotion = ? WHERE Name = ?");
        $update_stmt->bind_param("ss", $eligible, $username);
        $update_result = $update_stmt->execute();
        $update_stmt->close();

        return $update_result;
    }
}
?>
