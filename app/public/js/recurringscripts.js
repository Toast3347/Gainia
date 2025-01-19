document.addEventListener('DOMContentLoaded', () => {
    const routineList = document.getElementById('routineList');
    const addRoutineForm = document.getElementById('addRoutineForm');


    async function loadRoutines() {
        const response = await fetch('/api/routines');
        const routines = await response.json();
        routineList.innerHTML = '';
        routines.forEach(routine => {
            const li = document.createElement('li');
            li.textContent = routine.name;
            const deleteButton = document.createElement('button');
            deleteButton.textContent = 'Delete';
            deleteButton.onclick = async () => {
                await fetch(`/api/routines/${routine.id}`, { method: 'DELETE' });
                loadRoutines();
            };
            li.appendChild(deleteButton);
            routineList.appendChild(li);
        });
    }


    addRoutineForm.onsubmit = async (event) => {
        event.preventDefault();
        const routineName = document.getElementById('routineName').value;
        await fetch('/api/routines', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ name: routineName })
        });
        addRoutineForm.reset();
        loadRoutines();
    };


    loadRoutines();
});

