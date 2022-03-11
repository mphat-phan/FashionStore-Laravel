@extends('layout')
@section('content')
<style>
    body .select-color {
        width: 32px;
        height: 32px;
        margin: 16px;
        border-radius: 100%;
        background-color: #ccc;
        cursor: pointer;
    }

    body .select-color.selectedColor {
        box-shadow: 0 0 0 10px #dfe6f1;
    }

    body .select-color.green {
        background-color: #2ecc71;
    }

    body .select-color.red {
        background-color: #ed5565;
    }

    body .select-color.yellow {
        background-color: #ffce54;
    }

    body .select-color.blue {
        background-color: #5d9cec;
    }
    body .select-size {
        min-width: 40px;
        width: auto;
        margin: 16px;
        background-color: white;
        color: black;
        cursor: pointer;
        text-align: center;
        border-radius: 10px;
        border: 1px solid black;
        padding: 3px
    }

    body .select-size.selectedSize {
        box-shadow: 0 0 0 10px #dfe6f1;
    }

</style>

<!--================End Home Banner Area =================-->

<!--================Single Product Area =================-->
<div class="product_image_area section_padding">
    <div class="container">
        <div class="row s_product_inner justify-content-between">
            <div class="col-lg-7 col-xl-7">
                <div class="product_slider_img">
                    <div id="vertical">
                        <div data-thumb="{{asset('images')}}/{{$product->image}}">
                            <img src="{{asset('images')}}/{{$product->image}}" />
                        </div>
                        @foreach($product->images as $image)
                        <div data-thumb="{{asset('images')}}/{{$image->link}}">
                            <img src="{{asset('images')}}/{{$image->link}}" />
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-xl-4">
                <div class="s_product_text">
                    <h5>previous <span>|</span> next</h5>
                    <h3>{{$product->name}}</h3>
                    <h2>
                        đ {{number_format($product->price)}}
                    </h2>
                    <ul class="list">
                        <li>
                            <a class="active" href="#">
                                <span>Thể loại</span> : {{$product->category->name}}</a>
                        </li>
                        <li>
                            <a class="active" href="#">
                                <span>Nhãn hiệu</span> : {{$product->brand->name}}</a>
                        </li>
                        <li>
                            <a class="active" href="#">
                                <span>Đã bán</span> : {{$product->sold}}</a>
                        </li>
                        <li>
                            <a class="active" href="#">
                                <span>Lượt xem</span> : {{$product->views}}</a>
                        </li>
                        <li>
                            <a href="#"> <span>Availibility</span>
                                <?php
                                    if($product->quantity){
                                        echo ": In Stock";
                                    }
                                    else{
                                        echo ": Out Of Stock";
                                    }
                                ?>

                            </a>
                        </li>
                    </ul>
                    <div class="row" id="select-box-color">
                        @foreach($colors as $row)
                        <div class="select-color" style="background-color:{{$row->colorCode}};" value={{$row->id}}>

                        </div>
                        @endforeach
                    </div>
                    <div class="row" id="select-box-size">
                        @foreach($sizes as $row)
                            <div class="select-size" value={{$row->id}}>
                                <p style="padding-top: 0;margin:0;">{{$row->name}}</p>
                            </div>
                        @endforeach
                    </div>


                    <p>
                        {{$product->summary}}
                    </p>
                    <div class="card_area d-flex justify-content-between align-items-center">
                        <div class="product_count">
                            <span class="inumber-decrement"> <i class="ti-minus"></i></span>
                            <input class="input-number" type="text" value="1" min="0" max="{{$product->quantity}}">
                            <span class="number-increment"> <i class="ti-plus"></i></span>
                        </div>
                        <a href="#" class="btn_3">add to cart</a>
                        <a href="#" class="like_us"> <i class="ti-heart"></i> </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--================End Single Product Area =================-->

