<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>PerMvibes</title>
    <link rel="stylesheet" href="topbar.css">
    <link rel="stylesheet" href="products.css">
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="news.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

</head>

<body>
<div class="bar">
    <div class="navbar">
        <div class="logo">
            <img src="imagesLogo/logo.png" alt="logo">
        </div>

        <div class="wrapper">
            <div class="searchBar">
                <input id="searchQueryInput" type="text" name="searchQueryInput" placeholder="Search" value=""/>
                <button id="searchQuerySubmit" type="submit" name="searchQuerySubmit">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>
        <div class="col">
            <nav>
                <input type="checkbox" id="check">
                <label for="check" class="checkbtn">
                    <i class="fas fa-bars"></i>
                </label>
                <ul>
                    <li><a class="active" href="news.html"><i class="fa fa-fw fa-home"></i> Home</a></li>
                    <li><a href="#"><i class="fa fa-fw fa-user"></i>My Account</a></li>
                    <li><a href="#"><i class="fa fa-fw fa-shopping-bag"></i> </a></li>
                    <li><a href="#"><i class="fa fa-fw fa-heart"></i> Wishs </a></li>
                    <li><a href="login.html">Login<i class="fas fa-sign-in-alt"></i></a></li>
                    <li><a href="help.html"><i class="fa fa-question-circle" aria-hidden="true"></i></a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>

<div class="topbar">
    <div class="row">
        <div class="column"><a  href="news.html"><b>NEWS</b></a></div>
        <div class="column"><a class="active" href="products.php" onload="dataFunction()"><b>PERFUMES</b></a></div>
        <div class="column"><a href="#"><b>BRANDS</b></a></div>
        <div class="column"><a href="#"><b>COLLECTIONS</b></a></div>
        <div class="column"><a href="about.html"> <b>ABOUT</b></a></div>
    </div>
</div>

<div class="box-container">

    <?php
    include_once 'config.php';

    $database = new Database();
    $conn = $database->getConnection();
    $select_products = $conn->prepare("SELECT * FROM `products`");
    $select_products->execute();
    if($select_products->rowCount() > 0){
        while($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)){
            ?>
            <form action="" method="post" class="box">
                <input type="hidden" name="pid" value="<?= $fetch_product['id']; ?>">
                <input type="hidden" name="name" value="<?= $fetch_product['name']; ?>">
                <input type="hidden" name="price" value="<?= $fetch_product['price']; ?>">
                <input type="hidden" name="image" value="<?= $fetch_product['image_1']; ?>">
                <button class="fas fa-heart" type="submit" name="add_to_wishlist" onclick="addWish(<?= $fetch_product['id']; ?>)"></button>
                <a href="http://localhost:63342/Perfume-Web-Manager/PerMvar1/product.html?id=<?= $fetch_product['id']; ?>" class="fas fa-eye"></a>
                <img src="imagesProduct/<?= $fetch_product['image_1']; ?>" alt="">
                <div class="flex">
                    <div class="name"><b><?= $fetch_product['name']; ?></b></div>
                    <div class="price"><span><b>$</b></span><b><?= $fetch_product['price']; ?></b></div>
                </div>
                <input type="submit" value="Add to cart" class="btn" name="add_to_cart" onclick="addProduct(<?= $fetch_product['id']; ?>)">
            </form>
            <?php
        }
    }else{
        echo '<p class="empty">no products found!</p>';
    }
    ?>

</div>

<script>
    function addProduct(id){
        var xhr = new XMLHttpRequest();
        xhr.withCredentials = true;
        var a;
        xhr.addEventListener("readystatechange", function () {
            if (this.readyState === 4) {
                {

                }
            }
        });


        xhr.open("GET", "http://localhost:63342/Perfume-Web-Manager/API/Cart/addToCart.php?product=" +id);
        xhr.setRequestHeader("Content-Type", "application/json");

        xhr.send();

    }
    function addWish(id){
        var xhr = new XMLHttpRequest();
        xhr.withCredentials = true;
        var a;
        xhr.addEventListener("readystatechange", function () {
            if (this.readyState === 4) {
                {

                }
            }
        });


        xhr.open("GET", "http://localhost:63342/Perfume-Web-Manager/API/Fav/addToFav.php?product=" +id);
        xhr.setRequestHeader("Content-Type", "application/json");

        xhr.send();
    }

</script>
</body>

</html>