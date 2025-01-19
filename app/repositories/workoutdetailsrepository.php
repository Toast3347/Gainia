<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/workoutdetails.php';

class WorkoutDetailsRepository extends Repository
{
    public function insert($workoutDetails) {
        $sql = "INSERT INTO workout_details (workout_id, exercise_id, sets, reps, weight) VALUES (:workout_id, :exercise_id, :sets, :reps, :weight)";
        $stmt = $this->connection->prepare($sql);

        $workoutId = $workoutDetails->getWorkoutId();
        $exerciseId = $workoutDetails->getExcerciseId();
        $sets = $workoutDetails->getSets();
        $reps = $workoutDetails->getReps();
        $weight = $workoutDetails->getWeight();

        $stmt->bindParam(':workout_id', $workoutId);
        $stmt->bindParam(':exercise_id', $exerciseId);
        $stmt->bindParam(':sets', $sets);
        $stmt->bindParam(':reps', $reps);
        $stmt->bindParam(':weight', $weight);

        $stmt->execute();
    }

    public function getBySessionId($sessionId) { 
        $sql = " SELECT exercises.name, workout_details.sets, workout_details.reps, workout_details.weight FROM workout_details JOIN exercises ON workout_details.exercise_id = exercises.id WHERE workout_details.workout_id = :session_id"; 
        $stmt = $this->connection->prepare($sql); 
        $stmt->bindParam(':session_id', $sessionId, PDO::PARAM_INT); 
        $stmt->execute(); 
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function update($workoutDetails) 
    { 
        $sql = "UPDATE workout_details SET sets = :sets, reps = :reps, weight = :weight WHERE workout_id = :workout_id AND exercise_id = :exercise_id"; 
        $stmt = $this->connection->prepare($sql); $workoutId = $workoutDetails->getWorkoutId(); $exerciseId = $workoutDetails->getExcerciseId(); 
        $sets = $workoutDetails->getSets(); $reps = $workoutDetails->getReps(); $weight = $workoutDetails->getWeight(); 
        $stmt->bindParam(':workout_id', $workoutId); 
        $stmt->bindParam(':exercise_id', $exerciseId); $stmt->bindParam(':sets', $sets); $stmt->bindParam(':reps', $reps); 
        $stmt->bindParam(':weight', $weight); 
        $stmt->execute(); 
    }
    
    
    
    public function deleteByWorkoutId($workoutId) 
    { 
        $sql = "DELETE FROM workout_details WHERE workout_id = :workout_id"; 
        $stmt = $this->connection->prepare($sql); $stmt->bindParam(':workout_id', $workoutId); 
        $stmt->execute(); 
    }
}

