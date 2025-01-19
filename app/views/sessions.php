<?php
$deleteMessage = 'Are you sure you want to delete this session?'
?>
<div class="container mt-5">
    <div class="text-center mb-4">
        <h2>Your (upcoming) Gym Sessions</h2>
        <?php
        if (isset($_SESSION['user'])) { 
            echo '
        <button 
            type="button" 
            class="btn btn-primary btn-sm" 
            data-bs-toggle="modal" 
            data-bs-target="#addSessionModal">
            Add workout
        </button>';}?>
    </div>
    <table class="table table-striped table-bordered table-hover text-center">
        <thead class="table-dark">
            <tr>
                <th>Date</th>
                <th>Workout</th>
                <th>Duration</th>
                <th>View details</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($sessions) && is_array($sessions)): ?>
                <?php foreach ($sessions as $session): ?>
                    <tr>
                        <td><?= htmlspecialchars($session->getDate()); ?></td>
                        <td><?= htmlspecialchars($session->getName()); ?></td>
                        <td><?= htmlspecialchars($session->getTime()); ?> hours</td>
                        <td>
                            <?php
                            if (isset($_SESSION['user'])) { 
                                echo '<button 
                                type="button" 
                                class="btn btn-secondary btn-sm" 
                                data-bs-toggle="modal" 
                                data-bs-target="#viewDetailsModal" 
                                data-session-id="<?= $session->getId(); ?>" 
                                data-session-date="<?= htmlspecialchars($session->getDate()); ?>" 
                                data-session-name="<?= htmlspecialchars($session->getName()); ?>" 
                                data-session-time="<?= htmlspecialchars($session->getTime()); ?>">
                                View Details
                            </button>';}?>
                        </td>
                        <td>
                        <?php   
                        if (isset($_SESSION['user'])) { 
                            echo '<button 
                                type="button" 
                                class="btn btn-warning btn-sm" 
                                data-bs-toggle="modal" 
                                data-bs-target="#editSessionModal" 
                                data-session-id="<?= $session->getId(); ?>" 
                                data-session-date="<?= htmlspecialchars($session->getDate()); ?>" 
                                data-session-name="<?= htmlspecialchars($session->getName()); ?>" 
                                data-session-time="<?= htmlspecialchars($session->getTime()); ?>">
                                Edit
                            </button>';}?>
                        </td>
                        <td>
                        <?php if (isset($_SESSION['user'])) { ?>
                            <form method="POST" action="/dashboard/deleteSession" onsubmit="return confirm('<?= $deleteMessage ?>');">
                                <input type="hidden" name="delete_id" value="<?= htmlspecialchars($session->getId()); ?>" />
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                             </form>
                        <?php } ?>
                        </td>
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

<div class="modal fade" id="addSessionModal" tabindex="-1" aria-labelledby="addSessionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addSessionModalLabel">Add Workout</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addSessionForm" method="POST" action="/dashboard/addSession">
                    <div class="mb-3">
                        <label for="date" class="form-label">Date</label>
                        <input type="date" class="form-control" id="date" name="date" required>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Workout Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="duration" class="form-label">Duration (in hours)</label>
                        <input type="number" step="0.1" class="form-control" id="duration" name="duration" required>
                    </div>
                    <div id="exerciseContainer">
                        <div class="exercise-group">
                            <div class="mb-3">
                                <label for="exerciseId" class="form-label">Exercise</label>
                                <select class="form-control" id="exerciseId" name="exercises[0][exerciseId]" required>
                                    <?php foreach ($exercises as $exercise): ?>
                                        <option value="<?= htmlspecialchars($exercise->getId()); ?>">
                                            <?= htmlspecialchars($exercise->getName()); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="sets" class="form-label">Sets</label>
                                <input type="number" class="form-control" id="sets" name="exercises[0][sets]" required>
                            </div>
                            <div class="mb-3">
                                <label for="reps" class="form-label">Reps</label>
                                <input type="number" class="form-control" id="reps" name="exercises[0][reps]" required>
                            </div>
                            <div class="mb-3">
                                <label for="weight" class="form-label">Weight (in kg)</label>
                                <input type="number" step="0.1" class="form-control" id="weight" name="exercises[0][weight]" required>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <button type="button" class="btn btn-secondary" id="addExerciseButton">Add Another Exercise</button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<template id="exerciseTemplate">
    <div class="exercise-group">
        <div class="mb-3">
            <label for="exerciseId" class="form-label">Exercise</label>
            <select class="form-control" id="exerciseId" required>
                <?php foreach ($exercises as $exercise): ?>
                    <option value="<?= htmlspecialchars($exercise->getId()); ?>">
                        <?= htmlspecialchars($exercise->getName()); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="sets" class="form-label">Sets</label>
            <input type="number" class="form-control" id="sets" required>
        </div>
        <div class="mb-3">
            <label for="reps" class="form-label">Reps</label>
            <input type="number" class="form-control" id="reps" required>
        </div>
        <div class="mb-3">
            <label for="weight" class="form-label">Weight (in kg)</label>
            <input type="number" step="0.1" class="form-control" id="weight" required>
        </div>
    </div>
</template>

<div class="modal fade" id="viewDetailsModal" tabindex="-1" aria-labelledby="viewDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewDetailsModalLabel">Workout Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div>
                    <label><strong>Date:</strong></label>
                    <span id="detailsDate"></span>
                </div>
                <div>
                    <label><strong>Name:</strong></label>
                    <span id="detailsName"></span>
                </div>
                <div>
                    <label><strong>Duration:</strong></label>
                    <span id="detailsTime"></span>
                </div>
                <div id="detailsExercisesContainer"></div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editSessionModal" tabindex="-1" aria-labelledby="editSessionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editSessionModalLabel">Edit Workout</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editSessionForm" method="POST" action="/dashboard/editSession">
                    <input type="hidden" name="sessionId" id="editSessionId">
                    <div class="mb-3">
                        <label for="editSessionName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="editSessionName" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="editSessionDate" class="form-label">Date</label>
                        <input type="date" class="form-control" id="editSessionDate" name="date" required>
                    </div>
                    <div class="mb-3">
                        <label for="editSessionTime" class="form-label">Duration (in hours)</label>
                        <input type="number" step="0.1" class="form-control" id="editSessionTime" name="duration" required>
                    </div>
                    <div id="editExercisesContainer"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>





<script src="/js/modal.js"></script>
