 <nav class="navbar default navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="/">
        <img src="{{asset('img/logo2.png')}}" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="/">الرئسية </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('serachByName')}}">المنتجات</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            الفواتير
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{route('fawater')}}">الفواتير</a>
            <a class="dropdown-item" href="{{route('pricelist')}}">عرض سعر</a>
          </div>
        </li>
  
        <li class="nav-item">
          <a class="nav-link" href="{{route('fawater')}}">الفواتير</a>
        </li>
        {{-- <li class="nav-item">
          <a class="nav-link" href="#">الزمم</a>
        </li> --}}
        <li class="nav-item">
          <a class="nav-link" href="{{route('cart')}}">السلة</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">تواصل</a>
        </li>
       </ul>
    </div>

  </div>
  </nav>
  @if(session()->has('message'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>تم الاضافة بنجاح</strong> 
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
 @endif
