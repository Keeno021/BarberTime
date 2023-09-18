<?php include "includes/header.php";?>
<div class="container">
    <div class="row mt-5">
    <div class="col-sm-3"></div>
        <div class="col">
        <h1>Sign up</h1>
            <form action="includes/signup.inc.php" method="POST">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="username" class="form-control" id="username" name="username" aria-describedby="username"
                        placeholder="Enter username">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="email"
                        placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div>
                <button type="submit" name="signup" class="btn btn-primary mt-2">Sign up</button>
            </form>
        </div>
        <div class="col-sm-3"></div>
    </div>
</div>