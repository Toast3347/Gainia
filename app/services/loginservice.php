<?php
require __DIR__ . '/../repositories/loginrepository.php';
require_once __DIR__ . '/../models/user.php';

class LoginService {
    private $repository;

    public function __construct() {
        $this->repository = new LoginRepository();
    }

    public function check(User $user) {
        if (empty($user->getUserName()) || empty($user->getPassword())) {
            throw new InvalidArgumentException("Username and password cannot be empty.");
        }
        $dbUser = $this->repository->retrieveUser($user);
        if ($dbUser === null) {
            throw new InvalidArgumentException("User not found.");
        }
        if (password_verify($user->getPassword(), $dbUser->getPassword())) {
            return $dbUser; 
        }
        return null;
    }
}
?>