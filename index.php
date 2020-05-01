<?php
//fetch covid data from external API reference:  URL:  https://api.covid19api.com/summary
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//submit the request to  the API endpoint.
$covidDataJSONString = file_get_contents('https://api.covid19api.com/summary');
//convert the response to a PHP object.
$covidDataObject = json_decode($covidDataJSONString);

//conver the object into data and array
$covidDataGlobal = $covidDataObject->Global;
$covidData = $covidDataObject->Countries;  

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>External API php test</title>
</head>

<body>
    <h1>External API php test- for COVID data</h1>
    <h2>Covid Data Global / CountryWise</h2>
    <dl>
        <dd>Global : </dd>
        <dd>Total Confirmed Cases: <?php echo $covidDataGlobal->TotalConfirmed; ?></dd>
        <dd>Total Recovered Cases: <?php echo $covidDataGlobal->TotalRecovered; ?></dd>
    </dl>

    <?php foreach ($covidData as $i) { ?>
        <dl>
            <dd>Country: <?php echo $i->Country; ?></dd>
            <dd>Total Confirmed Cases: <?php echo $i->TotalConfirmed; ?></dd>
            <dd>Total Recovered Cases: <?php echo $i->TotalRecovered; ?></dd>
        </dl>
    <?php  } ?>
</body>
</html>