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
                            Edit Brand Category
                        </header>
                    <div class="panel-body">
                        @foreach($edit_brandproduct as $key => $editvalue)
                        <div class="position-center">
                        <form role="form" action="{{ URL::to('/update-brand-product/' . $editvalue->brandID) }}" method="POST">
                                {{csrf_field()}}             
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name Brand</label>
                                    <input type="text" value='{{$editvalue->brandname}}' class="form-control" name="namebrandproduct" id="namebrandproduct" placeholder="Enter name category...">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Describe Brand</label>
                                    <textarea style="resize: none"  rows = "5" class="form-control" id="descbrandproduct" name="descbrandproduct" placeholder="Enter describe category...">{{$editvalue->branddesc}}</textarea>
                                </div>
                                <button type="submit"  name="addBrandProduct" class="btn btn-info">Update Brand</button>
                            </form>
                         </div>
                         @endforeach
                    </div>
                 </section>
            </div>
@endsection