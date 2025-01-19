<div class="stat-container">

    <div class="stat-card">
        <div class="stat-icon"><i class="bi bi-heart-pulse"></i></div>
        <div class="stat-number" id="bmi"><?php echo $bmi;?></div>
        <div class="stat-description">Current BMI</div>
    </div>


    <div class="stat-card">
        <div class="stat-icon"><i class="bi bi-weight"></i></div>
        <div class="stat-number" id="weight-display"></div>
        <div class="stat-description">Weight Progression</div>
        <div class="chart-container">
            <canvas id="weight-chart"></canvas>
        </div>
    </div>


    <div class="stat-card">
        <div class="stat-icon"><i class="bi bi-calendar-week"></i></div>
        <div class="stat-number" id="weekly-sessions-display"></div>
        <div class="stat-description">Weekly Workout Sessions</div>
        <div class="chart-container">
            <canvas id="sessions-chart"></canvas>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="/js/stats.js"></script>a