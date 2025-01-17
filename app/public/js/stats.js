document.addEventListener("DOMContentLoaded", function() {
    
    const weightProgression = [70, 72, 71, 73, 74];
    const weeklySessions = [4, 5, 3, 4, 6];


    const weightChartCtx = document.getElementById('weight-chart').getContext('2d');
    new Chart(weightChartCtx, {
      type: 'line',
      data: {
        labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4', 'Week 5'],
        datasets: [{
          label: 'Weight (kg)',
          data: weightProgression,
          borderColor: 'rgba(75, 192, 192, 1)',
          backgroundColor: 'rgba(75, 192, 192, 0.2)',
          fill: true
        }]
      }
    });

    const sessionsChartCtx = document.getElementById('sessions-chart').getContext('2d');
    new Chart(sessionsChartCtx, {
      type: 'bar',
      data: {
        labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4', 'Week 5'],
        datasets: [{
          label: 'Sessions per Week',
          data: weeklySessions,
          backgroundColor: 'rgba(54, 162, 235, 0.5)',
          borderColor: 'rgba(54, 162, 235, 1)',
          borderWidth: 1
        }]
      }
    });
  });