<?php
$dataType =  $sort = "";
$warning = $data = $age = $name = array();

// echo "<pre>";
// var_dump($data);
// echo "</pre>";
//$num=count($data);

function ageAsc($data)
{
    // foreach ($data as $key => $value) {
    //     $age[$key] = $value["age"];     ///$key = index of $data        
    // }
    array_multisort(array_column($data, 'age'), SORT_ASC, $data);
    return $data;
}

function ageDesc($data)
{
    // foreach ($data as $key => $value) {
    //     $age[$key] = $value["age"];
    // }
    array_multisort(array_column($data, 'age'), SORT_DESC, $data);
    // echo "<pre>";
    // var_dump($data);
    // echo "</pre>";
    return $data;
}

function schoolNameAsc($data)
{
    // foreach ($data as $key => $value) {
    //     $name[$key] = $value["school"];
    // }
    array_multisort(array_column($data, 'school'), SORT_ASC, $data);
    return $data;
}

function schoolNameDesc($data)
{
    // foreach ($data as $key => $value) {
    //     $name[$key] = $value["school"];
    // }
    array_multisort(array_column($data, 'school'), SORT_DESC, $data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['data']) || !($_POST['data'])) {
        // var_dump($_POST);
        $warning[] = "Select type of data";
    } else {
        if ($_POST['data'] == 'random') {            
            $data = makeData();
        } elseif ($_POST['data'] == 'file') {
            $jsonData = file_get_contents("data.json");
            $data = json_decode($jsonData, true);
        }
        if (!empty($_POST["sort"]) && !empty($_POST["data"])) {
            $sort = $_POST["sort"];
            $dataType = $_POST['data'];
            switch ($sort) {
                case "ageAsc":
                    $data = ageAsc($data);             //sort by age ascending
                    break;
                case "ageDesc":
                    $data = ageDesc($data);            //sort by age descending
                    break;
                case "nameAsc":
                    $data = schoolNameAsc($data);      //sort by school name ascending
                    break;
                case "nameDesc":
                    $data = schoolNameDesc($data);     //sort by school name descending
                    break;
                default:
                    $warning[] = "choose type of sort!";
                    break;
            }
        }
    }
}

function makeData()
{
    //random data
    function randName($number)
    {
        $randName = "";
        $string = "abcdefghijklmnopqrstuvwxyz";
        for ($i = 0; $i < $number; $i++) {
            $index = rand(0, strlen($string) - 1);
            $randName .= $string[$index];
        }
        return $randName;
    }

    for ($i = 0; $i < 100; $i++) {
        $n = rand(3, 10);
        $data[] = array("age" => rand(10, 20), "name" => randName($n), "school" => randName($n));
    }
    return $data;
}