<!--================Product Description Area =================-->
<section class="product_description_area">
    <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                    aria-selected="true">Description</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                    aria-controls="profile" aria-selected="false">Specification</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                    aria-controls="contact" aria-selected="false">Comments</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" id="review-tab" data-toggle="tab" href="#review" role="tab"
                    aria-controls="review" aria-selected="false">Reviews</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
                {{$product->detail}}
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>
                                    <h5>Width</h5>
                                </td>
                                <td>
                                    <h5>128mm</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Height</h5>
                                </td>
                                <td>
                                    <h5>508mm</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Depth</h5>
                                </td>
                                <td>
                                    <h5>85mm</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Weight</h5>
                                </td>
                                <td>
                                    <h5>52gm</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Quality checking</h5>
                                </td>
                                <td>
                                    <h5>yes</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Freshness Duration</h5>
                                </td>
                                <td>
                                    <h5>03days</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>When packeting</h5>
                                </td>
                                <td>
                                    <h5>Without touch of hand</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Each Box contains</h5>
                                </td>
                                <td>
                                    <h5>60pcs</h5>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="comment_list">
                            <div class="review_item">
                                <div class="media">
                                    <div class="d-flex">
                                        <img src="{{asset('assetClient/img/product/single-product/review-1.png')}}"
                                            alt="" />
                                    </div>
                                    <div class="media-body">
                                        <h4>Blake Ruiz</h4>
                                        <h5>12th Feb, 2017 at 05:56 pm</h5>
                                        <a class="reply_btn" href="#">Reply</a>
                                    </div>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                    sed do eiusmod tempor incididunt ut labore et dolore magna
                                    aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                    ullamco laboris nisi ut aliquip ex ea commodo
                                </p>
                            </div>
                            <div class="review_item reply">
                                <div class="media">
                                    <div class="d-flex">
                                        <img src="{{asset('assetClient/img/product/single-product/review-2.png')}}"
                                            alt="" />
                                    </div>
                                    <div class="media-body">
                                        <h4>Blake Ruiz</h4>
                                        <h5>12th Feb, 2017 at 05:56 pm</h5>
                                        <a class="reply_btn" href="#">Reply</a>
                                    </div>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                    sed do eiusmod tempor incididunt ut labore et dolore magna
                                    aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                    ullamco laboris nisi ut aliquip ex ea commodo
                                </p>
                            </div>
                            <div class="review_item">
                                <div class="media">
                                    <div class="d-flex">
                                        <img src="{{asset('assetClient/img/product/single-product/review-3.png')}}"
                                            alt="" />
                                    </div>
                                    <div class="media-body">
                                        <h4>Blake Ruiz</h4>
                                        <h5>12th Feb, 2017 at 05:56 pm</h5>
                                        <a class="reply_btn" href="#">Reply</a>
                                    </div>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                    sed do eiusmod tempor incididunt ut labore et dolore magna
                                    aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                    ullamco laboris nisi ut aliquip ex ea commodo
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="review_box">
                            <h4>Post a comment</h4>
                            <form class="row contact_form" action="contact_process.php" method="post" id="contactForm"
                                novalidate="novalidate">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Your Full name" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="Email Address" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="number" name="number"
                                            placeholder="Phone Number" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea class="form-control" name="message" id="message" rows="1"
                                            placeholder="Message"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 text-right">
                                    <button type="submit" value="submit" class="btn_3">
                                        Submit Now
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade show active" id="review" role="tabpanel" aria-labelledby="review-tab">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="row total_rate">
                            <div class="col-6">
                                <div class="box_total">
                                    <h5>Overall</h5>
                                    <h4>4.0</h4>
                                    <h6>(03 Reviews)</h6>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="rating_list">
                                    <h3>Based on 3 Reviews</h3>
                                    <ul class="list">
                                        <li>
                                            <a href="#">5 Star
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i> 01</a>
                                        </li>
                                        <li>
                                            <a href="#">4 Star
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i> 01</a>
                                        </li>
                                        <li>
                                            <a href="#">3 Star
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i> 01</a>
                                        </li>
                                        <li>
                                            <a href="#">2 Star
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i> 01</a>
                                        </li>
                                        <li>
                                            <a href="#">1 Star
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i> 01</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="review_list">
                            <div class="review_item">
                                <div class="media">
                                    <div class="d-flex">
                                        <img src="{{asset('assetClient/img/product/single-product/review-1.png')}}"
                                            alt="" />
                                    </div>
                                    <div class="media-body">
                                        <h4>Blake Ruiz</h4>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                    sed do eiusmod tempor incididunt ut labore et dolore magna
                                    aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                    ullamco laboris nisi ut aliquip ex ea commodo
                                </p>
                            </div>
                            <div class="review_item">
                                <div class="media">
                                    <div class="d-flex">
                                        <img src="{{asset('assetClient/img/product/single-product/review-2.png')}}"
                                            alt="" />
                                    </div>
                                    <div class="media-body">
                                        <h4>Blake Ruiz</h4>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                    sed do eiusmod tempor incididunt ut labore et dolore magna
                                    aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                    ullamco laboris nisi ut aliquip ex ea commodo
                                </p>
                            </div>
                            <div class="review_item">
                                <div class="media">
                                    <div class="d-flex">
                                        <img src="{{asset('assetClient/img/product/single-product/review-3.png')}}"
                                            alt="" />
                                    </div>
                                    <div class="media-body">
                                        <h4>Blake Ruiz</h4>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                    sed do eiusmod tempor incididunt ut labore et dolore magna
                                    aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                    ullamco laboris nisi ut aliquip ex ea commodo
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="review_box">
                            <h4>Add a Review</h4>
                            <p>Your Rating:</p>
                            <ul class="list">
                                <li>
                                    <a >
                                        <i class="fa fa-star"></i>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <i class="fa fa-star"></i>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <i class="fa fa-star"></i>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <i class="fa fa-star"></i>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <i class="fa fa-star"></i>
                                    </a>
                                </li>
                            </ul>
                            <p>Outstanding</p>
                            <form class="row contact_form" action="contact_process.php" method="post"
                                novalidate="novalidate">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="name"
                                            placeholder="Your Full name" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email"
                                            placeholder="Email Address" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="number"
                                            placeholder="Phone Number" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea class="form-control" name="message" rows="1"
                                            placeholder="Review"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 text-right">
                                    <button type="submit" value="submit" class="btn_3">
                                        Submit Now
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Product Description Area =================-->

