<?php
require __DIR__ . '/controller.php';
require __DIR__ . '/../services/goalservice.php';
require __DIR__ . '/../services/excerciseservice.php';
require_once __DIR__ . '/../models/user.php';
require_once __DIR__ . '/../models/goal.php';

session_start();

class GoalsController extends Controller {
    private $goalsService;
    private $exerciseService;

    function __construct()
        {
            $this->goalsService = new GoalService();
            $this->exerciseService = new ExcerciseService();
        }

    public function index() {
        $user = $_SESSION['user'];
        $exercises = $this->exerciseService->getAllWithUser($user);
        $goals = $this->goalsService->getGoals($user);
        require __DIR__ . '/../views/goalsboard/goalsboard.php';
    }

    public function addGoal() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $exerciseId = $_POST['exercise'];
            $target = $_POST['target'];
            $date = $_POST['target_date'];
            $user = $_SESSION['user'];
            $goal = new Goal();
            $goal->setExercise($exerciseId); 
            $goal->setTarget($target);
            $goal->setDeadline($date);
            $goal->setUserId($user->getId());
            $goal->setStatus('active');
            $this->goalsService->addGoal($goal);
        }
        header('Location: /goals'); 
    }

    public function deleteGoal() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $goalId = $_POST['goalId'];
            $userId = $_SESSION['user']->getId();
            $this->goalsService->deleteGoal($goalId, $userId);
        }
        header('Location: /goals'); 
    }
}
?>