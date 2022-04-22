<?= $this->extend('base') ?>

<?= $this->section('content') ?>
<div class="container mt-5" >
    <div class="row mb-4">
        <div class="col-12">
            <h5 class="mb-4"style="margin-top:20px">Todo List</h5>
            <?php if(session()->getFlashdata('errors')) { ?>
                <div class="alert alert-danger">
                    <?= session()->getFlashdata('errors') ?>
                </div>
            <?php } ?>
            <form action="/todo/<?= $data['id'] ?>/update" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $data['id'] ?>" />
            <input type="hidden" name="_method" value="put" />
            <input type="hidden" name="potolama" value="<?= $data['photo'] ?>"/>
    <div class="row mt-5 ">
        <div class="col-6 col-sm-6">
            <label for="title">Title</label>
            <input type="text" id="title" class="form-control" placeholder="Input Title" name="title" value="<?= (old('title')) ? old('title') : $data['title'] ?>" />       
        </div>
        <div class="col-6 col-sm-6" >
            <label for="description">Description</label>
            <br />
            <input type="text" id="description" class="form-control" placeholder="Input description" name="description" value="<?= (old('description')) ? old('description') : $data['description'] ?>" />

        </div>
        <div class="col-6 col-sm-6">
            <label for="finished_at">Finished at</label>
            <br />
            <input type="date" id="finished_at" class="form-control" placeholder="Input date" name="finished_at" value="<?= (old('finished_at')) ? old('finished_at') : $data['finished_at'] ?>" />
        </div>
        <div class="col-6 col-sm-6">
            <label for="photo">Photo</label>
            <br />
            <input type="file" id="photo" class="form-control"placeholder="Input photo" name="photo" />
        </div>
        <div class="col-6 col-sm-6" style="padding-top:10px">
        <button type="submit" class="btn btn-primary text-white ">Submit</button>
        </div>
    </div>
    </form>
    </div>
    </div>
</div>
<?= $this->endSection() ?>
