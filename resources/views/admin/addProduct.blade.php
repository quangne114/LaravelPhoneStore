@extends('adminLayout')
@section('adminContent')

<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Add Product
                        </header>
                    <div class="panel-body">
                        <?php
$message = Session::get('message');
if ($message) {
    echo "<span class='alert'>{$message}</span>";
    Session::put('message', null);
} else {
}
                            ?>
                    <div class="position-center">
                            <form role="form" action="{{URL::to('/save-product')}}" method="POST" enctype="multipart/form-data">
                                {{csrf_field()}}
                                
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Product Name</label>
                                    <input type="text" class="form-control" name="productname" id="productname" placeholder="Enter name product...">
                                </div>
                                
                                <div class="form-group">
                                    <label for="category">Category</label>
                                    <select class="form-control" id="categoryID" name="categoryID">
                                        <option value="">Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->categoryID }}">{{ $category->categoryname }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="category">Brand</label>
                                    <select class="form-control" id="brandID" name="brandID">
                                        <option value="">Select Brand</option>
                                        @foreach($brands as $brand)
                                            <option value="{{  $brand->brandID }}">{{ $brand->brandname  }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Product Image Cover</label>
                                    <input type="file" class="form-control" name="productimage" id="productimage" placeholder="Enter name category...">   
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Product Image Sub</label>
                                    <input type="file"  class="form-control" name="image_path[]" multiple>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Product Price</label>
                                    <input type="text" class="form-control" name="productprice" id="productprice" placeholder="Enter name category...">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Product Status</label>
                                    <input type="text" class="form-control" name="productstatus" id="productstatus" placeholder="Enter name category...">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Describe Category</label>
                                    <textarea style="resize: none" rows = "5" class="form-control" id="productdesc" name="productdesc" placeholder="Enter describe category..."> </textarea>
                                </div>
                                <button type="submit" name="addProduct" class="btn btn-info">Add Product</button>
                            </form>
                         </div>
                    </div>
                    </section>
            </div>

@endsection