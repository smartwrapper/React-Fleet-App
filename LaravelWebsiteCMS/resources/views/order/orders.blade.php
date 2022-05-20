@extends('layouts.master')
@section('content')
    <div class="container-fuild">
      <nav aria-label="breadcrumb">
          <div class="container">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Orders</li>
              </ol>
          </div>
        </nav>
    </div>  
     
     <!--My Order Content -->
     <section class="order-one-content pro-content">
    
      <div class="container">
        <div class="row">
          <div class="col-12 col-lg-3  d-none d-lg-block d-xl-block"> 
              <div class="heading">
                  <h2>
                      My Account
                  </h2>
                  <hr >
                </div>
              <ul class="list-group">
                  <li class="list-group-item">
                      <a class="nav-link" href="profile.html">
                          <i class="fas fa-user"></i>
                        Profile          
                      </a>
                  </li>
                  <li class="list-group-item">
                      <a class="nav-link" href="wishlist.html">
                          <i class="fas fa-heart"></i>
                        Wishlist                   
                      </a>
                  </li>
                  <li class="list-group-item">
                      <a class="nav-link" href="orders.html">
                          <i class="fas fa-shopping-cart"></i>
                        Orders                   
                      </a>
                  </li>
                  <li class="list-group-item">
                      <a class="nav-link" href="shipping-address.html">
                          <i class="fas fa-map-marker-alt"></i>
                        Shipping Address                           
                      </a>
                  </li>
                  <li class="list-group-item">
                      <a class="nav-link" href="javascript:void(0)">
                          <i class="fas fa-power-off"></i>
                        Logout                               
                      </a>
                  </li>
                  <li class="list-group-item">
                      <a class="nav-link" href="change-password.html">
                          <i class="fas fa-unlock-alt"></i>
                        Change Password                            
                      </a>
                    </li> 
                </ul>
          </div>
          <div class="col-12 col-lg-9 ">
              <div class="heading">
                  <h2>
                      My Order
                  </h2>
                  <hr >
                </div>
              
             
              <table class="table order-table">
                  
                <thead>
                  <tr class="d-flex">
                    <th class="col-12 col-md-2">Date</th>
                    <th class="col-12 col-md-2"></th>
                    <th class="col-12 col-md-6">Discription</th>
                    <th class="col-12 col-md-2" >Order ID</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <tr class="d-flex">
                    <td class="col-12 col-md-2">25th April 2019</td>
                    <td class="col-12 col-md-2">  
                      <img class="img-fluid order-img"  src="images/wishlist/wishlist-1.png" alt="John Doe">
                    </td>
                    <td class="col-12 col-md-6">
                      <div class="description">
                        <h3><a href="order-detail.html">VAUGHN SUEDE SLIP-ON SNEAKER</a><br>
                        </h3>
                        <div class="price">Total Price: <span>$360</span></div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>      
                        
                      </div>
                    </td>
                    <td class="col-12 col-md-2 underline">354365G4</td>
                  </tr>

                  <tr class="d-flex">
                      <td class="col-12 col-md-2">25th April 2019</td>
                      <td class="col-12 col-md-2">  
                        <img class="img-fluid order-img"  src="images/wishlist/wishlist-1.png" alt="John Doe">
                      </td>
                      <td class="col-12 col-md-6">
                        <div class="description">
                          <h3><a href="order-detail.html">VAUGHN SUEDE SLIP-ON SNEAKER</a><br>
                          </h3>
                          <div class="price">Total Price: <span>$360</span></div>
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>      
                          
                        </div>
                      </td>
                      <td class="col-12 col-md-2 underline">354365G4</td>
                  </tr>
                  <tr class="d-flex">
                      <td class="col-12 col-md-2">25th April 2019</td>
                      <td class="col-12 col-md-2">  
                        <img class="img-fluid order-img"  src="images/wishlist/wishlist-1.png" alt="John Doe">
                      </td>
                      <td class="col-12 col-md-6">
                        <div class="description">
                          <h3><a href="order-detail.html">VAUGHN SUEDE SLIP-ON SNEAKER</a><br>
                          </h3>
                          <div class="price">Total Price: <span>$360</span></div>
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>      
                          
                        </div>
                      </td>
                      <td class="col-12 col-md-2 underline">354365G4</td>
                  </tr>  
                </tbody>
              </table>
              
           
                <div class="pagination justify-content-between ">
                        
                    <label for="staticEmail" class="col-form-label">Showing 1&ndash;<span class="showing_record">1</span>&nbsp;of&nbsp;<span class="showing_total_record">23</span>&nbsp;results.</label>                                           
               
                <div class="col-12 col-sm-6">
                    <ol class="loader-page">
                      <li class="loader-page-item"><a href="javascript:void(0)">  
                        <i class="fa fa-angle-double-left" style="font-size:12px"></i></a>
                      </li>
                      <li  class="loader-page-item"><a href="javascript:void(0)">1</a></li>
                      <li  class="loader-page-item"><a href="javascript:void(0)">2</a></li>
                      <li  class="loader-page-item"><a href="javascript:void(0)">3</a></li>
                      <li  class="loader-page-item"><a href="javascript:void(0)">4</a></li>
                      <li  class="loader-page-item"><a href="javascript:void(0)"> 
                        <i class="fa fa-angle-double-right" style="font-size:12px"></i></a>
                      </li>
                    </ol>
                </div>
                </div>
            <!-- ............the end..... -->
          </div>
        </div>
      </div>
    </section>
        
    @endsection
    @section('script')
    @endsection