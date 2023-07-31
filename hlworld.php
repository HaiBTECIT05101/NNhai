<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Hello World</title>
</head>
<body>
    <?php
    // Tạo biến chứa chuỗi "Hello"
    $hello = "Hello";

    // Tạo biến chứa chuỗi "WEB2013"
    $webClass = "WEB2013";

    // Ghép chuỗi
    $fullSentence = $hello . " world, I'm " . $webClass . " - Lập trình PHP1";
    ?>

    <h2>
        <strong><?php echo $hello; ?></strong> world, I'm <font size="50" color="blue"><?php echo $webClass; ?></font> - Lập trình PHP1
    </h2>

    <p>
        <?php echo $fullSentence; ?>
    </p>
</body>
</html>
