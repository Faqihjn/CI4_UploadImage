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
                    <td>Title</td>
                    <td>Description</td>
                    <td>Finished at</td>
                    <td>Action</td>
                    <td>Status</td>
                </tr>
            </thead>
            <tbody>
                <a href="/todo/new" class="btn btn-primary text-white ">Add new list</a>
                <br />
                <br />
                <?php $no = 0; ?>
                <?php foreach ($products as $item): ?>
            <tr>
                <td><?= $no += 1; ?></td>
                <td><?= $item['title'] ?></td>
                <td><?= $item['description'] ?></td>
                <td><?= $item['finished_at'] ?></td>
                <td>
                    <a href="/todo/<?= $item['id'] ?>/edit" class="btn btn-info text-white "><i class='bx bx-pencil'></i></a>
                    <form action= "/todo/<?= $item['id'] ?>" method="post" onsubmit="return confirm('Are you sure?')" >
                        <input type="hidden" name="_method" value="delete" />
                        <button type="submit" class="btn btn-danger text-white "> <i class='bx bx-trash'></i> </button>
                    </form>
                </td>
                <td>
                    <a href="/todo/<?= $item['id'] ?>/finish" class="btn btn-success text-white" style="height:auto"><?= $item['status'] ?></a>
                </td>
            </tr>

        <?php endforeach ?>
        </tbody>
    </table>
    </div>
    </div>
</div>
<?= $this->endSection() ?>




 