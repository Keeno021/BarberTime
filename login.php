<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <form action="includes/login.inc.php" method="POST">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="username" class="form-control" id="username" name="username"
                        aria-describedby="username" placeholder="Enter username">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div>
                <p class="mt-1">No account? <a data-bs-toggle="modal" href="#togglesignup" class="highlighted-text">Sign up.</a></p>
                <button type="submit" name="login" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
</div>