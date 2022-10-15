<?php require("controllers/register.class.php") ?>
<?php
if (isset($_POST['submit'])) {
    $user = new RegisterUser($_POST['username'], $_POST['phone'], $_POST['email'], $_POST['password']);
}

include_once('layout/head.php');
?>
<div class="container mt-5">
    <div class="mb-3 mx-5">
        <form method="post" action="" enctype="multipart/form-data" autocomplete="off">
            <div class="card mx-5">
                <div class="card-body mx-5">
                    <h2 class="card-title">Register</h5>
                        <p class="card-text">User Info</p>
                        <label for="Username" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Username" required>
                        <label for="Phone" class="form-label">Phone</label>
                        <input type="tel" class="form-control" name="phone"  placeholder="Phone" required>
                        <label for="Email" class="form-label">Email</label>
                        <input type="email"class="form-control" name="email" placeholder="Email"  required>
                        <label for="Password" class="form-label">Password</label>
                        <input type="password"class="form-control" min="6" placeholder="Password" name="password" required>
                        <button type="submit" name="submit" class="btn btn-primary mt-2">Sing up</button>
                </div>
            </div>

    </div>
</div>
</form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>