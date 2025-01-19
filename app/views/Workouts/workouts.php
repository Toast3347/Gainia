<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Recurring Workouts</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include __DIR__ . '/../header.php'; ?>
    
    <main>
        <h1>Manage Recurring Workouts</h1>
        <form id="addRoutineForm" method="post" action="/routineController.php?action=add">
            <input type="text" name="routineName" placeholder="Routine Name" required>
            <button type="submit">Add Routine</button>
        </form>


        <ul id="routineList">
            <?php
            require_once __DIR__ . '/../../services/routinService.php';
            $routineService = new RoutineService();
            $routines = $routineService->getAll();
            foreach ($routines as $routine) {
                echo '<li>' . htmlspecialchars($routine['name']) . 
                     ' <form method="post" action="/routineController.php?action=delete" style="display:inline;">
                           <input type="hidden" name="id" value="' . $routine['id'] . '">
                           <button type="submit">Delete</button>
                         </form>
                     </li>';
            }
            ?>
        </ul>
    </main>
    
    <?php include __DIR__ . '/../footer.php'; ?>
</body>
</html>
