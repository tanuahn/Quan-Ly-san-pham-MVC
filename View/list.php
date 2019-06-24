<h2>Danh sách sản phẩm</h2>
<a href="?page=add">Thêm mới</a>
<table class="table">
    <thead>
    <tr>
        <th>STT</th>
        <th>Name</th>
        <th>Price</th>
        <th>Status</th>
        <th>Producer</th>
        <th></th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($products as $key => $product): ?>
    <tr>
        <td><?php echo ++$key ?></td>
        <td><?php echo $product->name ?></td>
        <td><?php echo $product->price ?></td>
        <td><?php echo $product->status ?><td>
        <td><?php echo $product->producer ?><td>
        <td> <a href="./index.php?page=delete&id=<?php echo $product->id; ?>" class="btn btn-warning btn-sm">Delete</a></td>
        <td> <a href="./index.php?page=edit&id=<?php echo $product->id; ?>" class="btn btn-sm">Update</a></td>

        <?php endforeach; ?>
    </tbody>
</table>