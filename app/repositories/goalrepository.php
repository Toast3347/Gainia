<?php
require __DIR__ . '/repository.php';
require __DIR__ . '/../models/goal.php';

class GoalRepository extends Repository
{
        function getAll($user)
        {
                $user_id = $user->getId();
                $stmt = $this->connection->prepare("SELECT * FROM goals WHERE id = :user_id");
                $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
                $stmt->execute();
                $stmt->setFetchMode(PDO::FETCH_CLASS, 'goals');
                $goals = $stmt->fetchAll();
                return $goals;
        }

        function insert($goal)
        {
                $stmt = $this->connection->prepare("INSERT INTO exercises (user_id, exercise_id, target, deadline,status) VALUES (?, ?, ?, ?, ?)");
                $stmt->execute([
                $goal->getUserId(),
                $goal->getExerciseId(),
                $goal->getTarget(),
                $goal->getDeadline(),
                $goal->getStatus()
                ]);
        }
}
?>