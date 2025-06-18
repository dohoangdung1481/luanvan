<style>
    .header {
        background: linear-gradient(to right, #aaeac6e5, #e86b2d);
        color: white;
        padding: 1.5rem;
        text-align: center;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    /* Link trong navbar */
    .nav-link {
        color: white !important;
        font-weight: 600;
        font-size: 1.05rem;
        transition: color 0.3s ease;
        padding: 8px 16px;
        border-radius: 4px;
    }

    .nav-link:hover {
        color: #ffff99 !important;
        background-color: transparent !important;
        text-decoration: none;
    }

    /* Navbar Brand */
    .navbar-brand {
        font-size: 1.25rem;
        font-weight: bold;
        color: #ffff66 !important;
    }

    /* Giãn đều các item navbar */
    .navbar-nav {
        gap: 1rem;
        justify-content: center;
        align-items: center;
    }

    /* Căn chỉnh text bên phải navbar */
    .navbar-text {
        font-size: 0.95rem;
        color: #ccffcc;
        white-space: nowrap;
    }

    .navbar-text strong {
        color: #ffff66;
    }
</style>

<header class="py-3" style="background: linear-gradient(90deg, #0d6251c5, #008080); color: white;">
    <div class="container d-flex justify-content-between align-items-center flex-wrap">
        <div class="d-flex align-items-center mb-2 mb-md-0">
            <img src="{{ asset('img/logolv.png') }}" alt="Logo" width="160" class="me-3"/>
            <div>
                <h3 class="m-0 fw-bold" style="font-size: 1.75rem; color: #efefef;">
                    TRƯỜNG ĐẠI HỌC CÔNG NGHỆ THÔNG TIN
                </h3>
                <p class="m-0 fst-italic small"
                    style="color: #fafafa; font-size: 0.9rem; font-weight: 500; letter-spacing: 0.05em;">
                    Information Technology University
                </p>
                <p class="m-0 fst-italic small" style="color: #ccffcc;">
                    Thành nhân trước thành danh - Sức mạnh của kiến thức giúp ta vững bước trên con đường đi đến thành
                    công và tạo nên giá trị bền vững
                </p>
            </div>
        </div>

        <div class="text-end small" style="color: #e6f7ff;">
            <div>
                <a href="#" class="me-2" style="color: #e6f7ff;">SITEMAP</a> |
                <a href="#" class="mx-2" style="color: #e6f7ff;">LIÊN HỆ</a>
                {{-- LANGUAGE:
                <img src="https://flagcdn.com/w40/vn.png" alt="VN" width="20" class="mx-1" />
                <img src="https://flagcdn.com/w40/gb.png" alt="EN" width="20" class="mx-1" /> --}}
            </div>
            <div class="mt-1">
                <i class="fab fa-facebook-square fs-5 me-2" style="color: #ffff66;"></i>
                <i class="fab fa-youtube fs-5" style="color: #ffff66;"></i>
            </div>
        </div>
    </div>
</header>

<nav class="navbar navbar-expand-lg shadow-sm" style="background-color: #006666;">
    <div class="container">
        <a class="navbar-brand fw-bold fs-5" href="/" style="color: #ffff66;">Trang Chủ</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{route('thoikhoabieu')}}"> Thời Khoá Biểu</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('dangky.create')}}">Đăng Ký Học Phần</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('diem.show')}}">Xem Điểm</a></li>
                <li class="nav-item"><a class="nav-link" href="/xemlichthi">Xem Lịch Thi</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('hocphi.index')}}">Học Phí</a></li>
            </ul>
            <span class="navbar-text ms-auto">
                @auth
                    <div class="dropdown">
                        <button class="btn btn-outline-light dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            Xin chào, {{ Auth::user()->name }}
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Đăng xuất</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="btn btn-outline-light">Đăng nhập</a>
                @endauth
            </span>
        </div>
    </div>
</nav>