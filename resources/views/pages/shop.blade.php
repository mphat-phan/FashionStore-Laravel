@extends('layout')
@section('content')
<!--================Home Banner Area =================-->
   

    <!--================Category Product Area =================-->
    <section class="cat_product_area section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="left_sidebar_area">
                        <aside class="left_widgets p_filter_widgets">
                            <div class="l_w_title">
                                <h3>Browse Categories</h3>
                            </div>
                            <div class="widgets_inner">
                                <ul class="list">
                                    @foreach($categories as $row)
                                        <li>
                                            <a href="#">{{$row->name}}</a>
                                            <span>({{count($row->product)}})</span>
                                        </li>
                                    @endforeach
                                    
                                    
                                </ul>
                            </div>
                        </aside>

                        <aside class="left_widgets p_filter_widgets">
                            <div class="l_w_title">
                                <h3>Product Brands</h3>
                            </div>
                            <div class="widgets_inner">
                                <ul class="list">
                                    @foreach($brands as $row)
                                    <li>
                                        <a href="#">{{$row->name}}</a>
                                        <span>({{count($row->product)}})</span>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </aside>


                        <aside class="left_widgets p_filter_widgets price_rangs_aside">
                            <div class="l_w_title">
                                <h3>Price Filter</h3>
                            </div>
                            <div class="widgets_inner">
                                <div class="range_item">
                                    <!-- <div id="slider-range"></div> -->
                                    <input type="text" class="js-range-slider" value="" />
                                    <div class="d-flex">
                                        <div class="price_text">
                                            <p>Price :</p>
                                        </div>
                                        <div class="price_value d-flex justify-content-center">
                                            <input type="text" class="js-input-from" id="amount" readonly />
                                            <span>to</span>
                                            <input type="text" class="js-input-to" id="amount" readonly />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="product_top_bar d-flex justify-content-between align-items-center">
                                <div class="single_product_menu">
                                    <p><span>10000 </span> Prodict Found</p>
                                </div>
                                <div class="single_product_menu d-flex">
                                    <h5>sort by : </h5>
                                    <select>
                                        <option data-display="Select">Recommended</option>
                                        <option value="1">Newest</option>
                                        <option value="1">Lowest Price</option>
                                        <option value="2">Highest Price</option>
                                    </select>
                                </div>
                                <div class="single_product_menu d-flex">
                                    <h5>size : </h5>
                                    <select>
                                        <option data-display="Select">All</option>
                                        @foreach($sizes as $row)
                                        <option value={{$row->id}}>{{$row->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="single_product_menu d-flex">
                                    <h5>color : </h5>
                                    
                                    <select>
                                        <option data-display="Select">All</option>
                                        @foreach($colors as $row)
                                        <option value={{$row->id}}>{{$row->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="single_product_menu d-flex">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="search"
                                            aria-describedby="inputGroupPrepend">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend"><i
                                                    class="ti-search"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row align-items-center latest_product_inner">
                        @foreach($products as $row)
                        <div class="col-lg-4 col-sm-6">
                            <div class="single_product_item">
                                <a href="product/{{$row->slug}}">
                                    <img src="{{asset('images')}}/{{$row->image}}" alt="">
                                </a>
                                
                                <div class="single_product_text">
                                    <h4>{{$row->name}}</h4>
                                    <h3>đ {{number_format($row->price)}}</h3>
                                    <a href="#" class="add_cart">+ add to cart<i class="ti-heart"></i></a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="col-lg-12">
                            <div class="pageination">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-center">
                                        <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Previous">
                                                <i class="ti-angle-double-left"></i>
                                            </a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                                        <li class="page-item"><a class="page-link" href="#">6</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Next">
                                                <i class="ti-angle-double-right"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Category Product Area =================-->

@endsection