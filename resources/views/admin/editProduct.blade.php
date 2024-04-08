@extends('adminLayout')
@section('adminContent')

<div class="row">
                        <?php
$message = Session::get('message');
if ($message) {
    echo "<span class='alert'>{$message}</span>";
    Session::put('message', null);
} else {
}
                        ?>
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Update Product
                        </header>
                    <div class="panel-body">
                    @foreach($edit_product as $key => $editvalue)  
                    <div class="position-center">
                            <form role="form" action="{{URL::to('/update-product/' . $editvalue->productID)}}" method="POST" enctype="multipart/form-data">
                                {{csrf_field()}}
                                
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Product Name</label>
                                    <input type="text" value='{{$editvalue->productname}}' class="form-control" name="productname" id="productname" placeholder="Enter name product...">
                                </div>
                                
                                <div class="form-group">
                                    <label for="category">Category</label>
                                    <select class="form-control"  id="categoryID" name="categoryID">
                                        <!-- <option value="">Select Category</option> -->
                                        @foreach($categories as $category)
                                            <option value="{{ $category->categoryID }}">{{ $category->categoryname }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="category">Brand</label>
                                    <select class="form-control" id="brandID" name="brandID">
                                        <!-- <option value="">Select Brand</option> -->
                                        @foreach($brands as $brand)
                                            <option value="{{  $brand->brandID }}">{{ $brand->brandname  }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Product Image Cover</label>
                                    <input type="file" class="form-control" value='{{$editvalue->productimage}}' name="productimage" id="productimage" placeholder="Enter name category...">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Product Image Sub</label>
                                    <input type="file" class="form-control" value='{{$editvalue->productimage}}' name="image_path" id="image_path" placeholder="Enter name category...">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Product Price</label>
                                    <input type="text" class="form-control" value='{{$editvalue->productprice}}' name="productprice" id="productprice" placeholder="Enter name category...">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Product Status</label>
                                    <input type="text" class="form-control" value='{{$editvalue->productstatus}}' name="productstatus" id="productstatus" placeholder="Enter name category...">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Describe Category</label>
                                    <textarea style="resize: none" rows = "5"  class="form-control" id="productdesc" name="productdesc" placeholder="Enter describe category...">{{$editvalue->productdesc}}</textarea>
                                </div>
                                <button type="submit" name="updateProduct" class="btn btn-info">Update Product</button>
                            </form>
                         </div>
                         @endforeach
                    </div>
                </section>
            </div>

@endsection