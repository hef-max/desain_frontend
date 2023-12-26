<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

  
 <!-- CSS Link -->
 <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" >

    <!-- CDNJS FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    
</head>
<body>

    <!-- Dashboard Start -->

    <section class="dashboard" id="dashboard">

        <aside class="aside-navigation" id="aside-navigation">
            <i class="fa-brands fa-rebel head-logo"></i>
            <nav>
                <ul>
                    <li id="expandNavbar" onclick="expandNavbar();">
                        <span class="material-symbols-outlined">chevron_right</span>
                    </li>
                    <li><a href="#">
                        <span class="material-symbols-outlined">view_cozy</span>
                        <h3>dashboard</h3>
                    </a></li>
                    <li><a href="#">
                        <span class="material-symbols-outlined">receipt_long</span>
                        <h3>orders</h3>
                    </a></li>
                    <li><a href="#">
                        <span class="material-symbols-outlined">history</span>
                        <h3>progress</h3>
                    </a></li>
                    <li><a href="#">
                        <span class="material-symbols-outlined">assignment_turned_in</span>
                        <h3>done</h3>
                    </a></li>
                    <li><a href="#">
                        <span class="material-symbols-outlined">box</span>
                        <h3>stock</h3>
                    </a></li>
                    <li><a href="#">
                        <span class="material-symbols-outlined">group</span>
                        <h3>employee</h3>
                    </a></li>
                    <li><a href="{{url('/logout')}}">
                        <span class="material-symbols-outlined">logout</span>
                        <h3>logout</h3>
                    </a></li>
                </ul>
            </nav>
        </aside>

        <div class="container">
            <div class="head-container">
                <div class="user-greeting">
                    <div class="ava-profile">
                        <img src="../images/image-1.jpg" alt="">
                    </div>
                    <h3>

           

                        good day, <span class="username-profile">{{ session('username') }}</span>
                    </h3>
                </div>
            </div>
            <div class="body-container">
                <div class="stats-container">
                    <div class="head-content">
                        <h3>stats & analytics</h3>
                    </div>
                    <div class="body-content">
                        <div class="stats-box">
                            <div class="box-icon">
                                <i class="fa-solid fa-sack-dollar"></i>
                            </div>
                            <div class="box-desc">
                                <h2>income</h2>
                                <div class="counted">
                                    <h2>Rp. <span>3.111.873.000</span></h2>
                                </div>
                            </div>
                            <div class="status">
                                <i class="fa-solid fa-arrow-trend-up"></i>
                                <h2>+73,6%</h2>
                            </div>
                        </div>
                        <div class="stats-box">
                            <div class="box-icon">
                                <i class="fa-solid fa-sack-dollar"></i>
                            </div>
                            <div class="box-desc">
                                <h2>income</h2>
                                <div class="counted">
                                    <h2>Rp. <span>3.111.873.000</span></h2>
                                </div>
                            </div>
                            <div class="status">
                                <i class="fa-solid fa-arrow-trend-up"></i>
                                <h2>+73,6%</h2>
                            </div>
                        </div>
                        <div class="stats-box">
                            <div class="box-icon">
                                <i class="fa-solid fa-sack-dollar"></i>
                            </div>
                            <div class="box-desc">
                                <h2>income</h2>
                                <div class="counted">
                                    <h2>Rp. <span>3.111.873.000</span></h2>
                                </div>
                            </div>
                            <div class="status">
                                <i class="fa-solid fa-arrow-trend-down"></i>
                                <h2>+73,6%</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="orders-container">
                    <div class="head-content">
                        <h3>orders</h3>
                    </div>
                    <div class="body-content">

                    @foreach($data2 as $dataorders)
                        <div class="orders-box">
                            <div class="orders-profile">
                                <div class="box-icon">
                                    <i class="fa-solid fa-bullseye"></i>
                                </div>
                                <div class="orders-desc">
                                    <div class="orders-name">{{$dataorders['nama_order'] }}</div>
                                    <div class="date">{{$dataorders['tanggal_order']}}  </div>
                                    {{$dataorders['jam_order']}}
                                </div>
                            </div>
                            <div class="orders-price">
                                {{$dataorders['harga_order']}}
                            </div>

                            <!-- Script untuk mewarnai per status order -->
                            @php

                                if ($dataorders['status_order']=="sucess") {
                                    $color = "green";
                                }
                                
                                elseif ($dataorders['status_order'] =="pending") {
                                        $color = "yellow";
                                }
                                
                                else{
                                    $color = "red";
                            }

                            @endphp

                            <div class="orders-color" style="color:{{$color}}">
                                {{$dataorders['status_order']}}
                            </div>



                            <div class="orders-menu">
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </div>
                        </div>
                        @endforeach
                        
                    </div>
                </div>



               
                <div class="employees-container">
                    <div class="head-content">
                        <h3>employees status</h3>
                    </div>
                    @foreach($data as $dataemployee)
                    <div class="body-content">
                        <div class="employee-box">
                            <div class="ava-profile">
                                <img src="../images/image-1.jpg" alt="">
                            </div>
                            <div class="employee-profile">
                                <div class="profile-name">
                                {{ $dataemployee['name'] }}
                                </div>
                                <div class="profile-job">
                                {{ $dataemployee['role'] }}
                                </div>
                            </div>
                            <div class="employee-status">
                                <i></i>
                                offline
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        
    </section>

    <!-- Dashboard End -->
    
</body>
<script type="text/javascript" src="{{ asset('js/index.js') }}"></script>
</html>

<!-- Ganti Warna untuk status pesanan -->







