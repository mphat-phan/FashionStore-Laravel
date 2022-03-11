<header class="main_menu home_menu">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="{{URL::to('home')}}"> <img src="{{asset('public/images/logo_header.png')}}" alt="logo"> </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="menu_icon"><i class="fas fa-bars"></i></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{URL::to('home')}}">Home</a>
                                </li>
                               
                                <li class="nav-item">
                                    <a class="nav-link active" href="{{URL::to('shop')}}">Shop</a>
                                </li>
                                
                                {{-- <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="{{URL::to('blog')}}" id="navbarDropdown_2"
                                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        blog
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_2">
                                        <a class="dropdown-item" href="{{URL::to('blog')}}"> blog</a>
                                        <a class="dropdown-item" href="{{URL::to('singleblog')}}">Single blog</a>
                                    </div>
                                </li> --}}
                                <li class="nav-item">
                                    <a class="nav-link" href="{{URL::to('blog')}}">blog</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{URL::to('contact')}}">Contact</a>
                                </li>
                            </ul>
                        </div>
                        <div class="hearer_icon d-flex" style="justify-content: center;align-items: center;">
                            <a id="search_1" href="javascript:void(0)">
                                <i class="ti-search"></i>
                            </a>
                            <a href="">
                                <i class="ti-heart"></i>
                            </a>
                            
                            <div class="dropdown">
                                
                                
                                @if (session('name'))
                                    <a href="{{URL::to('login')}}" id="navbarDropdown_3" role="button" data-toggle="dropdown">
                                        <i class='far fa-user-circle' style='font-size:36px;-webkit-text-stroke: 2px white;'></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-left dropstart" aria-labelledby="navbarDropdown_2">
                                        <a class="dropdown-item" href="#"> {{session('name')}}</a>
                                        <a class="dropdown-item" href="{{URL::to('cart')}}"> cart</a>
                                        <a class="dropdown-item" href="{{route('logout')}}"> Log out</a>
                                    </div>
                                    
                                @else
                                    <a href="{{URL::to('login')}}" id="navbarDropdown3" role="button" {{--data-toggle="dropdown"--}}>
                                        <i class='far fa-user-circle' style='font-size:36px;-webkit-text-stroke: 2px white;'></i>
                                    </a>  
                                 
                                @endif

                                
                            </div>
                        </div>
                        </div>

                        
                    </nav>
                </div>
            </div>
        </div>
        <div class="search_input" id="search_input_box">
            <div class="container ">
                <form class="d-flex justify-content-between search-inner">
                    <input type="text" class="form-control" id="search_input" placeholder="Search Here">
                    <button type="submit" class="btn"></button>
                    <span class="ti-close" id="close_search" title="Close Search"></span>
                </form>
            </div>
        </div>
    </header>
    