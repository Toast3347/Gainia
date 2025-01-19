document.addEventListener('DOMContentLoaded', function() {
    console.log('DOMContentLoaded event triggered');

    window.openModal = function(type, id = null, exerciseName = '', target = '', deadline = '') {
        const modal = document.getElementById(type + 'GoalModal');
        if (modal) {
            console.log(`Opening modal of type: ${type}`);
            modal.style.display = 'block';

            if (type === 'edit') {
                document.getElementById('goalId').value = id;
                document.getElementById('editExerciseName').value = exerciseName;
                document.getElementById('editTarget').value = target;
                document.getElementById('editDeadline').value = deadline;
            }

            if (type === 'delete') {
                document.getElementById('deleteGoalId').value = id;
            }
        } else {
            console.error(`Modal of type: ${type} not found`);
        }
    };

    window.closeModal = function(type) {
        const modal = document.getElementById(type + 'GoalModal');
        if (modal) {
            console.log(`Closing modal of type: ${type}`);
            modal.style.display = 'none';
        } else {
            console.error(`Modal of type: ${type} not found`);
        }
    };
    
    window.onclick = function(event) {
        const modals = document.getElementsByClassName('modal');
        for (let i = 0; i < modals.length; i++) {
            if (event.target === modals[i]) {
                modals[i].style.display = 'none';
            }
        }
    };
});


