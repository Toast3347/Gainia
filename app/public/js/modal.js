document.getElementById('addExerciseButton').addEventListener('click', function() {
    var exerciseContainer = document.getElementById('exerciseContainer');
    var exerciseGroups = document.getElementsByClassName('exercise-group');
    var newIndex = exerciseGroups.length;

    var template = document.getElementById('exerciseTemplate').content.cloneNode(true);
    
    template.querySelectorAll('select, input').forEach(function(element) {
        var name = element.getAttribute('id');
        element.setAttribute('name', 'exercises[' + newIndex + '][' + name + ']');
        element.setAttribute('id', name + '_' + newIndex);
    });

    exerciseContainer.appendChild(template);
});

document.querySelectorAll('[data-bs-target="#viewDetailsModal"]').forEach(button => {
    button.addEventListener('click', function() {
        var sessionId = this.getAttribute('data-session-id');
        fetch('/dashboard/getSessionDetails?sessionId=' + sessionId)
            .then(response => response.json())
            .then(data => {

                const detailsDate = document.getElementById('detailsDate');
                const detailsName = document.getElementById('detailsName');
                const detailsTime = document.getElementById('detailsTime');
                const detailsExercisesContainer = document.getElementById('detailsExercisesContainer');

                if (detailsDate && detailsName && detailsTime && detailsExercisesContainer) {
                    detailsDate.textContent = data.session.date;
                    detailsName.textContent = data.session.name;
                    detailsTime.textContent = data.session.time + ' hours';

                    detailsExercisesContainer.innerHTML = '';
                    data.exercises.forEach(exercise => {
                        const exerciseDetail = `
                            <div>
                                <label><strong>Exercise:</strong></label>
                                <span>${exercise.name}</span>
                            </div>
                            <div>
                                <label><strong>Sets:</strong></label>
                                <span>${exercise.sets}</span>
                            </div>
                            <div>
                                <label><strong>Reps:</strong></label>
                                <span>${exercise.reps}</span>
                            </div>
                            <div>
                                <label><strong>Weight:</strong></label>
                                <span>${exercise.weight} kg</span>
                            </div>
                            <hr>`;
                        detailsExercisesContainer.insertAdjacentHTML('beforeend', exerciseDetail);
                    });

                    const viewDetailsModal = new bootstrap.Modal(document.getElementById('viewDetailsModal'));
                    viewDetailsModal.show();
                } else {
                    console.error('Missing elements for displaying session details.');
                }
            })
            .catch(error => {
                console.error('Error fetching details:', error);
            });
    });
});


document.querySelectorAll('[data-bs-dismiss="modal"]').forEach(button => {
    button.addEventListener('click', function() {
        var viewDetailsModal = bootstrap.Modal.getInstance(document.getElementById('viewDetailsModal'));
        if (viewDetailsModal) {
            viewDetailsModal.hide();
        }
        document.querySelectorAll('.modal-backdrop').forEach(backdrop => {
            backdrop.parentNode.removeChild(backdrop);
        });
    });
});

document.querySelectorAll('[data-bs-target="#editSessionModal"]').forEach(button => {
    button.addEventListener('click', function() {
        var sessionId = this.getAttribute('data-session-id');

        fetch('/dashboard/getSessionDetails?sessionId=' + sessionId)
            .then(response => response.json())
            .then(data => {
                const editSessionId = document.getElementById('editSessionId');
                const editSessionName = document.getElementById('editSessionName');
                const editSessionDate = document.getElementById('editSessionDate');
                const editSessionTime = document.getElementById('editSessionTime');
                const editExercisesContainer = document.getElementById('editExercisesContainer');

                editSessionId.value = data.session.id;
                editSessionName.value = data.session.name;
                editSessionDate.value = data.session.date;
                editSessionTime.value = data.session.time;

                editExercisesContainer.innerHTML = '';
                data.exercises.forEach((exercise, index) => {
                    const exerciseDetail = `
                        <div class="exercise-group">
                            <div class="mb-3">
                                <label for="exerciseId${index}" class="form-label">Exercise</label>
                                <select class="form-control" id="exerciseId${index}" name="exercises[${index}][exerciseId]" required>
                                    ${data.exercises.map(exerciseOption => `
                                        <option value="${exerciseOption.id}" ${exerciseOption.id === exercise.id ? 'selected' : ''}>
                                            ${exerciseOption.name}
                                        </option>
                                    `).join('')}
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="sets${index}" class="form-label">Sets</label>
                                <input type="number" class="form-control" id="sets${index}" name="exercises[${index}][sets]" value="${exercise.sets}" required>
                            </div>
                            <div class="mb-3">
                                <label for="reps${index}" class="form-label">Reps</label>
                                <input type="number" class="form-control" id="reps${index}" name="exercises[${index}][reps]" value="${exercise.reps}" required>
                            </div>
                            <div class="mb-3">
                                <label for="weight${index}" class="form-label">Weight (in kg)</label>
                                <input type="number" step="0.1" class="form-control" id="weight${index}" name="exercises[${index}][weight]" value="${exercise.weight}" required>
                            </div>
                        </div>
                    `;
                    editExercisesContainer.insertAdjacentHTML('beforeend', exerciseDetail);
                });

                const editSessionModal = new bootstrap.Modal(document.getElementById('editSessionModal'));
                editSessionModal.show();
            });
    });
});