<!-- product_list part start-->
<section class="product_list best_seller">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="section_tittle text-center">
                    <h2>Best Sellers <span>shop</span></h2>
                </div>
            </div>
        </div>
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-12">
                <div class="best_product_slider owl-carousel">
                    @foreach($bestseller as $row)
                    <div class="single_product_item">
                        <a href="{{$row->slug}}">
                            <img src="{{asset('images')}}/{{$row->image}}" alt="">
                        </a>
                        <div class="single_product_text">
                            <h4>{{$row->name}}</h4>
                            <h3>đ {{number_format($row->price)}}</h3>
                            <a href="#" class="add_cart">+ add to cart<i class="ti-heart"></i></a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- product_list part end-->
<script src="{{asset('assetAdmin/plugins/jquery/jquery.min.js')}}"></script>
<script>
    // Add active class to the current button (highlight it)
    var header1 = document.getElementById("select-box-color");
    var btns1 = header1.getElementsByClassName("select-color");
    var header2 = document.getElementById("select-box-size");
    var btns2 = header2.getElementsByClassName("select-size");

    for (var i = 0; i < btns1.length; i++) {
        btns1[i].addEventListener("click", function () {
            var current1 = document.getElementsByClassName("selectedColor");
            if(current1.length>0){
                current1[0].className = current1[0].className.replace(" selectedColor", "");
            }

            this.className += " selectedColor";
        });
    }
    for (var i = 0; i < btns2.length; i++) {
        btns2[i].addEventListener("click", function () {
            var current1 = document.getElementsByClassName("selectedSize");
            if(current1.length>0){
                current1[0].className = current1[0].className.replace(" selectedSize", "");
            }
            this.className += " selectedSize";
        });
    }
    const productDetail = (colorID,sizeID) => {

    }
    $(function () {
        $(document).on('click', '.select-color, .select-size', function (e) {
            var colorID = $(".selectedColor").attr("value");
            var sizeID = $(".selectedSize").attr("value");

        })
    })

</script>
@endsection
