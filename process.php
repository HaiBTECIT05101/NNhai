<?php
// Xử lý các yêu cầu từ trang web
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Xử lý logic đăng nhập, thêm vào giỏ hàng, v.v.
}
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Kiểm tra xem nút thanh toán đã được nhấp hay chưa
    if (isset($_POST["checkout"])) {
        // Xử lý logic thanh toán sản phẩm
        $productId = $_POST["productId"];
        echo "Đã thanh toán sản phẩm " . $productId;
    }
}
?>

