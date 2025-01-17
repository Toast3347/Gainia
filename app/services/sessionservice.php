<?php
require __DIR__ . '/../repositories/sessionrepository.php';
class SessionService {
    public function getAll() {
        // retrieve data
        $repository = new SessionRepository();
        $sessions = $repository->getAll();
        return $sessions;
    }
    public function getFromUser($user) {
        // retrieve data
        $repository = new SessionRepository();
        $sessions = $repository->getFromUser($user);
        return $sessions;
    }

    public function insert($goal) {
        // retrieve data
        $repository = new GoalRepository();
        $repository->insert($goal);        
    }
}

?>