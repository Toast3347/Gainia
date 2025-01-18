document.addEventListener('DOMContentLoaded', function () {
    // Get the modal elements
    const goalModal = document.getElementById('goalModal');
    const modalTitle = document.getElementById('modalTitle');
    const closeModalButton = document.getElementById('closeModal');
    const exerciseSelect = document.getElementById('exercise');
    const goalForm = document.getElementById('goalForm');
    
    // Open the modal
    function openModal(action, goalId = null, exerciseName = '', target = '', targetDate = '') {
        // Show the modal
        goalModal.style.display = 'block';

        // Reset form fields
        goalForm.reset();

        // Fetch exercises to populate the select dropdown
        fetch('/app/services/exerciseService.php')
            .then(response => response.json()) // Assuming the response is a JSON object
            .then(data => {
                if (data && data.exercises) {
                    exerciseSelect.innerHTML = ''; // Clear the exercise options
                    data.exercises.forEach(exercise => {
                        const option = document.createElement('option');
                        option.value = exercise.id;
                        option.textContent = exercise.name;
                        exerciseSelect.appendChild(option);
                    });
                }
            })
            .catch(error => {
                console.error('Error fetching exercises:', error);
            });

        // Handle modal title and input values for edit or add actions
        if (action === 'edit') {
            modalTitle.textContent = 'Edit Goal';
            document.getElementById('goalId').value = goalId;
            exerciseSelect.value = exerciseName; // Optional: Ensure the exercise value matches
            document.getElementById('target').value = target;
            document.getElementById('targetDate').value = targetDate;
        } else if (action === 'delete') {
            modalTitle.textContent = 'Delete Goal';
            // Set the goalId and proceed with delete (if needed)
            document.getElementById('goalId').value = goalId;
            // Add custom delete functionality here, or ask for confirmation
        } else {
            modalTitle.textContent = 'Add Goal'; // Default for add action
        }
    }

    // Close the modal
    closeModalButton.addEventListener('click', function () {
        goalModal.style.display = 'none';
    });

    // Handle form submission for adding or editing goals
    goalForm.addEventListener('submit', function (event) {
        event.preventDefault(); // Prevent default form submission

        const formData = new FormData(goalForm);
        const actionUrl = (modalTitle.textContent === 'Add Goal') ? '/app/controllers/dashboardcontroller.php/addGoal' : '/app/controllers/dashboardcontroller.php/editGoal';
        
        fetch(actionUrl, {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())  // Assuming the response is in JSON
        .then(data => {
            if (data.success) {
                alert('Goal saved successfully');
                goalModal.style.display = 'none'; // Close the modal after saving
                location.reload(); // Reload the page to reflect the changes (optional)
            } else {
                alert('Failed to save the goal');
            }
        })
        .catch(error => {
            console.error('Error saving the goal:', error);
        });
    });
});
