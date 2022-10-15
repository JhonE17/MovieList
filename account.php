<?php require_once("controllers/movies.class.php");
     require_once("controllers/json.class.php");
     include("helpers/redirect.php")?>
<?php
session_start();

if (isset($_GET['s']) && $_GET['apiKey']) {
    $user = new Movies($_GET['s'], $_GET['apiKey']);
}
$db = new Json();
$movies = $db->getRows();

if (!isset($_SESSION['user'])) {
    header("location:" . url_base . "index.php");
    exit();
}
if (isset($_GET['logout'])) {
    unset($_SESSION['user']);
    header("location:" . url_base . "index.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie List</title>
</head>

<body>
<div>
        <nav class="nav">
            <li class="nav-item">
                <a class="nav-link fs-4 " href="?logout">Log out</a>
            </li>
        </nav>
    </div>
    <h2 class="text-center">Beinvenido...</h2>
    <div class="position-absolute end-0">
        <a href="account.php?s=piece&apiKey=fc59da33" class="btn btn-danger">Update List Movie</a>
    </div>
<div class="row g-3 mt-3 mx-2">
    <div class="d-inline-flex p-3">
        <div class="d-inline-flex p-3">
            <label class="form-label" for="Search Title">Search Title</label>
            <input class="form-control" autocomplete="off" type="search" name="search">
        </div>
        <div class="d-inline-flex p-3">
            <label class="form-label" for="Date range">Date range</label>
            <input class="form-control" autocomplete="on" type="text" placeholder="1998" name="rangeMin">
            <input class="form-control" autocomplete="on" type="text" placeholder="2022" name="rangeMax">
        </div>
        <div class="d-inline-flex p-3">
            <label class="form-label" for="Sort By">Sort By</label>
            <select class="form-control" autocomplete="off"  name="order">
                <option value="">asc</option>
                <option value="">desc</option>
                <option value="">title</option>
                <option value="">date</option>
            </select>
        </div>
    </div>
    <div class="row">
        <table class="table table-bordered mx-2 mb-4">
            <thead class="thead-dark">
                <tr>
                <th  scope="col">Title</th>
                <th  scope="col">Year</th>
                <th  scope="col">Type</th>
                <th  scope="col">Poster</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($movies)){ $count =0; foreach($movies as $row){$count ++;?>
                    <tr>
                        <td><?php echo $row['Title'] ?></td>
                        <td><?php echo $row['Year'] ?></td>
                        <td><?php echo $row['Type'] ?></td>
                        <td><?php echo "<img src='".$row['Poster']."' class='rounded' style='width: 150px; height: 200px' alt='".$row['Title']."'>" ?></td>
                    </tr>
                <?php }}?>
            </tbody>
        </table>
    </div>
</div>

</body>

</html>