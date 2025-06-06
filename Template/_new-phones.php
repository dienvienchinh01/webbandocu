<!-- New Phones -->
<?php
$user_id = $_SESSION['user_id'] ?? 1;

// Thêm vào giỏ
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if (isset($_POST['new_phones_submit'])){
            if ($user_id == 1) {
                header('Location: login.php');
            } else {
                // call method addToCart
                $Cart->addToCart($_POST['user_id'], $_POST['item_id']);
            }
        }
    }

$select_product =  mysqli_query($conn, "SELECT * FROM `products` order by item_id desc limit 15") or die('Query failed');
$selectProducts = mysqli_fetch_all($select_product, MYSQLI_ASSOC);
?>
<section id="new-phones">
    <div class="container">
        <h4 class="font-rubik font-size-20">New Products</h4>
        <hr>

        <!-- owl carousel -->
        <div class="owl-carousel owl-theme">
            <?php foreach ($selectProducts as $item) { ?>
                <div class="item py-2 bg-light ml-2">
                    <div class="product font-rale">
                        <a href="<?php printf('%s?item_id=%s', 'product.php',  $item['item_id']); ?>"><img src="./assets/products/<?php echo $item['item_image'] ?? "./assets/products/1.png"; ?>" alt="product1" class="img-fluid"></a>
                        <div class="text-center">
                            <h6 style="min-height: 39px;"><?php echo  $item['item_name'] ?? "Unknown";  ?></h6>
                            <!-- <div class="rating text-warning font-size-12">
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="far fa-star"></i></span>
                            </div> -->
                            <div class="price py-2">
                                <?php echo number_format($item['item_price'], 0, ',', '.'); ?> đ
                            </div>
                            <form method="post">
                                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '1'; ?>">
                                <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
                                <?php
                                if (in_array($item['item_id'], $Cart->getCartId($product->getData('cart')) ?? [])){
                                    echo '<button type="submit" disabled class="btn btn-success font-size-12">Đã có trong giỏ</button>';
                                }else{
                                    echo '<button type="submit" name="top_sale_submit" class="btn btn-warning font-size-12">Thêm vào giỏ</button>';
                                }
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
            <?php } // closing foreach function ?>
        </div>
        <!-- !owl carousel -->

    </div>
</section>
<!-- !New Phones -->