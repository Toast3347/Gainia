<?php
require_once __DIR__ . '/../repositories/routineRepository.php';

class RoutineService
{
    private $routineRepository;

    public function __construct()
    {
        $this->routineRepository = new RoutineRepository();
    }

    public function getAll()
    {
        return $this->routineRepository->getAll();
    }

    public function insert($routine)
    {
        return $this->routineRepository->insert($routine);
    }

    public function delete($id)
    {
        return $this->routineRepository->delete($id);
    }
}
?>
