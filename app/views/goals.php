<div id="goalModal" style="display:none;">
    <div class="goalmodal-content">
        <h2 id="modalTitle">Add Goal</h2>
        <form id="goalForm">
            <input type="hidden" id="goalId" name="id">
            <label for="exercise">Exercise:</label>
            <select id="exercise" name="exercise">
                <!-- Exercises will be populated here -->
            </select>
            <label for="target">Target:</label>
            <input type="number" id="target" name="target" step="0.1">
            <label for="targetDate">Target Date:</label>
            <input type="date" id="targetDate" name="targetDate">
            <button type="submit">Save Goal</button>
        </form>
        <button id="closeModal">Close</button>
    </div>
</div>

<h2>Your Goals</h2>
<script src="/js/goalModal.js"></script>
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
                <button onclick="openModal('edit', <?= $goal->getId() ?>, '<?= htmlspecialchars($goal->getExerciseName()) ?>', <?= $goal->getTarget() ?>, '<?= $goal->getDeadline() ?>')">Edit</button>
                <button onclick="openModal('delete', <?= $goal->getId() ?>)">Delete</button>
            
                <?php endif; ?>

        </li>
    <?php endforeach; ?>
</ul>

<?php if (isset($_SESSION['user'])): ?>
    <button onclick="openModal('add')">Add New Goal</button>
<?php endif; ?>


