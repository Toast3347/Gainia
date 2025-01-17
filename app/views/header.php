<header data-bs-theme="light" class="sticky-top">
  <nav class="navbar navbar-expand-md">
    
  <div class="container-fluid d-flex align-items-center">
      <?php
        if (isset($_SESSION['user'])) { echo '<a href="/dashboard"><img src="/images/Gainia_logo_transparentv2.png" alt="Gainia Logo" class=" mx-4 rounded img-fluid" style="width: 100px;"></a>';
        } 
        else {echo '<a href="home"><img src="/images/Gainia_logo_transparentv2.png" alt="Gainia Logo" class=" mx-4 rounded img-fluid" style="width: 100px;"></a>';}
        ?>
      
      <div class = "container-fluid d-flex align-items-center">
      <?php
        if (isset($_SESSION['user'])) { echo '<a class="nav-link me-3" href="/dashboard">Dashboard</a>';
        } 
        else {echo '<a class="nav-link me-3" href="/notloggedin">Dashboard</a>';}
        ?>
        <a class="nav-link" href="/statistics">Statistics</a>  
      </div>
      <?php
      if (isset($_SESSION['user'])) { echo '<a href="/home" class="btn btn-warning d-flex me-3">Logout</a>';
        } 
        else {echo '<a href="/login" class="btn btn-primary d-flex me-3">Login</a>';}
        ?>  
  </nav>
</header>