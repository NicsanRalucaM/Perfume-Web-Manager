<?php


include_once '../API/Config/database.php';
$database = new Database();

$db = $database->getConnection();


$fusers = fopen('php://memory', 'w');

fputcsv($fusers,array('Users'));

$query = $db->prepare("SELECT * FROM users");
$query->execute();
fputcsv($fusers, array('ID', 'First Name', 'Last Name', 'email'));
while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    fputcsv($fusers,array($row['id'],$row['firstname'],$row['lastname'],$row['email']));
}

fputcsv($fusers,array(''));
fputcsv($fusers,array('Products'));

$query = $db->prepare("SELECT * FROM products");
$query->execute();

fputcsv($fusers, array('ID', 'Name', 'Description', 'Price','Ingredient1','Ingredient2','Ingredient3','Ingredient4','Image','BrandID','Gen','Anotimp'));
while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    fputcsv($fusers,array($row['id'],$row['name'],$row['description'],$row['price'],$row['ingredient1'],$row['ingredient2'],$row['ingredient3'],$row['ingredient4'],$row['image_1'],$row['brand_id'],$row['gen'],$row['anotimp']));
}

fputcsv($fusers,array(''));
fputcsv($fusers,array('Carts'));
$query = $db->prepare("SELECT * FROM carts");
$query->execute();
fputcsv($fusers, array('ID', 'User', 'Product', 'Price'));
while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    fputcsv($fusers,array($row['id'],$row['user'],$row['product'],$row['price']));
}

fputcsv($fusers,array(''));
fputcsv($fusers,array('Favorites'));
$query = $db->prepare("SELECT * FROM favorites");
$query->execute();
fputcsv($fusers, array('ID', 'User', 'Product'));
while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    fputcsv($fusers,array($row['id'],$row['user'],$row['product']));
}

fputcsv($fusers,array(''));
fputcsv($fusers,array('Comments'));
$query = $db->prepare("SELECT * FROM comments");
$query->execute();
fputcsv($fusers, array('ID', 'Product', 'Comment','Name'));
while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    fputcsv($fusers,array($row['id'],$row['product'],$row['comment'],$row['name']));
}

fputcsv($fusers,array(''));
fputcsv($fusers,array('Brands'));
$query = $db->prepare("SELECT * FROM brands");
$query->execute();
fputcsv($fusers, array('ID', 'Name'));
while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    fputcsv($fusers,array($row['id'],$row['name']));
}

fputcsv($fusers,array(''));
fputcsv($fusers,array('Addresses'));
$query = $db->prepare("SELECT * FROM addresses");
$query->execute();
fputcsv($fusers, array('ID', 'User', 'Address', 'City','State','Zip','Time'));
while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    fputcsv($fusers,array($row['id'],$row['user'],$row['address'],$row['city'],$row['state'],$row['zip'],$row['time']));
}

fputcsv($fusers,array(''));
fputcsv($fusers,array('Orders'));
$query = $db->prepare("SELECT * FROM orders");
$query->execute();
fputcsv($fusers, array('ID', 'User', 'Address', 'Product1','Product2','Product3','Product4','product5','Product6','Product7','Product8','Product9','Product10','Price','Name','Email'));
while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    fputcsv($fusers,array($row['id'],$row['user'],$row['address'],$row['product1'],$row['product2'],$row['product3'],$row['product4'],$row['product5'],$row['product6'],$row['product7'],$row['product8'],$row['product9'],$row['product10'],$row['price'],$row['name'],$row['email']));
}
fseek($fusers,0);
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="raport.csv";');
fpassthru($fusers);

exit;
?>