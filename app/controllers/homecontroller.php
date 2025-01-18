<?php
require __DIR__ . '/controller.php';
require __DIR__ . '/../services/sessionservice.php';
require __DIR__ . '/../services/goalservice.php';
require_once __DIR__ . '/../models/goal.php';
session_start();
session_unset();
session_destroy();
class HomeController extends Controller {
    private $sessionService;
    private $goalsService;

    function __construct()
        {
            $this->sessionService = new SessionService();
            $this->goalsService = new GoalService();
        }

    public function index() {
        $sessions = $this->sessionService->getAll();
        $goals = $this->goalsService->getAll();
        require __DIR__ . '/../views/home/index.php';
    }

}
?>