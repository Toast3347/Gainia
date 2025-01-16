<?php
require __DIR__ . '/controller.php';
require __DIR__ . '/../services/sessionservice.php';

class HomeController extends Controller {
    private $sessionService;
    function __construct()
        {
            $this->sessionService = new SessionService();
        }

    public function index() {
        $sessions = $this->sessionService->getAll();
        require __DIR__ . '/../views/home/index.php';
    }

}
?>