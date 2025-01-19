<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/exercise.php';

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

        function getDefault()
        {
                $defaultId = 1;
                $stmt = $this->connection->prepare("SELECT * FROM exercises WHERE user_id = :default_id");
                $stmt->bindParam(':default_id', $defaultId, PDO::PARAM_INT);
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

        function getfromUserId($user)
        {       
                $userid = $user->getId();
                $stmt = $this->connection->prepare("SELECT * FROM exercises WHERE user_id = :user_id");
                $stmt->bindParam(':user_id', $userid, PDO::PARAM_INT);
                $stmt->execute();
                $stmt->setFetchMode(PDO::FETCH_CLASS, 'Exercise');
                $exercises = $stmt->fetchAll();
                return $exercises;
        }

        function editExercise($exercise)
        {
            $id = $exercise->getId();
            $name = $exercise->getName();
            $muscleGroup = $exercise->getMuscleGroup();
            $description = $exercise->getDescription();
            $stmt = $this->connection->prepare("UPDATE exercises SET name = :name, muscle_group = :msc, description = :desc WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':msc', $muscleGroup, PDO::PARAM_STR);
            $stmt->bindParam(':desc', $description, PDO::PARAM_STR);
            $stmt->execute();
        }
        

        function deleteExercise($id)
        {
                $sql = "DELETE FROM exercises WHERE id = :id";
                $stmt = $this->connection->prepare($sql);
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                $stmt->execute();
        }

}
?>