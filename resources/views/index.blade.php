<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>List Products</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<h2>Danh sách sản phẩm</h2>
	<p><a href="viewCart">Xem giỏ hàng</a></p>
	<?php foreach ($info as $value): ?>
		<h3>Tên sách:{{ $value->name }}</h3>
		<p>Còn trong kho:{{ $value->instock }}</p>
		<a href="insertCart/{{ $value->id }}">AddtoCart</a>
	<?php endforeach ?>
</body>
</html>