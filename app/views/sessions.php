<div class="container mt-5">
    <h2 class="text-center mb-4">Your Gym Sessions</h2>
    <table class="table table-striped table-bordered table-hover text-center">
        <thead class="table-dark">
            <tr>
                <th>Date</th>
                <th>Type</th>
                <th>Duration</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($result) && is_array($result)): ?>
                <?php foreach ($result as $row): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['date']); ?></td>
                        <td><?php echo htmlspecialchars($row['type']); ?></td>
                        <td><?php echo htmlspecialchars($row['duration']); ?> mins</td>
                        <td>
                            <form method="POST" action="gym-sessions.php" onsubmit="return confirm('Are you sure you want to delete this session?');">
                                <input type="hidden" name="delete_id" value="<?php echo htmlspecialchars($row['id']); ?>" />
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" class="text-center text-muted">No gym sessions found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>