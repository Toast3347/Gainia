<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/workout.php';

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
            
        public function insert($workout) {
                $sql = "INSERT INTO workouts (user_id, name, date, time) VALUES (:user_id, :name, :date, :time)";
                $stmt = $this->connection->prepare($sql);
            
                $userId = $workout->getUserId();
                $name = $workout->getName();
                $date = $workout->getDate();
                $time = $workout->getTime();
            
                $stmt->bindParam(':user_id', $userId);
                $stmt->bindParam(':name', $name);
                $stmt->bindParam(':date', $date);
                $stmt->bindParam(':time', $time);
            
                $stmt->execute();
                return $this->connection->lastInsertId();
            }
        
            function getById($sessionId)
            {       
                $stmt = $this->connection->prepare("SELECT * FROM workouts WHERE id = :session_id"); 
                $stmt->bindParam(':session_id', $sessionId, PDO::PARAM_INT); 
                $stmt->execute(); 
                $stmt->setFetchMode(PDO::FETCH_CLASS, 'workout'); 
                $session = $stmt->fetch(); 
                return $session;
            }   

            public function update($workout) {
                $id = $workout->getId();
                $name = $workout->getName();
                $date = $workout->getDate();
                $time = $workout->getTime();
                $stmt = $this->connection->prepare("UPDATE workouts SET name = :name, date = :date, time = :time WHERE id = :id");
                $stmt->bindParam(':name', $name);
                $stmt->bindParam(':date', $date);
                $stmt->bindParam(':time', $time);
                $stmt->bindParam(':id', $id);
                $stmt->execute();
            }

            public function delete($sessionId) {
                $sql = "DELETE FROM workouts WHERE id = :id";
                $stmt = $this->connection->prepare($sql);
                $stmt->bindParam(':id', $sessionId, PDO::PARAM_INT);
                $stmt->execute();
            }
            
            
                    
}
?>