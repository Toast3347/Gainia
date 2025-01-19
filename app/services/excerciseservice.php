<?php
require_once __DIR__ . '/../repositories/exerciserepository.php';
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

    public function getDefault() {
        $exercises = $this->repository->getDefault();
        return $exercises;
    }

    public function getAllWithUser($user)
    {
        $exercises = $this->repository->getAllWithUserId($user);
        return $exercises;
    }

    public function insert($exercise) 
    {
        $this->repository->insert($exercise);        
    }

    public function getAllFromUser($user)
    {
        $exercises = $this->repository->getfromUserId($user);
        return $exercises;
    }

    public function editExercise($exercise)
    {
        $this->repository->editExercise($exercise);
    }

    public function deleteExercise($id){
        $this->repository->deleteExercise($id);
    }
}
?>