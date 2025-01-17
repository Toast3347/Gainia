<div class="container-fluid mt-4">
    <div class="stat-container">
      <div class="stat-card">
        <div class="stat-icon"><i class="bi bi-heart-pulse"></i></div>
        <div class="stat-number" id="bmi">0.0</div>
        <div class="stat-description">Current BMI</div>
      </div>

      <div class="stat-card">
        <div class="stat-icon"><i class="bi bi-weight"></i></div>
        <div class="stat-number" id="weight">0.0 kg</div>
        <div class="stat-description">Weight Progression</div>
        <div class="chart-container">
          <div id="weight-chart"></div>
        </div>
      </div>

      <div class="stat-card">
        <div class="stat-icon"><i class="bi bi-calendar-week"></i></div>
        <div class="stat-number" id="weekly-sessions">0</div>
        <div class="stat-description">Weekly Workout Sessions</div>
        <div class="chart-container">
          <div id="sessions-chart"></div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="/js/stats.js"></script>