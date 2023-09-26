<div class="container">
    <div class="row">
        <div class="col-sm-12">
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
                <p class="mt-1">Already have an account? <a data-bs-toggle="modal" href="#togglelogin" class="highlighted-text">Login.</a></p>
                <button type="submit" name="signup" class="btn btn-primary">Sign up</button>
            </form>
        </div>
    </div>
</div>