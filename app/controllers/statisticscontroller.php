<?php
require __DIR__ . '/controller.php';

class StatisticsController extends Controller {
    public function index() {
        require __DIR__ . '/../views/statistics/statistics.php';
    }

}
?>