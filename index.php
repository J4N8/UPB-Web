<!DOCTYPE html>
<html>
<body>

<?php
require_once 'classes/Database.php';

$products = Database::selectAllProducts();
foreach ($products as $product){
    echo '<br>';
    echo '<p>'.$product.'</p>';
}
echo 'end';
?>

</body>
</html>