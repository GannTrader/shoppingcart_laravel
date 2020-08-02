<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>View Cart</title>
	<link rel="stylesheet" href="">
	<style>
		tr, th, td {
			border: 1px solid black;
			padding: 5px;
		}
	</style>
</head>
<body>
	<form action="{{ route('updateCart') }}" method="get">
	@csrf
	<table>
		<tr>
			<th>STT</th>
			<th>Tên sản phẩm</th>
			<th>Đã cho vào giỏ</th>
			<th>Còn trong kho</th>
			<th>Giá</th>
			<th>Thành tiền</th>
			<th>Xóa</th>
		</tr>

		<?php $stt = 1; $total = 0; ?>
		@if ($info)
		<?php foreach ($info as $value): ?>
			@if (array_key_exists('slg', $value))
				<tr>
					<td>{{ $stt }}</td>
					<td>{{ $value->name }}</td>
					<td><input type="number" min="1" max="{{ $value->instock }}" name="slg[{{ $value->id  }}]" value="{{ $value->slg }}"></td>
					<td>{{ $value->instock }}</td>
					<td>{{ $value->price *1000 }}</td>
					<td>{{ $value->price * $value->slg *1000 }}</td>
					<td><a href="deleteCart/{{ $value->id }}">Xóa</a></td>
				</tr>
				<?php $stt++; $total = $total + $value->price * $value->slg; ?>
			@endif
		<?php endforeach ?>

		@else
			<h4>Gio hang cua ban chua co gi</h4>
		@endif
		
		<tr>
			<td></td>
			<td></td>
			<td><input type="submit" value="Cập nhật lại giỏ hàng"></td>
			<td></td>
			<td></td>
			<td>
				{{ $total*1000 }}
			</td>
			<td></td>
		</tr>
	</table>
	<h3><a href="index">Tôi muốn mua thêm sản phẩm</a></h3>
	</form>
</body>
</html>