<?php
require_once __DIR__ . '/repository.php';
require __DIR__ . '/../models/goal.php';

class GoalRepository extends Repository
{
        function getAllForUser($user)
        {
                $userId = $user->getId();
                $stmt = $this->connection->prepare("SELECT g.*, e.name AS exercise_name FROM goals AS g INNER JOIN exercises AS e ON g.exercise_id = e.id WHERE g.user_id = :user_id");
                $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
                $stmt->execute();
                $stmt->setFetchMode(PDO::FETCH_CLASS, 'Goal');
                return $stmt->fetchAll();
        }

        public function getAll()
        {
                $userId = 1;
                $stmt = $this->connection->prepare("SELECT g.*, e.name AS exercise_name FROM goals AS g INNER JOIN exercises AS e ON g.exercise_id = e.id WHERE g.user_id = :user_id");
                $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
                $stmt->execute();
                $stmt->setFetchMode(PDO::FETCH_CLASS, 'Goal');
                return $stmt->fetchAll();
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

        function update($goal)
        {
            $stmt = $this->connection->prepare("UPDATE goals SET title = ?, description = ?, target_date = ? WHERE id = ? AND user_id = ?");
            $stmt->execute([
                $goal->getTitle(),
                $goal->getDescription(),
                $goal->getTargetDate(),
                $goal->getId(),
                $goal->getUserId()
            ]);
        }

        function delete($goal)
        {
                $goalId = $goal->getId();
                $userId = $goal->getUserId();
                $stmt = $this->connection->prepare("DELETE FROM goals WHERE id = ? AND user_id = ?");
                $stmt->execute([$goalId, $userId]);
        }
}
?>