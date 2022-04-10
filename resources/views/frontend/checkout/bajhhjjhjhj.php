@extends('frontend.master')

@section('title')
cart
@endsection


@section('body')

              <div class="row">
                <div class="col-md-12 well">
                  You have to login to complete your valuable order. If you are not registered then please register first.
                </div>
              </div>
              <div class="container">
                 <div class="row">
                   <div class="col-md-6">
                      <h3 class="text-success text-center">Registration Form</h3> 
                      <hr/>
                      <form class="form-horizontal" action="" method="POST">
                         {{ csrf_field() }}
                          <div class="form-group">
                              <label class="control-label col-md-3">First Name</label>
                              <div class="col-md-9">
                                <input type="text" name="first_name" class="form-control"/>  
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="control-label col-md-3">Last Name</label>
                              <div class="col-md-9">
                                <input type="text" name="last_name" class="form-control"/>  
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="control-label col-md-3">Email Address</label>
                              <div class="col-md-9">
                                <input type="email" name="email" class="form-control"/>  
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="control-label col-md-3">Password</label>
                              <div class="col-md-9">
                                <input type="password" name="password" class="form-control"/>  
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="control-label col-md-3">Phone Number</label>
                              <div class="col-md-9">
                                <input type="number" name="phone_number" class="form-control"/>  
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="control-label col-md-3">Address</label>
                              <div class="col-md-9">
                                <textarea class="form-control" name="address">
                                </textarea> 
                              </div>
                          </div>
                          <div class="form-group">
                              <div class="col-md-9 col-md-offset-3">
                                <input type="submit" name="btn" class="btn btn-success btn-block" value="Registration"/>  
                              </div>
                          </div>
                      </form>
                   </div>  
                 </div>
                 </div>
                
        
           
         </div>
         
              <div class="row">
                <div class="col-md-12 well">
                  You have to login to complete your valuable order. If you are not registered then please register first.
                </div>
              </div>
                 <div class="row">
                   <div class="col-md-6">
                      <h3 class="text-success text-center">Login Form</h3> 
                      <hr/>
                      <form class="form-horizontal" action="" method="POST">
                         {{ csrf_field() }}
                          <div class="form-group">
                              <label class="control-label col-md-3">Email Address</label>
                              <div class="col-md-9">
                                <input type="email" name="email" class="form-control"/>  
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="control-label col-md-3">Password</label>
                              <div class="col-md-9">
                                <input type="password" name="password" class="form-control"/>  
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="control-label col-md-3">Phone Number</label>
                              <div class="col-md-9">
                                <input type="number" name="phone_number" class="form-control"/>  
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="control-label col-md-3">Address</label>
                              <div class="col-md-9">
                                <textarea class="form-control" name="address">
                                </textarea> 
                              </div>
                          </div>
                          <div class="form-group">
                              <div class="col-md-9 col-md-offset-3">
                                <input type="submit" name="btn" class="btn btn-success btn-block" value="Registration"/>  
                              </div>
                          </div>
                      </form>
                   </div>  
                 </div>
       
     </div>

     
</div>
@endsection