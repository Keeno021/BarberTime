<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <link href="../css/styles.css" rel="stylesheet">
    <title>BarberTime</title>
</head>

<body>
    <section class="navbar">
        <nav class="navbar-expand-lg p-3">
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="../index.php">Home</a>
                <?php 
                if (isset($_SESSION['username'])) {
                    echo '<form class="d-flex" method="POST" action="../includes/logout.inc.php">
                    <input type="submit" name="logout" class="btn btn-outline-danger" value="Logout">
                  </form> ';
                } else {
                    echo '<a class="nav-item nav-link" href="signup.php">Sign up</a> <a class="nav-item nav-link" href="login.php">Login</a>';
                }
    ?>
            </div>
            </div>
            </div>
        </nav>
    </section>

</body>