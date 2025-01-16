<div class="container mt-5">
    <h2 class="text-center mb-4">Your Gym Sessions</h2>
    <table class="table table-striped table-bordered table-hover text-center">
        <thead class="table-dark">
            <tr>
                <th>Date</th>
                <th>Workout</th>
                <th>Duration</th>
                <th>Action</th>
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
                            <button type="submit" class="btn btn-secondary btn-sm">Edit</button>
                            <form method="POST" action="" onsubmit="return confirm('Are you sure you want to delete this session?');">
                                <input type="hidden" name="delete_id" value="<?= htmlspecialchars($session->getId()); ?>" />
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" class="text-center text-muted">No sessions found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>