<?php
require __DIR__ . '/controller.php';

class CreateAccountController extends Controller {
    public function index() {
        require __DIR__ . '/../views/create-account/create-account.php';
    }

}
?>