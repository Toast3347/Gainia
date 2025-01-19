<?php

class workoutdetails {
    private $id;
    private $workout_id;
    private $excercise_id;
    private $sets;
    private $reps;
    private $weight;

    public function getId() {
        return $this->id;
    }

    public function getworkoutId() {
        return $this->workout_id;
    }

    public function getExcerciseId() {
        return $this->excercise_id;
    }

    public function getSets() {
        return $this->sets;
    }

    public function getReps() {
        return $this->reps;
    }

    public function getWeight() {
        return $this->weight;
    }

    public function setworkoutId($workoutId) {
        $this->workout_id = $workoutId;
        return $this;
    }

    public function setExcerciseId($excerciseId) 
    { 
        $this->excercise_id = $excerciseId; 
        return $this; 
    } 

    public function setSets($sets) 
    { 
        $this->sets = $sets; 
        return $this; 
    } 
    
    public function setReps($reps) 
    { 
        $this->reps = $reps; 
        return $this; 
    } 
    
    public function setWeight($weight) 
    { 
        $this->weight = $weight; 
        return $this; 
    }

}