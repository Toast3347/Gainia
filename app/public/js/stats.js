document.addEventListener("DOMContentLoaded", function () {
  function getData(elementId, defaultValue) {
      const element = document.getElementById(elementId);
      return element ? (element.getAttribute('data-value') || defaultValue) : defaultValue;
  }

  const defaultWeight = 75; 
  const defaultSessions = 3;
  const defaultHeight = 1.75; 

 
  const weight = parseFloat(getData('initial-weight', defaultWeight));
  const weeklySessions = parseInt(getData('initial-weekly-sessions', defaultSessions), 10);
  const height = defaultHeight;


  const bmi = (weight / (height * height)).toFixed(1);


  const weightDisplay = document.getElementById('weight-display');
  if (weightDisplay) weightDisplay.textContent = `${weight} kg`;

  const sessionsDisplay = document.getElementById('weekly-sessions-display');
  if (sessionsDisplay) sessionsDisplay.textContent = `${weeklySessions} sessions`;

  const bmiDisplay = document.getElementById('bmi');
  if (bmiDisplay) bmiDisplay.textContent = bmi;

 
  const weightProgression = [70, 72, 71, 73, 74];
  const weeklySessionsData = [4, 5, 3, 4, 6];


  const weightChartCanvas = document.getElementById('weight-chart');
  if (weightChartCanvas) {
      const weightChartCtx = weightChartCanvas.getContext('2d');
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
  }

  
  const sessionsChartCanvas = document.getElementById('sessions-chart');
  if (sessionsChartCanvas) {
      const sessionsChartCtx = sessionsChartCanvas.getContext('2d');
      new Chart(sessionsChartCtx, {
          type: 'bar',
          data: {
              labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4', 'Week 5'],
              datasets: [{
                  label: 'Sessions per Week',
                  data: weeklySessionsData,
                  backgroundColor: 'rgba(54, 162, 235, 0.5)',
                  borderColor: 'rgba(54, 162, 235, 1)',
                  borderWidth: 1
              }]
          }
      });
  }
});
