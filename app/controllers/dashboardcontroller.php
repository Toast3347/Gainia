<?php
require __DIR__ . '/controller.php';

class DashboardController extends Controller {
    public function index() {
        require __DIR__ . '/../views/dashboard/dashboard.php';
    }

}
?>