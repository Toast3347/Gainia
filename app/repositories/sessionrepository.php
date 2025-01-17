<?php
require __DIR__ . '/repository.php';
require __DIR__ . '/../models/workout.php';

class SessionRepository extends Repository
{
        function getAll()
        {
                $stmt = $this->connection->prepare("SELECT * FROM workouts WHERE user_id = 1");
                $stmt->execute();
                $stmt->setFetchMode(PDO::FETCH_CLASS, 'workout');
                $sessions = $stmt->fetchAll();
                return $sessions;
        }

        function getFromUser($user)
        {       
                $id = $user->getId();
                $stmt = $this->connection->prepare("SELECT * FROM workouts WHERE user_id = :user_id");
                $stmt->bindParam(':user_id', $id, PDO::PARAM_STR);
                $stmt->execute();
                $stmt->setFetchMode(PDO::FETCH_CLASS, 'workout');
                $sessions = $stmt->fetchAll();
                return $sessions;
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