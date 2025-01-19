<?php
require __DIR__ . '/controller.php';
require_once __DIR__ . '/../models/routine.php';
require __DIR__ . '/../services/routineService.php';
//NOT FUNCTIONAL
class routineController extends Controller
{
    private $routinesService;

    function __construct()
    {
        $this->routinesService = new RoutineService();
    }

    public function index()
    {
        $action = isset($_GET['action']) ? $_GET['action'] : null;
        switch ($action) {
            case 'add':
                $this->handleAdd();
                break;
            case 'delete':
                $this->handleDelete();
                break;
            default:
                $this->handleGet();
                break;
        }
    }

    private function handleGet()
    {
        
    }

    private function handleAdd()
    {
        $routineName = isset($_POST['routineName']) ? $_POST['routineName'] : '';

        $routine = new Routine();
        $routine->setName($routineName);
        $routine->setUserId(1); 

        $this->routinesService->insert($routine);
        header("Location: /manage_routines.php");
        exit();
    }

    private function handleDelete()
    {
        $id = isset($_POST['id']) ? $_POST['id'] : 0;
        $this->routinesService->delete($id);
        header("Location: /manage_routines.php");
        exit();
    }
}


$controller = new routineController();
$controller->index();
?>
