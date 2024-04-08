@extends('adminLayout')
@section('adminContent')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Add Product Brand
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
                            <form role="form" action="{{URL::to('/save-brand-product')}}" method="POST">
                                {{csrf_field()}}
                                
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name Brand</label>
                                    <input type="text" class="form-control" name="namebrandproduct" id="namebrandproduct" placeholder="Enter name category...">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Describe Brand</label>
                                    <textarea style="resize: none" rows = "5" class="form-control" id="descbrandproduct" name="descbrandproduct" placeholder="Enter describe category..."> </textarea>
                                </div>
                                <button type="submit" name="addCatProduct" class="btn btn-info">Add Brand</button>
                            </form>
                         </div>
                    </div>
                    </section>
            </div>
@endsection