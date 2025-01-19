<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gainia</title>
    <link rel="icon" type="image/x-icon" href="/images/Gainia_logo_transparentv2.png">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-beta3/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="/css/styles.css">
</head>

<body class="d-flex flex-column min-vh-100">

    <?php
    include __DIR__ . '/../header.php';
    ?>
    
    <main>
    <div class="container mt-5">
    <div class="text-center mb-4">
        <h2>default exercises</h2>
    </div>

    
    <table class="table table-striped table-bordered table-hover text-center">
        <thead class="table-dark">
            <tr>
                <th>name</th>
                <th>muscle group</th>
                <th>description</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($defaultExercises) && is_array($defaultExercises)): ?>
                <?php foreach ($defaultExercises as $defaultExercise): ?>
                    <tr>
                        <td><?= htmlspecialchars($defaultExercise->getName()); ?></td>
                        <td><?= htmlspecialchars($defaultExercise->getMuscleGroup()); ?></td>
                        <td><?= htmlspecialchars($defaultExercise->getDescription()); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" class="text-center text-muted">No sessions found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    </div>


    <div class="container mt-5">
    <div class="text-center mb-4">
        <h2>Your exercises</h2>
        <button 
            type="button" 
            class="btn btn-primary btn-sm" 
            data-bs-toggle="modal" 
            data-bs-target="#addExerciseModal">
            Add exercise
        </button>
    </div>
    <table class="table table-striped table-bordered table-hover text-center">
        <thead class="table-dark">
            <tr>
                <th>name</th>
                <th>muscle group</th>
                <th>description</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($exercises) && is_array($exercises)): ?>
                <?php foreach ($exercises as $exercise): ?>
                    <tr>
                        <td><?= htmlspecialchars($exercise->getName()); ?></td>
                        <td><?= htmlspecialchars($exercise->getMuscleGroup()); ?></td>
                        <td><?= htmlspecialchars($exercise->getDescription()); ?></td>
                        <td>
                        <button 
                            type="button" 
                            class="btn btn-warning btn-sm" 
                            data-bs-toggle="modal" 
                            data-bs-target="#editExerciseModal"
                            data-id="<?= htmlspecialchars($exercise->getId()); ?>"
                            data-name="<?= htmlspecialchars($exercise->getName()); ?>"
                            data-muscle-group="<?= htmlspecialchars($exercise->getMuscleGroup()); ?>"
                            data-description="<?= htmlspecialchars($exercise->getDescription()); ?>">
                            Edit
                        </button>
                        </td>
                        <td>
                            <form method="POST" action="/exercise/deleteExercise" onsubmit="return confirm('Are you sure you want to delete this exercise?');">
                                <input type="hidden" name="delete_id" value="<?= htmlspecialchars($exercise->getId()); ?>" />
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" class="text-center text-muted">No sessions found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    </div>
    
    <div class="modal fade" id="addExerciseModal" tabindex="-1" aria-labelledby="addExerciseModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addExerciseModalLabel">Add Exercise</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="/exercise/addExercise">
                        <div class="mb-3">
                            <label for="exerciseName" class="form-label">Name</label>
                            <input type="text" class="form-control" id="exerciseName" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="muscleGroup" class="form-label">Muscle Group</label>
                            <input type="text" class="form-control" id="muscleGroup" name="muscle_group" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Exercise</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editExerciseModal" tabindex="-1" aria-labelledby="editExerciseModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editExerciseModalLabel">Edit Exercise</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="/exercise/editExercise">
                        <input type="hidden" id="editExerciseId" name="id">
                        <div class="mb-3">
                            <label for="editExerciseName" class="form-label">Name</label>
                            <input type="text" class="form-control" id="editExerciseName" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="editMuscleGroup" class="form-label">Muscle Group</label>
                            <input type="text" class="form-control" id="editMuscleGroup" name="muscle_group" required>
                        </div>
                        <div class="mb-3">
                            <label for="editDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="editDescription" name="description" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-warning">Edit Exercise</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    </main>

    <?php
    include __DIR__ . '/../footer.php';
    ?>
    <script src="/js/exerciseModal.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>