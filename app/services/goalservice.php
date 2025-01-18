<?php
require __DIR__ . '/../repositories/goalrepository.php';
class GoalService {
    private $repository;

    public function __construct()
    {
        $this->repository = new GoalRepository();;
    }

    public function getGoals($user)
    {
        return $this->repository->getAllForUser($user);
    }

    public function getAll()
    {
        return $this->repository->getAll();
    }

    public function addGoal($goal)
    {
        $this->repository->insert($goal);
    }

    public function editGoal($goal)
    {
        $this->repository->update($goal);
    }

    public function deleteGoal($goal)
    {
        $this->repository->delete($goal);
    }
}

?>