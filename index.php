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
    echo '<th>'.$product[0].'</th>';
    echo '<th>'.$product[1].'</th>';
    echo '<th>'.$product[2]."€".'</th>';
    echo '</tr>';
}
echo '</table>';
?>


</body>
</html>