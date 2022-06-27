<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="style1.css" type="text/css">
    <?php include("sort.php"); ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Student Data</title>
</head>

<body>
    <div class="container">
        <h1>Student Data</h1>
        <form class="" action="index.php" method="POST">
            <div class="">
                <div class="input-group w-lg-50 w-md-50 mb-3">
                    <div class="btn-group me-3">
                        <input type="radio" class="btn-check" name="data" value="file" id="btnradio1">
                        <label class="btn btn-outline-dark" for="btnradio1">file</label>

                        <input type="radio" class="btn-check" name="data" value="random" id="btnradio2" >
                        <label class="btn btn-outline-dark" for="btnradio2">random</label>
                    </div>
                    <select class="form-select" name="sort" id="sort" required>
                        <option selected>Choose type of Sort</option>
                        <option value="ageDesc">sort by age (desc)</option>
                        <option value="ageAsc">sort by age (asc)</option>
                        <option value="nameDesc">sort by school (desc)</option>
                        <option value="nameAsc">sort by school (asc)</option>
                    </select>
                    <button class="btn btn-dark text-light" value="" type="submit">Sort</button>
                </div>
            </div>
        </form>
        <?php foreach($warning as $w): ?>
        <div class="bg-warning bg-opacity-25 fw-bold text-center mb-2">
        <?php echo $w; ?>
        </div>
        <?php endforeach; ?>
        <table class="dataTbl table table-hover rounded-pill table-striped">
            <thead class="table-dark" scope="col">
                <tr class="">
                    <th class="">numer</th>
                    <th class="">Name</th>
                    <th class="">Age</th>
                    <th class="">School</th>
                </tr>
            </thead>
            <tbody class="">
                <?php
                if(isset($_POST['data']) && !empty($_POST['sort']))
                    $num = 1;
                    foreach ($data as $d) {
                        echo "<tr>";
                        echo "<td>" . $num . "</td>";
                        echo "<td>" . $d["name"] . "</td>";
                        echo "<td>" . $d["age"] . "</td>";
                        echo "<td>" . $d["school"] . "</td>";
                        $num++;
                        echo "</tr>";
                    }                
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>