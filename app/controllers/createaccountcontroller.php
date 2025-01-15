<?php
require __DIR__ . '/controller.php';
require __DIR__ . '/dbconnectioncontroller.php';

class CreateAccountController extends Controller {
    public function index() {
        require __DIR__ . '/../views/create-account/create-account.php';
    }

    public function Submit() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $email = $_POST['email'];
            $password = $_POST['password'];
            $age = $_POST['age'];
            $height = $_POST['height'];
            $weight = $_POST['weight'];

            if ($email && $password && $age && $height && $weight) {

                $this->saveUserData($email, $password, $age, $height, $weight);

                header('Location: /dashboard');
                exit;
            } else {
                echo "Please fill out all fields.";
            }
        }
    }

    private function saveUserData($email, $password, $age, $height, $weight) {

        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $database = new dbconnectioncontroller();
        $db = $database->getDatabaseConnection();
        $stmt = $db->prepare("INSERT INTO users (email, password, age, height, weight) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssidd", $email, $hashedPassword, $age, $height, $weight);
        $stmt->execute();
        $stmt->close();
    }

    
}
?>