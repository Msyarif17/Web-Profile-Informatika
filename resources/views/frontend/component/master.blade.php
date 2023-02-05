<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{env('APP_NAME') == 'Laravel' ? env('APP_NAME'):'Informatika'}}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="shortcut icon" href="{{asset('assets/images/Logo Teknik Informatika.png')}}" type="image/x-icon">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.2.0/chart.min.js"
        integrity="sha512-qKyIokLnyh6oSnWsc5h21uwMAQtljqMZZT17CIMXuCQNIfFSFF4tJdMOaJHL9fQdJUANid6OB6DRR0zdHrbWAw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  @yield('css')
  <style>
    .nav-link{
      color:{{$cui->navbar_text_color}};
    }
    .navbar{
      background-color: {{$cui->navbar_color}};
      
    }
    .navbar-brand{
      color: {{$cui->navbar_text_color}};
    }
    .card-body {
      background-color: {{$cui->card_color}};
      color: {{$cui->card_text_color}};
    }
    .card-body .text-decoration-none{
      color: {{$cui->card_text_color}};
    }
    .btn{
      background-color: {{$cui->button_color}};
    }
    .gallery{
      background-color: {{$cui->card_color}};
      color: {{$cui->card_text_color}};
    }
    body{
      background-color: {{$cui->background_color}};
    }
    footer{
      background-color: {{$cui->footer_color}}; 
      color: {{$cui->footer_text_color}};
    }
    .foo-font-color{
      color: {{$cui->footer_text_color}};
    }
  </style>
</head>
  
  <body class="font-default">
    @include('frontend.component.navbar')
    {{-- <main> --}}
    <main style="margin-top:60px;">

      @yield('content')
    </main>
    {{-- </main> --}}
    @include('frontend.component.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    @yield('js')
    </body>
</html>