<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- ------------------------------ -->
<style type="text/css">
        .icon img{
            width:20px;
            margin-right: 5px;
        }
        .icon2 img{
            width: 50px;
        }
        .icon2 input{
            margin-left: 20px;
        }
        .icon2 button  {
            height:30px;
        }
        .icon2_right{
            float: right;
            margin-right: 20px;
        }
        label.error {
                color: red;
                font-style: italic;
                
            }
        .message{
                color: #85C800;
                        font-size: 17px;
                        margin-left: 180px;
                    }
    </style>
<!-- ------------------------------ -->
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $titleAdmin }}</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="{{ $urlAdmin }}assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="{{ $urlAdmin }}assets/css/font-awesome.css" rel="stylesheet" />
       <!--CUSTOM BASIC STYLES-->
    <link href="{{ $urlAdmin }}assets/css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="{{ $urlAdmin }}assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link rel="icon" href="{{$urlPublic}}images/admin.ico" />
    <!-- ------------------------------------ -->
    <script type="text/javascript" src="{{ url('resources/assets/js/ckeditor/ckeditor.js')}}" ></script>
    <script type="text/javascript" src="{{ url('resources/assets/js/ckfinder/ckfinder.js')}}" ></script>
    <script type="text/javascript">
        var baseURL = "{!! url('/') !!}";

    </script>
    <script type="text/javascript" src="{{ url('resources/assets/js/func_ckfinder.js')}}" ></script>

    <!-- -------------------------------------- -->
     <script src="{{ $urlAdmin }}assets/js/myscript.js"></script>
    <!-- -------------VALIDATE---------
 --> <script type="text/javascript" src="{{ url('resources/assets/jquery/jquery-1.12.3.min.js')}}"> </script>
    <script type="text/javascript" src="{{ url('resources/assets/jquery/jquery.validate.min.js')}}"> </script>
    

    

</head>
<body>

    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{route('public.index.index')}}">Kys Flowers</a>
            </div>

            <div class="header-right">

                
                <a href="{{route('admin.auth.logout')}}" class="btn btn-danger" title="Logout"><i class="fa fa-exclamation-circle fa-2x"></i></a>

            </div>
        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <?php
                            $arUser = Auth::user();
                            $name   = $arUser['fullname'];
                            $roles  = $arUser['roles'];
                        ?>
                        <div class="user-img-div">
                            <img src="{{$urlAdmin}}assets/img/user.jpg" class="img-thumbnail" />

                            <div class="inner-text">
                                {{$name}}
                            <br />
                                <small>
                                <?php
                                    if( $roles == 1){
                                        $role = "Admin";
                                    }elseif ($roles == 2) {
                                        $role = "Mod";
                                    }else{
                                        $role = "User";
                                    }
                                ?>   
                                {{$role}}          
                                </small>
                            </div>
                        </div>

                    </li>
                    <?php
                        $active_index='';
                        $active_users ='';
                        $active_flowers ='';
                        $active_cats ='';
                        $active_type ='';
                        $active_orders ='';
                        $active_pays ='';
                        $active_advs ='';
                        $active_contacts ='';
                        $active_aboutus ='';
                        if(Session::get('active') == 'index'){
                            $active_index = 'active-menu';
                        }elseif(Session::get('active') == 'flowers'){
                            $active_flowers ='active-menu';
                        }elseif(Session::get('active') == 'users'){
                            $active_users ='active-menu';
                        }elseif(Session::get('active') == 'cats'){
                            $active_cats ='active-menu';
                        }elseif(Session::get('active') == 'type'){
                            $active_type ='active-menu';
                        }elseif(Session::get('active') == 'orders'){
                            $active_orders ='active-menu';
                        }elseif(Session::get('active') == 'pays'){
                            $active_pays ='active-menu';
                        }elseif(Session::get('active') == 'advs'){
                            $active_advs ='active-menu';
                        }elseif(Session::get('active') == 'contacts'){
                            $active_contacts ='active-menu';
                        }elseif(Session::get('active') == 'aboutus'){
                            $active_aboutus ='active-menu';
                        }
                    ?>
                     
                    <!-- <li>
                        <a class="{{$active_index}}" href="{{route('admin.index.index')}}"><i class="fa fa-dashboard "></i>Điều khiển</a>
                    </li> -->
                    <li>
                        <a class="{{$active_flowers}}" href="{{route('admin.flowers.flowers')}}"><i class="fa fa-desktop "></i>Quản lý hoa<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                                <li>
                               
                                    <a href="{{route('admin.flowers.flowers')}}"><i class="fa fa-desktop "></i>Tất cả<span class="fa"></span></a>
                                </li>
                                @foreach($catsPublic as $key =>$value)
                                <?php
                                    $id = $value['id'];
                                    $name = $value['name'];
                                ?>
                                <li>
                                    <a href="{{route('admin.flowers.flowers_cats',$id)}}"><i class="fa fa-toggle-on"></i>{{$name}}</a>
                                </li>
                                @endforeach
                            </ul>
                    </li>
                    <li>
                        <a class="{{$active_cats}}" href="{{route('admin.cats.cats')}}"><i class="fa fa-yelp "></i>Quản lý danh mục hoa<span class="fa"></span></a>
                            
                    </li>
                    
                    <li>
                        <a class="{{$active_type}}" href="{{route('admin.type.type')}}"><i class="fa fa-sitemap "></i>Quản lý kiểu hoa<span class="fa "></span></a>
                    </li>
                     <li>
                        <a class="{{$active_pays}}" href="{{route('admin.pays.pays')}}"><i class="fa fa-bicycle "></i>Quản lý thanh toán<span class="fa"></span></a>
                        </li>
                        <li>
                        <a class="{{$active_orders}}" href="{{route('admin.orders.orders')}}"><i class="fa fa-desktop "></i>Quản lý đơn hàng</a>
                        
                    </li>
                    <li>
                        <a class="{{$active_users}}" href="{{route('admin.users.users')}}"><i class="fa fa-sign-in "></i>Quản ký người dùng</a>
                    </li>
                    <li>
                        <a class="{{$active_aboutus}}" href="{{route('admin.aboutus.aboutus')}}"><i class="fa fa-bell "></i>Giới thiệu</a>
                        
                    </li>
                    <li>
                        <a class="{{$active_contacts}}" href="{{route('admin.contacts.contacts')}}"><i class="fa fa-yelp "></i>Quản lý liên hệ</a>
                        
                    </li>
                    <li>
                        <a class="{{$active_advs}}" href="{{route('admin.advs.advs')}}"><i class="fa fa-flash "></i>Quản lý quảng cáo</a>
                        
                    </li>
                    
                </ul>

            </div>

        </nav>