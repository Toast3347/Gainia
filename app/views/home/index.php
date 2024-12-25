<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gainia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<header data-bs-theme="light">
  <nav class="navbar navbar-expand-md navbar-light bg-light">
    <div class="container-fluid">
        <img class="me-4" src="../images/Gainia logo transparentv2.png" class="rounded mx-auto d-block width :75%">
      <a class="navbar-brand" href="#">Dashboard</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" aria-disabled="true">Disabled</a>
          </li>
        </ul>
        <button class="btn btn-outline-success d-flex me-3" type="submit">Login</button>
        <div class="dropdown" data-bs-theme="light">
        <button class="btn btn-secondary btn-outline-dark bg-light rounded-circle btn-lg d-flex justify-content-center align-items-center p-1" type="button" data-bs-toggle="dropdown" style="height: 40px; width: 40px;"><img class="img-fluid w-100 h-100"src="../images/settings-icon.svg"/></button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButtonLight">
            <li><a class="dropdown-item active" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Separated link</a></li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
</header>
<main>
  <section class="py-2 mb-5 text-center container-fluid bg-light border border dark">
   <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">Gainia</h1>
        <p class="lead text-body-secondary">Your fitness pall</p>
      </div>
    </div>
  </section>
  <div class = "container">
  <table action = 'gym-sessions.php' method ="post">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Message</th>
                <th>Date</th>
                <th>IP Address</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
            
            foreach ($result as $row): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['id']); ?></td>
                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                    <td><?php echo nl2br(htmlspecialchars($row['message'])); ?></td>
                    <td><?php echo htmlspecialchars($row['posted_at']); ?></td>
                    <td><?php echo htmlspecialchars($row['ip_address']); ?></td>
                    <td>
                    <form method="POST" onsubmit="return confirm('Are you sure you want to delete this post?');">
                        <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>" />
                        <input type="submit" value="Delete" />
                    </form>
                </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
  </div>

</main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>