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
                            Edit Product Category
                        </header>
                    <div class="panel-body">
                        @foreach($edit_categoryproduct as $key => $editvalue)
                        <div class="position-center">
                        <form role="form" action="{{ URL::to('/update-category-product/' . $editvalue->categoryID) }}" method="POST">
                                {{csrf_field()}}
                                
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name Category</label>
                                    <input type="text" value='{{$editvalue->categoryname}}' class="form-control" name="namecatproduct" id="namecatproduct" placeholder="Enter name category...">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Describe Category</label>
                                    <textarea style="resize: none"  rows = "5" class="form-control" id="descateproduct" name="descateproduct" placeholder="Enter describe category...">{{$editvalue->categorydesc}}</textarea>
                                </div>
                                <button type="submit"  name="addCatProduct" class="btn btn-info">Update Category</button>
                            </form>
                         </div>
                         @endforeach
                    </div>
                    </section>
            </div>
@endsection