<!DOCTYPE html>
<html>
<head>
<title>Registration Form - Tutsmake.com</title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<meta name="csrf-token" content="{{ csrf_token() }}">
<!--Bootsrap 4 CDN-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{url('style.css')}}">

</head>
<body>
<div class="container-fluid">
  <div class="row no-gutter">
    <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
    <div class="col-md-8 col-lg-6">
      <div class="login d-flex align-items-center py-5">
        <div class="container">
          <div class="row">
            <div class="col-md-9 col-lg-8 mx-auto">
              <h3 class="login-heading mb-4">Register here!</h3>
               <form action="{{url('post-registration')}}" method="POST" id="regForm">
                 {{ csrf_field() }}
                <div class="form-label-group">
                  <input type="text" id="inputName" name="fornavn" class="form-control" placeholder="Fornavn" autofocus>
                  <label for="inputName">Fornavn</label>

                  @if ($errors->has('fornavn'))
                  <span class="error">{{ $errors->first('fornavn') }}</span>
                  @endif

                </div>
                <div class="form-label-group">
                  <input type="email" name="epost" id="inputEmail" class="form-control" placeholder="Epost adresse" >
                  <label for="inputEmail">Epost adresse</label>

                  @if ($errors->has('epost'))
                  <span class="error">{{ $errors->first('epost') }}</span>
                  @endif
                </div>

                <div class="form-label-group">
                  <input type="password" name="passord" id="inputPassword" class="form-control" placeholder="Passord">
                  <label for="inputPassword">Passord</label>

                  @if ($errors->has('passord'))
                  <span class="error">{{ $errors->first('passord') }}</span>
                  @endif
                </div>

                <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">Sign Up</button>
                <div class="text-center">If you have an account?
                  <a class="small" href="{{url('login')}}">Sign In</a></div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>
