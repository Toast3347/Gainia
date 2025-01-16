<?php
require __DIR__ . '/../repositories/exerciserepository.php';
class ExcerciseService {
    public function getAll() {
        // retrieve data
        $repository = new ExcerciseRepository();
        $exercises = $repository->getAll();
        return $exercises;
    }

    public function insert($exercise) {
        // retrieve data
        $repository = new ExcerciseRepository();
        $repository->insert($exercise);        
    }
}

?>