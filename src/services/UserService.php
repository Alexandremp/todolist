<?php

class UserService extends AbstractService
{

    /**
     * @param string $user
     * @param string $pass
     * @return bool
     */
    public function checkUserExistsAndIsValid($user, $pass)
    {
        $db = $this->getDatabaseConnection();
        $stmt = $db->prepare("SELECT COUNT(1) FROM user_information WHERE username = :user AND pass = :password");
        $stmt->bindParam(':user', $user);
        $stmt->bindParam(':password', $pass);
        if ($stmt->execute()) {
            while ($row = $stmt->fetch()) {
                if ($row[0] == true) {
                    $_SESSION[AbstractService::USER_SESSION_ID] = $this->getUserInfo($user)->getId();
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * @param string $user
     * @return User
     */
    public function getUserInfo($user)
    {
        $db = $this->getDatabaseConnection();
        $stmt = $db->prepare("SELECT * FROM user_information WHERE username = :user");
        $stmt->bindParam(':user', $user);
        if ($stmt->execute()) {
            while ($row = $stmt->fetch()) {
                return (new User())
                    ->setId($row['id'])
                    ->setLogin($row['username']);
            }
        }
        return null;
    }

    public function registerNewUser($user, $pass)
    {
        $userAddWithSuccess = false;
        if (empty($this->getUserInfo($user))) {
            $db = $this->getDatabaseConnection();
            $stmt = $db->prepare("INSERT INTO user_information (username,pass) VALUES (:user, :pass)");
            $stmt->bindParam(':user', $user);
            $stmt->bindParam(':pass', $pass);

            if ($stmt->execute()) {
                $_SESSION[AbstractService::USER_SESSION_ID] = $this->getUserInfo($user)->getId();
                $userAddWithSuccess = true;
            }
        }
        return $userAddWithSuccess;
    }
}