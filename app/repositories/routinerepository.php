<?php
require_once __DIR__ . '/../models/routine.php';
require __DIR__ . '/repository.php';

class RoutineRepository extends Repository{


    public function getAll() {
        $stmt = $this->connection->query("SELECT * FROM workout_routines");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert($routine) {
        $stmt = $this->connection->prepare("INSERT INTO workout_routines (user_id, name) VALUES (:user_id, :name)");
        $stmt->execute([
            ':user_id' => $routine->getUserId(),
            ':name' => $routine->getName()
        ]);
        return $this->connection->lastInsertId();
    }

    public function delete($id) {
        $stmt = $this->connection->prepare("DELETE FROM workout_routines WHERE id = :id");
        $stmt->execute([':id' => $id]);
    }
}
?>