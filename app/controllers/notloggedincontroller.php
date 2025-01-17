<?php
require __DIR__ . '/controller.php';

class NotLoggedInController extends Controller {
    public function index() {
        require __DIR__ . '/../views/notloggedin/notloggedin.php';
    }

}
?>