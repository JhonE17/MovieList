<?php require("controllers/login.class.php") ?>
<?php
if (isset($_POST['login'])) {
    $user = new LoginUser($_POST['username'], $_POST['password']);
}

include_once('layout/head.php');
?>


<div class="container mx-auto">
    <div class="mb-3 mx-5">
        <form method="post" action="" enctype="multipart/form-data" autocomplete="off">
        <div class="card mx-5">   
        <div class="card-body mx-5">
        <h2 class="card-title"Login</h2>
            <label for="Username" class="form-label">Username</label>
            <input type="text" class="form-control" name="username" placeholder="Username"required>
            <label for="Password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Password" required>
            <button type="submit" name="login" class="btn btn-primary mt-2">Login</button>
        </div>
        </form>
        <div >
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>