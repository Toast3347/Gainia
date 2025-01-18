<?php
require __DIR__ . '/repository.php';
require __DIR__ . '/../models/exercise.php';

class ExcerciseRepository extends Repository
{
        function getAll()
        {
                $stmt = $this->connection->prepare("SELECT * FROM exercises");
                $stmt->execute();
                $stmt->setFetchMode(PDO::FETCH_CLASS, 'Exercise');
                $exercises = $stmt->fetchAll();
                return $exercises;
        }

        function getAllWithUserId($user)
        {       
                $userid = $user->getId();
                $defaultId = 1;
                $stmt = $this->connection->prepare("SELECT * FROM exercises WHERE user_id = :user_id OR user_id = :default_id");
                $stmt->bindParam(':user_id', $userid, PDO::PARAM_INT);
                $stmt->bindParam(':default_id', $defaultId, PDO::PARAM_INT);
                $stmt->execute();
                $stmt->setFetchMode(PDO::FETCH_CLASS, 'Exercise');
                $exercises = $stmt->fetchAll();
                return $exercises;
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