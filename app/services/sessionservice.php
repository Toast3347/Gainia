<?php
require __DIR__ . '/../repositories/sessionrepository.php';
class SessionService {
    public function getAll() {
        // retrieve data
        $repository = new SessionRepository();
        $goals = $repository->getAll();
        return $goals;
    }

    public function insert($goal) {
        // retrieve data
        $repository = new GoalRepository();
        $repository->insert($goal);        
    }
}

?>