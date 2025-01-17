<?php
require __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/user.php';

class LoginRepository extends Repository
{
    public function retrieveUser($user): ?User
    {
        $username = $user->getUserName();
        $stmt = $this->connection->prepare("SELECT * FROM users WHERE username = :user_id");
        $stmt->bindParam(':user_id', $username, PDO::PARAM_STR);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'user');
        $fetchedUser = $stmt->fetch();
        return $fetchedUser ?: null;
    }
}