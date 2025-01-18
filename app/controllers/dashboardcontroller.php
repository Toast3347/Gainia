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

    public function addSession() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $date = $_POST['date'];
            $name = $_POST['name'];
            $time = $_POST['time'];
            $user = $_SESSION['user'];
            $this->sessionService->createSession($user, $date, $name, $time);
            header('Location: /dashboard'); 
        }
    }

    public function editSession() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $date = $_POST['date'];
            $name = $_POST['name'];
            $time = $_POST['time'];

            $this->sessionService->updateSession($id, $date, $name, $time);
            header('Location: /dashboard'); 
        }
    }

    public function deleteSession() {
        if (isset($_POST['delete_id'])) {
            $id = $_POST['delete_id'];
            $this->sessionService->deleteSession($id);
            header('Location: /dashboard'); 
        }
    }
}
?>