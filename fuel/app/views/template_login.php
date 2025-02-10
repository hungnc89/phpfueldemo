<!DOCTYPE html>
<html lang="en">
<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>CoreUI Free Bootstrap Admin Template</title>
    <!-- Main styles for this application-->
    <!-- Vendors styles-->
	<?php
	echo Asset::css([
		'/style.css'
	]);
	?>
</head>
<body>
<div class="bg-body-tertiary min-vh-100 d-flex flex-row align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <?php echo $content ?>
        </div>
    </div>
</div>
</body>
</html>