<?php
require __DIR__ . '/controller.php';
require __DIR__ . '/../services/sessionservice.php';
require_once __DIR__ . '/../services/excerciseservice.php';
require_once __DIR__ . '/../models/user.php';
require_once __DIR__ . '/../models/exercise.php';


session_start();

class ExerciseController extends Controller {
    private $exerciseService;

    function __construct()
        {
            $this->exerciseService = new ExcerciseService();
        }

    public function index() {

        $user = $_SESSION['user'];
        $defaultExercises = $this->exerciseService->getDefault();
        $exercises = $this->exerciseService->getAllFromUser($user);
        require __DIR__ . '/../views/exerciseboard/exerciseboard.php';
    }

    public function addExercise() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name']; 
            $muscle_group = $_POST['muscle_group']; 
            $description = $_POST['description'];
    
            $user = $_SESSION['user'];
    
            $exercise = new Exercise();
            $exercise->setUserId($user->getId());
            $exercise->setname($name);
            $exercise->setMuscleGroup($muscle_group);
            $exercise->setDescription($description);
    
            $this->exerciseService->insert($exercise);
            header('Location: /exercise'); 
        }
    }

    public function editExercise() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id']; 
            $name = $_POST['name']; 
            $muscle_group = $_POST['muscle_group']; 
            $description = $_POST['description'];
    
            $user = $_SESSION['user'];
    
            $exercise = new Exercise();
            $exercise->setId($id);
            $exercise->setUserId($user->getId());
            $exercise->setname($name);
            $exercise->setMuscleGroup($muscle_group);
            $exercise->setDescription($description);
    
            $this->exerciseService->editExercise($exercise);
            header('Location: /exercise'); 
        }
    }

    public function deleteExercise()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
            $Id = $_POST['delete_id']; 
            $this->exerciseService->deleteExercise($Id); 
            header('Location: /exercise'); 
        }
    }
}
