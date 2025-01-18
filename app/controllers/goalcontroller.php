<?php
require __DIR__ . '/controller.php';
require __DIR__ . '/../services/goalservice.php';
require_once __DIR__ . '/../models/goal.php';
session_start();

class GoalController extends Controller {
    private $goalService;
    function __construct()
        {
            $this->goalService = new GoalService();
        }
    public function index() {
        $user = $_SESSION['user'];
        require __DIR__ . '/../views/create-account/create-account.php';

        $goals = $this->goalService->getAll($user);
        $this->displayView($user_id);

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            $user_id = htmlspecialchars($_POST['user_id']);
            $exercise = htmlspecialchars($_POST['exercise_id']);
            $target = htmlspecialchars($_POST['target']);
            $deadline = htmlspecialchars($_POST['deadline']);
            $status = htmlspecialchars($_POST['status']);
        
            $goal = new Goal();
            $goal->setUserId($user_id);
            $goal->setExercise($exercise);
            $goal->setTarget($target);
            $goal->setDeadline($deadline);
            $goal->setStatus($status);

            $this->goalService->insert($goal);
        }
    }   
}
?>