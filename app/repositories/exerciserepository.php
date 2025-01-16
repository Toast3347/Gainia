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

        function insert($exercise)
        {
                $stmt = $this->connection->prepare("INSERT into artiasdasdsadsadsafvsdgvbszxcle (title, content, author, posted_at) VALUES (?,?,?, NOW())");

                $stmt->execute([$exercise->getTitle(), $exercise->getContent(), $exercise->getAuthor()]);

        }
}