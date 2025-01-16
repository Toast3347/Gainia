document.addEventListener('DOMContentLoaded', function () {
    
    const viewDetailsModal = document.getElementById('viewDetailsModal');
    viewDetailsModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        document.getElementById('detailsDate').textContent = button.getAttribute('data-session-date');
        document.getElementById('detailsName').textContent = button.getAttribute('data-session-name');
        document.getElementById('detailsTime').textContent = button.getAttribute('data-session-time');
    });

    const editSessionModal = document.getElementById('editSessionModal');
    editSessionModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        document.getElementById('editId').value = button.getAttribute('data-session-id');
        document.getElementById('editDate').value = button.getAttribute('data-session-date');
        document.getElementById('editName').value = button.getAttribute('data-session-name');
        document.getElementById('editTime').value = button.getAttribute('data-session-time');
    });
});