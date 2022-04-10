@extends('frontend.master')

@section('title')
cart
@endsection


@section('body')
<style>
    .form-control {
    display: inline-block;
    width: 100%;
}
</style>

              <div class="row">
    <div class="col-md-12 well" text-align="text-center">
        You have to login to complete your valuable order. If you are not registered then please register first.
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-5">
            <h3 class="text-success text-center">Registration Form</h3>
            <hr/>
            <form class="form-horizontal" action="{{route('new-customer')}}" method="POST">
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
                        <input type="email" name="email_address" id="email_address" class="form-control"/>
                        <span class="text-success" id="res"></span>
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
                        <input type="submit" id="regBtn" name="btn" class="btn btn-success btn-block" value="Registration"/>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-5">
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit">Logout</button>
            </form>
            <h3 class="text-success text-center">Login Form</h3>
            <hr/>
            <form class="form-horizontal" action="{{ route('customer.login') }}" action="" method="POST">
                {{ csrf_field() }}
                <h4 class="text-center">{{Session::get('message')}}</h4>
                <div class="form-group">
                    <label class="control-label col-md-3">Email Address</label>
                    <div class="col-md-9">
                        <input type="email" name="email" class="form-control"/>
                        @if($errors->has('email'))
                         <span style="color: deeppink;">
                           {{$errors->first('email')}}
                         </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">Password</label>
                    <div class="col-md-9">
                        <input type="password" name="password" class="form-control"/>
                        @if($errors->has('password'))
                          <span style="color: deeppink;">
                            {{$errors->first('password')}}
                          </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-9 col-md-offset-3">
                        <input type="submit" name="btn" class="btn btn-success btn-block" value="Login"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
  // var email_address = document.getElementById('email_address');

  // email_address.keyup() = function()
  // {
  //    var email = document.getElementById('email_address').value;
  //    var xmlHttp = new XMLHttpRequest();
  //    var serverPage = 'http://localhost/bicycle/public/ajax-email-check'+email;
  //    xmlHttp.open('GET', serverPage);
  //    xmlHttp.onreadystatechange = function()
  //    {
  //       if(xmlHttp.readyState == 4 && xmlHttp.status == 200)
  //       {
  //          document.getElementById('res').innerHTML = xmlHttp.responseText;

  //          if(xmlHttp.responseText == 'Already exits')
  //          {
  //            document.getElementById('regBtn').disabled = true;
  //          }
  //          else
  //          {
  //             document.getElementById('regBtn').disabled = false;
  //          }
  //       }
  //    }
  //    xmlHttp.send(null);
  // }



  $(document).ready(function () {

    $("#email_address").keyup(function () {
        var str = $(this).val();
        var xmlHttp = new XMLHttpRequest();
     var serverPage = 'http://localhost/bicycle/public/ajax-email-check/'+str;
     xmlHttp.open('GET', serverPage);
     xmlHttp.onreadystatechange = function()
     {
        if(xmlHttp.readyState == 4 && xmlHttp.status == 200)
        {
           document.getElementById('res').innerHTML = xmlHttp.responseText;

           if(xmlHttp.responseText == 'Already exits')
           {
             document.getElementById('regBtn').disabled = true;
           }
           else
           {
              document.getElementById('regBtn').disabled = false;
           }
        }
     }
     xmlHttp.send(null);

                    });
                });

</script>
@endsection
