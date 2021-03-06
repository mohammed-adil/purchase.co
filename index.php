<?php 
    session_start();
    include("config/db.php");

    include("include/header.php");
?>
    <div class="container" id="home">
        <h1 style="text-align: center;">List of all the Products</h1>
        <div class="cards" id="data">
            <?php
                $sql = "SELECT * FROM products";
                $result = mysqli_query($conn, $sql) or die('Error');
                
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $product_id = $row['product_id'];
                        $product_name = $row['product_name'];
                        $product_img_name = $row['product_img_name'];
                        $quantity = $row['quantity'];
                        $price = $row['price'];
            ?>
                        <div class="card">
                            <img src="./products/<?php echo $product_img_name ?>" alt="<?php echo $product_img_name ?>">
                            <h4><?php echo $product_name ?></h4>
                            <h5><?php echo $price ?></h5>
                            <?php if($quantity > 0): ?>
                                <a href="update-cart.php?action=add&id=<?php echo $product_id ?>" class="link-btn">Add to cart</a>
                            <?php else: ?>
                                <a class="link-btn" href="#" style="pointer-events: none; background: #eee !important; color: #000 !important;">Out of stock</a>
                            <?php endif ?>
                        </div>
            <?php            
                    }
                
            ?>
        </div>
            <?php 
                }
                else {
                    $error = 'No Products found';
            ?>
        <div class="alert" style="text-align:center">
            <?php 
                    echo $error;
                }
            ?>
        </div>
    </div>
<?php 
    include("include/footer.php");
?>
