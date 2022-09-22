<?php
include '../component/sidebar.php';
$id = $_GET['id']; // get id through query string

$qry = mysqli_query($con,"select * from movies where id='$id'"); // select query

$data = mysqli_fetch_assoc($qry); // fetch data
$nameMovies = $data["name"];
$_SESSION['genreMovies'] =$data["genre"];
$realeseMovies = $data["realese"];
$seasonMovies = $data["season"];

?>

<div class="container p-3 m-4 h-100"
    style="background-color: #FFFFFF; border-top: 5px solid #17337A; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
    <h4>Edit Movies</h4>
    <hr>
    <form action="../process/updateMoviesProcess.php?id=<?php echo $id; ?>" method="post">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input class="form-control" id="name" name="name"
                value="<?php echo (isset($nameMovies)) ? $nameMovies: ''?>" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Genre</label>
            <select class="form-select" aria-label="Default select example" name="genre" id="genre">
                <?php
                    $array = array("Galau", "Senang", "Bahagia");
                    session_start();
                    $genreSelect = $_SESSION['genreMovies'];
                    foreach($array as $value=>$name)
                    {
                        if($name == $genreSelect)
                        {
                            echo "<option selected value='".$name."'>".$name."</option>";
                        }
                        else
                        {
                            echo "<option value='".$name."'>".$name."</option>";
                        }
                    }
                ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Realese</label>
            <input class="form-control" id="realese" name="realese"
                value="<?php echo (isset($realeseMovies)) ? $realeseMovies: ''?>" aria-describedby="emailHelp">
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Season</label>
            <input class="form-control" id="season" name="season"
                value=" <?php echo (isset($seasonMovies)) ? $seasonMovies: ''?>" aria-describedby="emailHelp">
        </div>

        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary" name="update">Edit Movies</button>
        </div>
    </form>
</div>
</aside>
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-
MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>