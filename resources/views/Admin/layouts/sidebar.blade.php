        <div class="sidebar" data-image="{{asset('Dashboard/assets/img/sidebar-5.jpg')}}">
            <div class="sidebar-wrapper">
                <div class="logo" style="font-weight: bold">
                    <a href="#" class="simple-text">
                        <img src="{{asset('img/images/icon_01.png')}}" alt="" width="100px"><br/> <span style="display:block;margin-top: 5px"> لوحة التحكم</span>
                    </a>
                </div>
                <ul class="nav">
                    <li class="{{ Request::segment(2) == 'products' ? 'active' : null }}">
                        <a class="nav-link" href="{{route('admin.products.index')}}">
                            <i class="nc-icon nc-bullet-list-67"></i>
                            <p>المنتجات</p>
                        </a>
                    </li>
                 </ul>
              
            </div>
        </div>
