<?php
require_once 'classes/Database.php';
require_once 'classes/Product.php';
?>

<!DOCTYPE html>
<html>
<body>

<?php //List all products in table
echo '<table border="1px">';
echo '<tr>';
echo '<th>Name: </th>';
echo '<th>Description: </th>';
echo '<th>Price: </th>';
echo '</tr>';
$products = Database::selectAllProducts();
foreach ($products as $product){
    $product = explode(" ; ", $product);
    echo '<tr>';
    echo '<th>';
    echo $product[0];
    echo '</th>';
    echo '<th>';
    echo $product[1];
    echo '</th>';
    echo '<th>';
    echo $product[2]."€";
    echo '</th>';
    echo '</tr>';
}
echo '</table>';
?>


</body>
</html>