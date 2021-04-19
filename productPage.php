<?php
$dataPoints = array(
    array("x" => 10, "y" => 41),
    array("x" => 20, "y" => 35, "indexLabel" => "Lowest"),
    array("x" => 30, "y" => 50),
    array("x" => 40, "y" => 45),
    array("x" => 50, "y" => 52),
    array("x" => 60, "y" => 68),
    array("x" => 70, "y" => 38),
    array("x" => 80, "y" => 71, "indexLabel" => "Highest"),
    array("x" => 90, "y" => 52),
    array("x" => 100, "y" => 60),
    array("x" => 110, "y" => 36),
    array("x" => 120, "y" => 49),
    array("x" => 130, "y" => 41)
);
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
                    text: "Products"
                },
                axisY: {
                    includeZero: true
                },
                data: [{
                    type: "column", //change type to bar, line, area, pie, etc
                    //indexLabel: "{y}", //Shows y value on all Data Points
                    indexLabelFontColor: "#5A5757",
                    indexLabelPlacement: "outside",
                    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart.render();

        }
    </script>
</head>
<body>

<div id="chartContainer" style="height: 370px; width: 100%;"></div>

<!----->

<?php //List all products in table
echo '<table border="1px">';
echo '<tr>';
echo '<th>Name: </th>';
echo '<th>Description: </th>';
echo '<th>Price: </th>';
echo '</tr>';
$products = Database::selectAllProducts();
foreach ($products as $product) {
    $product = explode(" ; ", $product);
    echo '<tr>';
    echo '<th>' . $product[0] . '</th>';
    echo '<th>' . $product[1] . '</th>';
    echo '<th>' . $product[2] . "€" . '</th>';
    echo '</tr>';
}
echo '</table>';
?>


</body>
</html>