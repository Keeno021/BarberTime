<?php 
session_start();
include "includes/header.php";
?>
<div class="container">
    <div class="row mt-5">
        <div class="col-sm-3"></div>
        <div class="col">
            <h1>Main page</h1>
            <?php 
                if (isset($_SESSION['username'])) {
                    echo '<h4>You are logged in as '. $_SESSION['username'].' </h4>';
                } else {
                    echo '<h4>You are not logged in</h4>';

                    ?>

            <div class="modal fade" id="togglesignup" aria-hidden="true" aria-labelledby="togglesignup" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="togglesignup">Sign up!</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body" id="loginContent">
                            <!-- Content from PHP page will load here -->
                        </div>
                    </div>
                </div>
            </div>

            <a class="btn btn-primary" data-bs-toggle="modal" href="#togglesignup" role="button">Sign up!</a>
            <?php
                }
            ?>
        </div>
        <div class="col-sm-3"></div>
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