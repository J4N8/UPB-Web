<!DOCTYPE html>
<html>
<head>
    <?php
    include 'head.php';
    ?>
</head>
<body>
<?php //List all products in table
echo '<table border="1px">';
echo '<tr>';
echo '<th>Product name: </th>';
echo '<th>Count: </th>';
echo '</tr>';
$products = Database::selectBoughtProducts();
foreach ($products as $product){
    $product = explode(" ; ", $product);
    echo '<tr>';
    echo '<th>'.$product[0].'</th>';
    echo '<th>'.$product[1].'</th>';
    echo '</tr>';
}
echo '</table>';
?>
</body>
</html>