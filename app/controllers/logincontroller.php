<?php
require __DIR__ . '/controller.php';
require __DIR__ . '/../services/loginservice.php';
require_once __DIR__ . '/../models/user.php';

class LoginController extends Controller {
    private $loginService;
    function __construct()
        {
            $this->loginService = new LoginService();
        }

    public function index() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            $email = htmlspecialchars($_POST['username']);
            $password = htmlspecialchars($_POST['password']);

            $user = new User();
            $user->setUserName($email);
            $user->setPasswordOnLogin($password);
            try{
                $authenticatedUser = $this->loginService->check($user);

                if ($authenticatedUser) {
                    session_start();
                    $_SESSION['user'] = $authenticatedUser;
                    header("Location: /dashboard");
                    exit;
                } else {
                    $error = "Invalid email or password.";
                }
            }
            catch(Exception $e){
                $error = "An error occurred: " . $e->getMessage();
            }
            
        }
        require __DIR__ . '/../views/login/login.php';
    }

}
?>