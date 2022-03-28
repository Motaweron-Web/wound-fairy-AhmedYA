<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="side-header">
        <a class="header-brand1">
            <img src="{{asset('uploads/fav1.png')}}" class="header-brand-img light-logo1" alt="logo">
        </a>
        <!-- LOGO -->
    </div>
    <ul class="side-menu">
        <li><h3>العناصر</h3></li>
        <li class="slide">
            <a class="side-menu__item" href="{{route('home')}}">
                <i class="icon icon-home side-menu__icon"></i>
                <span class="side-menu__label">الرئيسية</span>
            </a>
        </li>
        <li class="slide">
            <a class="side-menu__item" href="{{route('sliders.index')}}">
                <i class="fa-solid fa-images"></i>
                <span class="side-menu__label">البانر المتحرك</span>
            </a>
        </li>
        <li class="slide">
            <a class="side-menu__item" href="{{route('admins.index')}}">
                <i class="fa-solid fa-users"></i>
                <span class="side-menu__label">بيانات المشرفين</span>
            </a>
        </li>
        <li class="slide">
            <a class="side-menu__item" href="{{route('users.index')}}">
                <i class="fa-solid fa-users"></i>
                <span class="side-menu__label">بيانات العملاء</span>
            </a>
        </li>

        <li class="slide">
            <a class="side-menu__item" href="{{route('blogs.index')}}">
                <i class="fa-brands fa-blogger"></i>
                <span class="side-menu__label"> المقالات</span>
            </a>
        </li>
        <li class="slide">
            <a class="side-menu__item" href="{{route('settings.index')}}">
                <i class="fa-solid fa-gears"></i>
                <span class="side-menu__label"> الاعدادات</span>
            </a>
        </li>
        <li class="slide">
            <a class="side-menu__item" href="{{route('abouts.index')}}">
                <i class="fa-solid fa-address-card"></i>
                <span class="side-menu__label">من نحن</span>
            </a>
        </li>
        <li class="slide">
            <form method="get">
            <a href="#reservationSubmenu" data-toggle="collapse" aria-expanded="false" class=" side-menu__item">
                <i class="fa-brands fa-researchgate"></i>
                <span class="side-menu__label"> الحجوزات</span></a>
            <ul class="collapse list-unstyled" id="reservationSubmenu">
                <a href="{{route('reservations.new')}}"   class=" side-menu__item">حجوزات الجديدة </a>
                <a href="{{route('reservations.last')}}" class=" side-menu__item">حجوزات سابقة</a>
            </ul>
            </form>
        </li>

     <li class="slide">
         <ul class="collapse list-unstyled" id="sliderSubmenu">
             <a href="#sliderSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle btn btn-bitbucket side-menu__item">اضافة خدمة</a>
             <li>
                 <a href="#" class="btn btn-success">home</a>
             </li>
         </ul>
     </li>
        <li class="slide">
            <form method="get">
                <a href="#ordersSubmenu" data-toggle="collapse" aria-expanded="false" class=" side-menu__item">
                    <i class="fa-solid fa-cart-plus"></i>
                    <span class="side-menu__label"> الطلبات</span></a>
                <ul class="collapse list-unstyled" id="ordersSubmenu">
                    <a href="{{route('orders.new')}}"   class=" side-menu__item">الطلبات الجديدة </a>
                    <a href="{{route('orders.last')}}" class=" side-menu__item">الطلبات السابقة</a>
                </ul>
            </form>
        </li>
        <li class="slide">
            <a class="side-menu__item" href="{{route('get_contact')}}">
                <i class="fa-solid fa-phone"></i>
                <span class="side-menu__label">اتصل بنا</span>
            </a>
        </li>
        <li class="slide">
            <a class="side-menu__item" href="{{route('services.index')}}">
                <i class="fa-brands fa-servicestack"></i>
                <span class="side-menu__label">الخدمات</span>
            </a>
        </li>
        <li class="slide">
            <a class="side-menu__item" href="{{route('consultations.index')}}">
                <i class="fa-solid fa-book-medical"></i>
                <span class="side-menu__label">استشارات</span>
            </a>
        </li>
        <li class="slide">
            <a class="side-menu__item" href="{{route('products.index')}}">
                <i class="fa-brands fa-product-hunt"></i>
                <span class="side-menu__label">المنتجات</span>
            </a>
        </li>
        <li class="slide">
            <form method="get">
                <a href="#chatsSubmenu" data-toggle="collapse" aria-expanded="false" class=" side-menu__item">
                    <i class="fe fe-mail side-menu__icon"></i>
                    <span class="side-menu__label"> الرسائل</span></a>
                <ul class="collapse list-unstyled" id="chatsSubmenu">
                    <a href="{{route('chats.index')}}"   class=" side-menu__item">رسائل العملاء </a>
                    <a href="{{route('chats.send')}}" class=" side-menu__item">الدعم الفنى</a>
                </ul>
            </form>
        </li>
        <li class="slide">
            <a class="side-menu__item" href="{{route('log-out')}}">
                <i class="fa-solid fa-right-from-bracket"></i>
                <span class="side-menu__label">تسجيل الخروج</span>
            </a>
        </li>
    </ul>
</aside>
