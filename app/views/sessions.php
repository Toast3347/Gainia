<div class="container mt-5">
    <h2 class="text-center mb-4">Your Gym Sessions</h2>
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
                            <button 
                                type="button" 
                                class="btn btn-secondary btn-sm" 
                                data-bs-toggle="modal" 
                                data-bs-target="#viewDetailsModal" 
                                data-session-id="<?= $session->getId(); ?>" 
                                data-session-date="<?= htmlspecialchars($session->getDate()); ?>" 
                                data-session-name="<?= htmlspecialchars($session->getName()); ?>" 
                                data-session-time="<?= htmlspecialchars($session->getTime()); ?>">
                                View Details
                            </button>
                        </td>
                        <td>
                            <button 
                                type="button" 
                                class="btn btn-warning btn-sm" 
                                data-bs-toggle="modal" 
                                data-bs-target="#editSessionModal" 
                                data-session-id="<?= $session->getId(); ?>" 
                                data-session-date="<?= htmlspecialchars($session->getDate()); ?>" 
                                data-session-name="<?= htmlspecialchars($session->getName()); ?>" 
                                data-session-time="<?= htmlspecialchars($session->getTime()); ?>">
                                Edit
                            </button>
                        <td>
                            <form method="POST" action="" onsubmit="return confirm('Are you sure you want to delete this session?');">
                                <input type="hidden" name="delete_id" value="<?= htmlspecialchars($session->getId()); ?>" />
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
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

<div class="modal fade" id="viewDetailsModal" tabindex="-1" aria-labelledby="viewDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewDetailsModalLabel">Session Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>Date:</strong> <span id="detailsDate"></span></p>
                <p><strong>Workout:</strong> <span id="detailsName"></span></p>
                <p><strong>Duration:</strong> <span id="detailsTime"></span> hours</p>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editSessionModal" tabindex="-1" aria-labelledby="editSessionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editSessionModalLabel">Edit Session</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="/edit-session">
                    <input type="hidden" id="editId" name="id">
                    <div class="mb-3">
                        <label for="editDate" class="form-label">Date</label>
                        <input type="date" class="form-control" id="editDate" name="date">
                    </div>
                    <div class="mb-3">
                        <label for="editName" class="form-label">Workout</label>
                        <input type="text" class="form-control" id="editName" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="editTime" class="form-label">Duration (hours)</label>
                        <input type="number" step="0.1" class="form-control" id="editTime" name="time">
                    </div>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="/js/modal.js"></script>