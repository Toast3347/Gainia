<?php
require __DIR__ . '/../repositories/exerciserepository.php';
class ExcerciseService {
    private $repository;

    public function __construct()
    {
        $this->repository = new ExcerciseRepository();;
    }


    public function getAll() {
        $exercises = $this->repository->getAll();
        return $exercises;
    }

    public function getAllWithUser($user)
    {
        $exercises = $this->repository->getAllWithUserId($user);
        return $exercises;
    }

    public function insert($exercise) {
        $this->repository->insert($exercise);        
    }
}
?>