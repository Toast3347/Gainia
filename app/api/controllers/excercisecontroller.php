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
        // router maps this to /api/excercise automatically  ps i know it is spelled exercise but i am stupid and it works now
        public function index()
        {
            // Respond to a GET request to /api/excercise
            if ($_SERVER["REQUEST_METHOD"] == "GET") {
                $excercises = $this->excerciseService->getAll();
                $json = json_encode($excercises);
                header("Content-type: application/json");
                echo $json;
            }

            // Respond to a POST request to /api/excercise
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // read JSON from the request, convert it to an exercie object
                // and have the service insert the excercise into the database
                $json = file_get_contents('php://input');
                $object = json_decode($json);

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