<?php
require 'Product.php';

class Database
{
    static function connection(){
        return pg_connect("host=ec2-54-74-35-87.eu-west-1.compute.amazonaws.com dbname=d6i76trh3o2h8i user=nrsatjxkiinfpe password=5241c9c1347855efed23a3c192f8a2f9f9c898c02b5dd94a355670782a5a752c");
    }

    //Returns all products as array
    static function selectAllProducts(){
        $products = array();
        $result = pg_query(self::connection(), "SELECT name, description, price, image FROM products;");
        //Loop through query results
        $x = 0;
        while ($row = pg_fetch_row($result)){
            $product = new Product($row[0], $row[1], $row[2]);
            $products[$x] = $product;
            $x++;
            }
        pg_close();
        return $products;
    }
}