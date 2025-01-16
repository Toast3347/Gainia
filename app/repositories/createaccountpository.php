<?php
require __DIR__ . '/repository.php';
require __DIR__ . '/../models/user.php';

class CreateAccountRepository extends Repository
{
        function insert($user)
        {
                $stmt = $this->connection->prepare("INSERT INTO users (username, password, salt, height,weight,age) VALUES (?, ?, ?, ?,?,?)");
                $stmt->execute([
                $user->getUserName(),
                $user->getPassword(),
                $user->getSalt(),
                $user->getHeight(),
                $user->getweight(),
                $user->getAge()
                ]);
        }
}
?>