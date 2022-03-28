<?= $this->extend('base') ?>

<?= $this->section('content') ?>
<div class="container mt-5" >
    <div class="row mb-4">
        <div class="col-12">
            <h5 class="mb-4"style="margin-top:20px">Todo List</h5>    
        <table class="table table-hover ">
            <thead>
                <tr>
                    <td>No.</td>
                    <td>Name</td>
                    <td>Stock</td>
                    <td>Price</td>
                    <td>Category</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                <a href="/product/new" class="btn btn-primary text-white ">Add new product</a>
                <br />
                <br />
                <?php $no = 0; ?>
                <?php foreach ($products as $item): ?>
            <tr>
                <td><?= $no += 1; ?></td>
                <td><?= $item['name'] ?></td>
                <td><?= $item['stock'] ?></td>
                <td><?= $item['price'] ?></td>
                <td><?= $item['category'] ?></td>
                <td>
                    <a href="/product/<?= $item['id'] ?>/edit" class="btn btn-info text-white "><i class='bx bx-pencil'></i></a>
                    <form action= "/product/<?= $item['id'] ?>" method="post" onsubmit="return confirm('Are you sure?')" >
                        <input type="hidden" name="_method" value="delete" />
                        <button type="submit" class="btn btn-danger text-white "> <i class='bx bx-trash'></i> </button>
                    </form>
                </td>
            </tr>

        <?php endforeach ?>
        </tbody>
    </table>
    </div>
    </div>
</div>
<?= $this->endSection() ?>




 