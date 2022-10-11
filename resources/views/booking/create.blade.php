@extends('master.UserLayout')

@section('content')

<section id="aa-catg-head-banner">
    <img src="{{ asset('user/img/fashion/fashion-header-bg-8.jpg')}}" alt="fashion img">
        <div class="aa-catg-head-banner-area">
            <div class="container">
                <div class="aa-catg-head-banner-content">
                    <h2>Booking</h2>
                    <ol class="breadcrumb">
                        <li><a href="index.html">Home</a></li>         
                        <li class="active">Booking</li>
                    </ol>
                </div>
            </div>
        </div>
</section>

<section id="aa-contact">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-contact-area">
 
            <!-- Contact address -->
            <div class="aa-contact-address">
              <div class="row">
                <div class="col-md-8">
                  <div class="aa-contact-address-left">
                    <form class="comments-form contact-form" action="{{ url('bookinfo', $newstring[0]) }}" method="post">
                    
                        @csrf
                     <div class="row">
                       <div class="col-md-6">
                         <div class="form-group">                        
                           <input type="text" placeholder="Your Name" name="name" class="form-control">
                         </div>
                       </div>
                       <div class="col-md-6">
                         <div class="form-group">                        
                           <input type="text" placeholder="Your Mobile" name="mobile" class="form-control">
                         </div>
                       </div>
                     </div>
                      <div class="row">
                       <div class="col-md-6">
                         <div class="form-group">                        
                          <?php
                            $no = $quantity;
                            $n='1';
                            if($no > 1)
                            {
                                echo "<select class='form-control'>";
                                while($no!=0)
                                {
                          ?>

                                  <option <?php if($n=='1') { echo "selected"; } ?>><?php echo $no; ?></option>

                          <?php
                                  $no--;
                                }
                                echo "</select>";
                            }
                            else
                            {
                                echo $no;
                            }
                          ?>
                         </div>
                       </div>
                       <div class="col-md-6">
                         <div class="form-group">                        
                         <input type="text" placeholder="Your Price" name="price" class="form-control" value="{{ $newstring[1] }}" readonly>
                         </div>
                       </div>
                     </div>                  
                      
                     <div class="form-group">                        
                       <textarea class="form-control" rows="3" name="add" placeholder="Your Address"></textarea>
                     </div>
                     <button class="aa-secondary-btn">Book</button>
                   </form>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="aa-contact-address-right">
                    <address>
                      <h4>DailyShop</h4>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum modi dolor facilis! Nihil error, eius.</p>
                      <p><span class="fa fa-home"></span>Huntsville, AL 35813, USA</p>
                      <p><span class="fa fa-phone"></span>+ 021.343.7575</p>
                      <p><span class="fa fa-envelope"></span>Email: support@dailyshop.com</p>
                    </address>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
    
@endsection