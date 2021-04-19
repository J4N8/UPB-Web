<?php
include 'classes/Database.php';

$dataPoints = array();

$products = Database::selectProductCount();
$x = 0;
foreach ($products as $product) {
    $dataPoints[$x] = array("x" => $x + 10, "y" => $product[1], "indexLabel" => $product[0]);
    $x++;
}
?>

<!DOCTYPE html>
<html>
<head>
    <?php
    include 'head.php';
    ?>

    <script type="text/javascript" src="canvasjs.min.js"></script>
    <script type="text/javascript">
        window.onload = function () {
            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                exportEnabled: false,
                theme: "light1", // "light1", "light2", "dark1", "dark2"
                title: {
                    text: "Products count in each category"
                },
                axisY: {
                    includeZero: true
                },
                data: [{
                    type: "column", //change type to bar, line, area, pie, etc
                    //indexLabel: "{y}", //Shows y value on all Data Points
                    indexLabelFontColor: "#5A5757",
                    indexLabelPlacement: "inside",
                    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart.render();

        }
    </script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
</body>
</html>