<?php
require __DIR__ . '/repository.php';
require __DIR__ . '/../models/goal.php';

class GoalRepository extends Repository
{
        function getAll($user_id)
        {
                $stmt = $this->connection->prepare("SELECT * FROM goals WHERE id = :user_id");
                $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
                $stmt->execute();
                $stmt->setFetchMode(PDO::FETCH_CLASS, 'goals');
                $goals = $stmt->fetchAll();
                return $goals;
        }

        function insert($exercise)
        {
                $stmt = $this->connection->prepare("INSERT INTO exercises (name, muscle_group, description, user_id) VALUES (?, ?, ?, ?)");
                $stmt->execute([
                $exercise->getName(),
                $exercise->getMuscleGroup(),
                $exercise->getDescription(),
                $exercise->getUserId()
                ]);
        }
}
?>