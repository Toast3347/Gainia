<h2>Your Goals</h2>
<ul>
    <?php 
    $counter = 1;
    foreach ($goals as $goal): ?>
        <li>
            <h3>Goal <?= htmlspecialchars($counter); $counter++; ?></h3>
            <p>Exercise: <?= htmlspecialchars($goal->getExerciseName()) ?></p>
            <p>Target: <?= htmlspecialchars($goal->getTarget()) ?> kg</p>
            <p>Deadline: <?= htmlspecialchars($goal->getDeadline()) ?></p>
            
            <?php if (isset($_SESSION['user'])): ?>
                <button onclick="openModal('delete', <?= $goal->getId() ?>)">Delete</button>
            <?php endif; ?>

        </li>
    <?php endforeach; ?>
</ul>

<?php if (isset($_SESSION['user'])): ?>
    <button onclick="openModal('add')">Add New Goal</button>
<?php endif; ?>

<div id="addGoalModal" class="modal">
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <span class="close" onclick="closeModal('add')">&times;</span>
        <form method="POST" action="/goals/addGoal">
            <label for="exerciseName">Exercise:</label>
            <select id="exerciseName" name="exercise" required>
                <option value="">Select Exercise</option>
                <?php foreach ($exercises as $exercise): ?>
                    <option value="<?= htmlspecialchars($exercise->getId()) ?>">
                        <?= htmlspecialchars($exercise->getName()) ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <br>
            <label for="target">Target (kg):</label>
            <input type="number" id="target" name="target" required>
            
            <label for="deadline">Deadline:</label>
            <input type="date" id="deadline" name="target_date" required>
            
            <button type="submit" class="btn btn-primary">Add Goal</button>
        </form>
    </div>
</div>
</div>


<div id="deleteGoalModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('delete')">&times;</span>
        <form method="POST" action="/goals/deleteGoal">
            <input type="hidden" id="deleteGoalId" name="goalId">
            <p>Are you sure you want to delete this goal?</p>
            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
        </form>
    </div>
</div>

<script src="/js/hiModal.js"></script>
