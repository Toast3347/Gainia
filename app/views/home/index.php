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

<body class="d-flex flex-column min-vh-100">
<?php
include __DIR__ . '/../header.php';
?>
<main>
  <section class="py-2 mb-5 text-center container-fluid bg-light border border dark">
   <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">Gainia</h1>
        <p class="lead text-body-secondary">Your fitness pall</p>
        <button type="button" class="btn btn-dark">Create account</button>
      </div>
    </div>
  </section>
  <div class = "container">
  <table action = 'gym-sessions.php' method ="post">
        <thead>
            <tr>
                <th>Date</th>
                <th>Type</th>
                <th>Duration</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <!-- <?php
            foreach ($result as $row): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['date']); ?></td>
                    <td><?php echo htmlspecialchars($row['day']); ?></td>
                    <td><?php echo nl2br(htmlspecialchars($row['type'])); ?></td>
                    <td><?php echo htmlspecialchars($row['duration']); ?></td>
                    <td><?php echo htmlspecialchars($row['hi']); ?></td>
                    <td>
                    <form method="POST" onsubmit="return confirm('Are you sure you want to delete this post?');">
                        <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>" />
                        <input type="submit" value="Delete" />
                    </form>
                </td>
                </tr>
            <?php endforeach; ?> -->
        </tbody>
    </table>
  </div>

</main>
<?php
include __DIR__ . '/../footer.php';
?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>