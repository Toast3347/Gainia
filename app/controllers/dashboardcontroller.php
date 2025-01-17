<?php
require __DIR__ . '/controller.php';
require __DIR__ . '/../services/sessionservice.php';
require_once __DIR__ . '/../models/user.php';
session_start();

class DashboardController extends Controller {
    private $sessionService;
    
    function __construct()
        {
            $this->sessionService = new SessionService();
        }

    public function index() {

        $user = $_SESSION['user'];
        $sessions = $this->sessionService->getFromUser($user);
        require __DIR__ . '/../views/dashboard/dashboard.php';
    }

}
?>