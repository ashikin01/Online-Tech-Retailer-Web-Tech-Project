<?php
class UserModel
{
    public function checkUsernameExists($conn, $username)
    {
        $sql = "SELECT id FROM users WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();
        return $stmt->num_rows > 0;
    }

    public function resetPassword($conn, $username, $newPassword)
    {
        $sql = "UPDATE users SET password = ? WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $newPassword, $username);
        return $stmt->execute();
    }
}

?>