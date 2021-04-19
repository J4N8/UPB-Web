<!DOCTYPE html>
<html>
<head>
    <?php
    include "head.php";
    ?>
</head>
<body>
<?php //List all products in table
echo '<table border="1px">';
echo '<tr>';
echo '<th>Name: </th>';
echo '<th>Products: </th>';
echo '</tr>';
$stats = Database::selectCategoryStats();
foreach ($stats as $stat){
    $stat = explode(" ; ", $stat);
    echo '<tr>';
    echo '<th>'.$stat[0].'</th>';
    echo '<th>'.$stat[1].'</th>';
    echo '</tr>';
}
echo '</table>';
?>
</body>
</html>