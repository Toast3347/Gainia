document.addEventListener('DOMContentLoaded', function () {

    // View Details 
    const viewDetailsModal = document.getElementById('viewDetailsModal');
    viewDetailsModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        document.getElementById('detailsDate').textContent = button.getAttribute('data-session-date');
        document.getElementById('detailsName').textContent = button.getAttribute('data-session-name');
        document.getElementById('detailsTime').textContent = button.getAttribute('data-session-time');
    });

    // Edit Session 
    const editSessionModal = document.getElementById('editSessionModal');
    editSessionModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        document.getElementById('editId').value = button.getAttribute('data-session-id');
        document.getElementById('editDate').value = button.getAttribute('data-session-date');
        document.getElementById('editName').value = button.getAttribute('data-session-name');
        document.getElementById('editTime').value = button.getAttribute('data-session-time');
    });

    // Add Session Modal
    const addSessionModal = document.getElementById('addSessionModal');
    if (addSessionModal) {
        addSessionModal.addEventListener('show.bs.modal', function (event) {
            // add logic to add a session, so maybe add that you can add multiple exercises and stuff.
        });
    }

    const deleteForms = document.querySelectorAll('form[onsubmit="return confirm(\'Are you sure you want to delete this session?\');"]');
    deleteForms.forEach(form => {
        form.addEventListener('submit', function (event) {
            // Optional: Handle any extra logic before submitting, such as making an AJAX request
            // For now, the confirm message is shown, and the form is submitted to delete the session
        });
    });

    // Add event listeners for all the edit buttons in the table
    const editButtons = document.querySelectorAll('[data-bs-toggle="modal"][data-bs-target="#editSessionModal"]');
    editButtons.forEach(button => {
        button.addEventListener('click', function () {
            // change this so it gets the acurate information. Do this after you can properly add a session though.
            document.getElementById('editId').value = button.getAttribute('data-session-id');
            document.getElementById('editDate').value = button.getAttribute('data-session-date');
            document.getElementById('editName').value = button.getAttribute('data-session-name');
            document.getElementById('editTime').value = button.getAttribute('data-session-time');
        });
    });

    // Add event listeners for all the delete buttons in the table
    const deleteButtons = document.querySelectorAll('[name="delete_id"]');
    deleteButtons.forEach(button => {
        button.addEventListener('click', function (event) {
            // Optional: Handle any logic or AJAX call for deleting a session
        });
    });

});
