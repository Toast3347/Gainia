<?php
require_once __DIR__. '/../repositories/sessionrepository.php';
require_once __DIR__. '/../repositories/workoutdetailsrepository.php';
class SessionService {
    private $repository;
    private $workoutDetailsRepository;

    public function __construct() {
        $this->repository = new SessionRepository();
        $this->workoutDetailsRepository = new WorkoutDetailsRepository();
    }  

    public function getAll() {
        $sessions = $this->repository->getAll();
        return $sessions;
    }
    public function getFromUser($user) {
        $sessions = $this->repository->getFromUser($user);
        return $sessions;
    }

    public function insert($workout, $workoutDetailsList) {
        $workoutId = $this->repository->insert($workout);
    
        foreach ($workoutDetailsList as $workoutDetails) {
            $workoutDetails->setWorkoutId($workoutId);
            $this->workoutDetailsRepository->insert($workoutDetails);
        }
    }

    public function getSessionById($sessionId) {
        return $this->repository->getById($sessionId);
    }
    
    public function getExercisesBySessionId($sessionId) { 
        return $this->workoutDetailsRepository->getBySessionId($sessionId);
    }

    public function update($workout, $workoutDetailsList) {
        $workoutId = $workout->getId();
        $this->repository->update($workout);
        foreach ($workoutDetailsList as $workoutDetails) { 
            $workoutDetails->setWorkoutId($workoutId); 
            $this->workoutDetailsRepository->update($workoutDetails);
        }
    } 

    public function delete($sessionId) { 
        $this->repository->delete($sessionId); 
    }
}

?>