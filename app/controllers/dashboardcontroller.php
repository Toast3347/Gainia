<?php
require __DIR__ . '/controller.php';
require __DIR__ . '/../services/sessionservice.php';
require_once __DIR__ . '/../services/excerciseservice.php';
require_once __DIR__ . '/../models/user.php';
require_once __DIR__ . '/../models/workout.php';
require_once __DIR__ . '/../models/workoutdetails.php';

session_start();

class DashboardController extends Controller {
    private $sessionService;
    private $exerciseService;

    function __construct()
        {
            $this->sessionService = new SessionService();
            $this->exerciseService = new ExcerciseService();
        }

    public function index() {

        $user = $_SESSION['user'];
        $sessions = $this->sessionService->getFromUser($user);
        $exercises = $this->exerciseService->getAllWithUser($user);
        $weight = $user->getWeight();
        $heightCm = $user->getHeight();
        $heightMeters = $heightCm / 100;
        $bmicalc = $weight / ($heightMeters  * $heightMeters);
        $bmi = number_format($bmicalc, 1);
        require __DIR__ . '/../views/dashboard/dashboard.php';
    }

    public function addSession() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $date = $_POST['date'];
            $name = $_POST['name'];
            $time = $_POST['duration'];
    
            $user = $_SESSION['user'];
    
            $workout = new Workout();
            $workout->setUserId($user->getId());
            $workout->setname($name);
            $workout->setDate($date);
            $workout->setTime($time);
    
            $workoutDetailsList = [];
            foreach ($_POST['exercises'] as $exercise) {
                $workoutDetails = new WorkoutDetails();
                $workoutDetails->setExcerciseId($exercise['exerciseId']);
                $workoutDetails->setSets($exercise['sets']);
                $workoutDetails->setReps($exercise['reps']);
                $workoutDetails->setWeight($exercise['weight']);
                $workoutDetailsList[] = $workoutDetails;
            }
    
            $this->sessionService->insert($workout, $workoutDetailsList);
            header('Location: /dashboard'); 
        }
    }

    public function getSessionDetails() {
        $sessionId = $_GET['sessionId'];
        $session = $this->sessionService->getSessionById($sessionId);
        $exercises = $this->sessionService->getExercisesBySessionId($sessionId);
        echo json_encode(['session' => $session, 'exercises' => $exercises]);
    }
    
    public function editSession() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $sessionId = $_POST['sessionId'];
            $name = $_POST['name'];
            $date = $_POST['date'];
            $time = $_POST['duration'];
    
            $workout = new Workout();
            $workout->setId($sessionId);
            $workout->setName($name);
            $workout->setDate($date);
            $workout->setTime($time);
    
            $workoutDetailsList = [];
            foreach ($_POST['exercises'] as $exercise) {
                $workoutDetails = new WorkoutDetails();
                $workoutDetails->setWorkoutId($sessionId);
                $workoutDetails->setExcerciseId($exercise['exerciseId']);
                $workoutDetails->setSets($exercise['sets']);
                $workoutDetails->setReps($exercise['reps']);
                $workoutDetails->setWeight($exercise['weight']);
                $workoutDetailsList[] = $workoutDetails;
            }
    
            $this->sessionService->update($workout, $workoutDetailsList);
            header('Location: /dashboard');
        }
    }
    
    
    public function deleteSession() { 
        if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
            $sessionId = $_POST['delete_id']; 
            $this->sessionService->delete($sessionId); 
            header('Location: /dashboard'); 
        }
    }




}
?>