<?php
require __DIR__ . '/controller.php';
require __DIR__ . '/../services/goalservice.php';

class GoalController extends Controller {
    private $goalService;
    function __construct()
        {
            $this->goalService = new GoalService();
        }
    public function index() {
        require __DIR__ . '/../views/create-account/create-account.php';

        $articles = $this->goalService->getAll($user_id);
        $this->displayView($user_id);

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            $user_id = htmlspecialchars($_POST['user_id']);
            $exercise = htmlspecialchars($_POST['exercise_id']);
            $target = htmlspecialchars($_POST['target']);
            $deadline = htmlspecialchars($_POST['deadline']);
            $status = htmlspecialchars($_POST['status']);
        
            $goal = new Goal();
            $goal->setUserId($user_id);
            $goal->setExcercise($exercise);
            $goal->setTarget($target);
            $goal->setDeadline($deadline);
            $goal->setStatus($status);

            $this->goalService->insert($goal);
        }
    }   
}
?>