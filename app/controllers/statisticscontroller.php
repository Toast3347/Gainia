<?php
require __DIR__ . '/controller.php';
require __DIR__ . '/../services/goalservice.php';
require_once __DIR__ . '/../models/user.php';
require_once __DIR__ . '/../models/goal.php';

session_start();

class StatisticsController extends Controller {
    private $goalsService;
    
    function __construct()
        {
            $this->goalsService = new GoalService();
        }

    public function index() {
        $user = $_SESSION['user'];
        $goals = $this->goalsService->getGoals($user);
        require __DIR__ . '/../views/statistics/statistics.php';
    }

    public function addGoal($goalData) {
        $goal = new Goal();
        $goal->setExercise($goalData['exercise']);
        $goal->setTarget($goalData['target']);
        $goal->setDeadline($goalData['target_date']);
        $goal->setUserId($goalData['user_id']);
        $this->goalsService->addGoal($goal);
    }

    public function editGoal($goalData) {
        $goal = new Goal();
        $goal->setId($goalData['id']);
        $goal->setExercise($goalData['exercise']);
        $goal->setTarget($goalData['target']);
        $goal->setDeadline($goalData['target_date']);
        $goal->setUserId($goalData['user_id']);
        $this->goalsService->editGoal($goal);
    }

    public function deleteGoal($goalId, $userId) {
        $this->goalsService->deleteGoal($goalId, $userId);
    }

}
?>