<?php
require __DIR__ . '/../../services/excerciseservice.php';

class ExcerciseController
{

    private $excerciseService;

    // initialize services
    function __construct()
    {
        $this->excerciseService = new ExcerciseService();
    }

    // router maps this to /api/article automatically
    public function index()
    {

        // Respond to a GET request to /api/article
        if ($_SERVER["REQUEST_METHOD"] == "GET") {

            // return all articles in the database as JSON
            $excercises = $this->excerciseService->getAll();
            $json = json_encode($excercises);
            header("Content-type: application/json");
            echo $json;
        }

        // Respond to a POST request to /api/article
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            // read JSON from the request, convert it to an article object
            // and have the service insert the article into the database
            $json = file_get_contents('php://input');
            $object = json_decode($json);
            // change for excercise
            $excercise = new Exercise();
            $excercise->setName($object->name);
            $excercise->setMuscleGroup($object->muscleGroup);
            $excercise->setDescription($object->description);
            $excercise->setUserId($object->userId);

            $this->excerciseService->insert($excercise);
        }
    }
}
?>