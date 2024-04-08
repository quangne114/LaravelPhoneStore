@extends('welcome')
@section('content')
<style>
.product-details {
    font-family: 'Open Sans', sans-serif;
}

.view-product img.product-main-img {
	max-width: 100%; 
    max-height: 800px; 
    object-fit: contain; 
    margin: 0 auto; 
    display: block; 
}

.carousel-inner a {
    display: inline-block;
    margin: 5px;
}

.carousel-inner img {
    width: 120px; 
    height: auto; /* Tự động điều chỉnh chiều cao để giữ tỷ lệ */
    object-fit: cover; /* Đảm bảo hình ảnh phủ kín không gian mà không bị méo */
    margin: 5px; /* Thêm khoảng cách giữa các hình ảnh */
}

.product-information h2 {
    font-size: 24px;
    margin-bottom: 15px;
}

.product-information p {
    font-size: 14px;
    color: #666;
}

.price {
    font-size: 20px;
    font-weight: bold;
    margin: 20px 0;
}

.quantity input {
    width: 60px;
    padding: 5px;
}

.btn.add-to-cart {
    background-color: #5cb85c;
    color: white;
    margin: 20px 0;
    border-radius: 20px;
    padding: 10px 20px;
}

.social-sharing {
    margin-top: 20px;
}

.social-sharing i {
    font-size: 24px;
    color: #333;
    margin-right: 10px;
    cursor: pointer;
}

/* Tinh chỉnh lại cho phản hồi trên các thiết bị có màn hình nhỏ */
@media (max-width: 768px) {
    .carousel-inner a img {
        width: 80px; /* Điều chỉnh kích thước hình ảnh cho màn hình nhỏ hơn */
        height: auto; /* Tự động điều chỉnh chiều cao */
    }
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="container product-details">
    <div class="row">
        <div class="col-sm-5 col-xs-6">
                <div class="product-information">
                    <h1>{{$product->productname}}</h1>
                    <p>Category: {{$product->category->categoryname}}</p>
                    <p>Brand: {{$product->brand->brandname}}</p>
                    <p>Product ID: {{$product->productID}}</p>
                    <form action="{{URL::to('/saveCart')}}" method="post">
                        {{csrf_field()}}
                    </form>
                    <div class="price">US ${{$product->productprice}}</div>
                    <div class="quantity">
                        <label>Quantity:</label>
                        <input type="number" name="quantity" value="1" min="1" />
                    </div>
                    <p><b>Availability:</b> In Stock</p>
                    <p><b>Condition:</b> New</p>
                    <button type="submit" class="btn btn-primary add-to-cart">
                        <i class="fa fa-shopping-cart"></i> Add to cart
                    </button>
                    <div class="social-sharing">
                        <!-- Social sharing buttons will go here -->
                    </div>
                </div>
            </div>
        <div class="col-sm-5 col-xs-6">
            <div class="view-product">
                <img src="{{URL::to($product->productimage)}}" alt="Product Image" class="product-main-img" />
                <div id="similar-product" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                            @foreach($product->images as $key => $image)    
                                    <a href=""><img src="{{ URL::to($image->image_path) }}" alt=""></a> 
                            @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-11">
            <h2>Product Description</h2>
            <p>{{$product->productdesc}}</p>
        </div>
    </div>
</div>
    </div>
</div>
<script>
$(document).ready(function() {
    // Lưu ảnh chính ban đầu
    var originalSrc = $('.view-product img.product-main-img').attr('src');

    // Khi ảnh phụ được click, cập nhật ảnh chính
    $('.carousel-inner a img').on('click', function(e) {
        e.preventDefault(); // Ngăn không cho trình duyệt thực hiện hành động mặc định
        var newSrc = $(this).attr('src'); // Lấy nguồn của ảnh được click
        $('.view-product img.product-main-img').attr('src', newSrc); // Cập nhật nguồn của ảnh chính
    });

    // Thêm sự kiện click để reset về ảnh chính
    $('.view-product img.product-main-img').on('click', function() {
        $(this).attr('src', originalSrc); // Đặt lại nguồn ảnh chính
    });
});
</script>
@endsection
