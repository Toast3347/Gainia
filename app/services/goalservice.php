<?php
require __DIR__ . '/../repositories/goalrepository.php';
class GoalService {
    public function getAll($user_id) {
        // retrieve data
        $repository = new GoalRepository();
        $goals = $repository->getAll($user_id);
        return $goals;
    }

    public function insert($goal) {
        // retrieve data
        $repository = new GoalRepository();
        $repository->insert($goal);        
    }
}

?>