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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="css/styles.css" rel="stylesheet">
    <title>BarberTime</title>
</head>

<body>
    <section class="navbar">
        <nav class="navbar-expand-lg p-3">
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="index.php">Home</a>
                <?php 
                if (isset($_SESSION['username'])) {
                ?>
                <a class="nav-item nav-link" href="agenda.php">Book now!</a>
                <form class="d-flex" method="POST" action="includes/logout.inc.php">
                    <input type="submit" name="logout" class="btn btn-outline-danger" value="Logout">
                </form>
                <?php
                } else {
            ?>

                <a class="nav-item nav-link" data-bs-toggle="modal" href="#togglesignup">Sign up</a>
                <a class="nav-item nav-link" data-bs-toggle="modal" href="#togglelogin">Login</a>
                <?php
                }
                if (isset($_SESSION['admin'])) {
                    echo '<a class="nav-item nav-link" href="admin/admin.php">Admin</a>';
                }
            ?>

            </div>
        </nav>
    </section>
    <section class="bgImg">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="modal fade" id="togglesignup" aria-hidden="true" aria-labelledby="togglesignup"
                    tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="togglesignup">Sign up!</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body" id="modalContent">
                                <!-- Content from PHP page will load here -->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="togglelogin" aria-hidden="true" aria-labelledby="togglelogin" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="togglelogin">Login</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body" id="loginContent">
                                <!-- Content from PHP page will load here -->
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                $(document).ready(function() {
                    $('#togglesignup').on('show.bs.modal', function(e) {
                        $('#modalContent').load('signup.php');
                    });
                });

                $(document).ready(function() {
                    $('#togglelogin').on('show.bs.modal', function(e) {
                        $('#loginContent').load('login.php');
                    });
                });
                </script>
            </div>
            <div class="col-sm">
            <?php 
                if (!isset($_SESSION['username'])) {
                ?>
                <a class="btn btn-primary" data-bs-toggle="modal" href="#togglesignup" role="button">Sign up!</a>
                 <?php
                }
            ?>
            </div>
            <div class="col-sm-4"></div>
        </div>
</section>
</body>