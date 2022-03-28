<?= $this->extend('base') ?>

<?= $this->section('content') ?>
<div class="container mt-5" >
    <div class="row mb-4">
        <div class="col-12">
            <h5 class="mb-4"style="margin-top:20px">Todo List</h5>
            <form action="/product/<?= $data['id'] ?>/update" method="post">
            <input type="hidden" name="_method" value="put" />
    <div class="row mt-5 ">
        <div class="col-6 col-sm-6">
            <label for="product">Product Name</label>
            <input type="text" id="name" class="form-control" placeholder="Input product name" name="name" value="<?= $data['name'] ?>" />       
        </div>
        <div class="col-6 col-sm-6" >
            <label for="stock">Stock</label>
            <br />
            <input type="number" min="1" id="stock" class="form-control" placeholder="Input product stock" name="stock" value="<?= $data['stock'] ?>" />

        </div>
        <div class="col-6 col-sm-6">
            <label for="price">Price</label>
            <br />
            <input type="number" min="0" id="price" class="form-control" placeholder="Input product price" name="price" value="<?= $data['price'] ?>" />
        </div>
        <div class="col-6 col-sm-6">
            <label for="category">Category</label>
            <br />
            <select name="category" id="category" class="form-control">
                <option value="utilities" <?php $data['category'] == "utilities" ? "selected" : "" ?>>Utilities</option>
                <option value="food_and_beverages" <?php $data['category'] == "food_and_beverages" ? "selected" : "" ?>> Food & Beverages</option>
                <option value="books" <?php $data['category'] == "books" ? "selected" : "" ?>>Books</option>
            </select>
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
