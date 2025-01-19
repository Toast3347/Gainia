document.addEventListener('DOMContentLoaded', function() {
    var editExerciseModal = document.getElementById('editExerciseModal');

    editExerciseModal.addEventListener('show.bs.modal', function (event) {

        var button = event.relatedTarget;
        

        var exerciseId = button.getAttribute('data-id');
        var exerciseName = button.getAttribute('data-name');
        var muscleGroup = button.getAttribute('data-muscle-group');
        var description = button.getAttribute('data-description');

        var modalIdInput = editExerciseModal.querySelector('#editExerciseId');
        var modalNameInput = editExerciseModal.querySelector('#editExerciseName');
        var modalMuscleGroupInput = editExerciseModal.querySelector('#editMuscleGroup');
        var modalDescriptionInput = editExerciseModal.querySelector('#editDescription');

        modalIdInput.value = exerciseId;
        modalNameInput.value = exerciseName;
        modalMuscleGroupInput.value = muscleGroup;
        modalDescriptionInput.value = description;
    });
});
