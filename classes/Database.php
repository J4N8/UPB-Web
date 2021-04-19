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

    static function selectCategoryStats(){
        $statsList = array();
        $result = pg_query(self::connection(), "SELECT c.name, COUNT(p.id) FROM products p INNER JOIN categories c ON p.category_id = c.id GROUP BY c.name;");
        //Loop through query results
        $x = 0;
        while ($row = pg_fetch_row($result)){

            $stats = $row[0]." ; ".$row[1];
            $statsList[$x] = $stats;
            $x++;
        }
        pg_close();
        return $statsList;
    }

    static function selectBoughtProducts(){
        $List = array();
        $result = pg_query(self::connection(), "SELECT p.name, COUNT(sc.id) FROM products p INNER JOIN \"shoppingCarts\" sC on p.id = sC.product_id WHERE bought = TRUE GROUP BY p.name;");
        //Loop through query results
        $x = 0;
        while ($row = pg_fetch_row($result)) {
            $item = $row[0] . " ; " . $row[1];
            $List[$x] = $item;
            $x++;
        }
        pg_close();
        return $List;
    }

    //Returns all products as array
    static function selectProductCount()
    {
        $products = array();
        $result = pg_query(self::connection(), "SELECT name, product_count FROM categories GROUP BY name, product_count;");
        //Loop through query results
        $x = 0;
        while ($row = pg_fetch_row($result)) {
            $product = array($row[0], $row[1]);
            $products[$x] = $product;
            $x++;
        }
        pg_close();
        return $products;
    }
}