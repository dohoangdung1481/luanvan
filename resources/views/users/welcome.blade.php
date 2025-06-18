@extends('layouts.master')

@section('title', 'Đăng ký học phần')
@section('content')
    <!-- Styles -->
    <style>
      body {
      background: #f4f7fa;
      font-family: 'Segoe UI', sans-serif;
      }

      .content-box {
      background: white;
      border-radius: 8px;
      padding: 1.5rem;
      box-shadow: 0 2px 6px rgba(0,0,0,0.05);
      }

      .highlight {
      background: #fff3cd;
      padding: 10px;
      border-left: 4px solid #ffc107;
      margin-top: 1rem;
      }
    </style>

    <!-- MAIN CONTENT -->
    <main class="container mt-5">
      <div class="p-4 rounded-4 shadow-sm" style="background-color: #f0ffff;">
      <h4 class="mb-4 text-uppercase fw-bold text-secondary">Thông Tin Quản Lý Đào Tạo</h4>
      <ol class="list-group list-group-numbered mb-4">
        <a href="http://daotao1.stu.edu.vn/" class="list-group-item border-0 ps-0">Quy chế, quy định, văn bản hướng dẫn</a>
        <a href="http://daotao1.stu.edu.vn/" class="list-group-item border-0 ps-0">Kiểm định cơ sở giáo dục và chương trình
        đào tạo</a>
        <a href="http://daotao1.stu.edu.vn/" class="list-group-item border-0 ps-0">Hướng dẫn và quy trình</a>
        <a href="http://daotao1.stu.edu.vn/" class="list-group-item border-0 ps-0">Biểu mẫu</a>
        <a href="http://daotao1.stu.edu.vn/" class="list-group-item border-0 ps-0">Biểu đồ giảng dạy học tập</a>
        <a href="http://daotao1.stu.edu.vn/" class="list-group-item border-0 ps-0">Chương trình đào tạo</a>
        <a href="http://daotao1.stu.edu.vn/" class="list-group-item border-0 ps-0">Danh sách cán bộ tham gia công tác giảng dạy</a>
        <a href="http://daotao1.stu.edu.vn/" class="list-group-item border-0 ps-0" target="_blank">Niên giám</a>
        <li class="list-group-item border-0 ps-0">Sổ tay đăng ký môn học</li>
      </ol>
      <a href="http://daotao1.stu.edu.vn/default.aspx?page=chitietthongtin&id=23746" target="_blank" class="text-decoration-none">
        <div class="alert alert-warning rounded-3 mb-0">
            <strong>Sổ tay sinh viên học kỳ hè (2024 - 2025) & học kỳ 1 (2025 - 2026)</strong>
            <span class="text-muted d-block mt-1">(29/04/2025)</span>
        </div>
    </a>
      </div>
    </main>

    <!-- TIN TỨC & SỰ KIỆN -->
    <section class="news-highlight py-5">
      <div class="container">
      <h2 class="text-3xl fw-bold mb-4" style="color: #004080;">Tin tức & Sự kiện nổi bật</h2>
      <div class="row">
        <div class="col-md-6 mb-4">
        <img src="{{ asset('img/zxc.jpg') }}" class="img-fluid rounded-3 shadow mb-3">
        <h5 class="fw-semibold">Triển lãm Thơ Thiền cổ Việt Nam – Hành trình 20 năm lan tỏa tinh thần Thiền qua thi ca</h5>
        </div>
        <div class="col-md-6">
        <div class="d-flex mb-3">
          <img src="{{ asset('img/hinh1.jpg') }}" class="rounded-3 me-3" style="width: 100px; height: 70px; object-fit: cover;">
          <div>
          <span class="text-primary small fw-semibold">Nghiên cứu & Sáng tạo</span>
          <p class="mb-0 fw-medium">Vòng Bán kết cuộc thi Ra Khơi 2025: Top 7 dự án chính thức lộ diện</p>
          </div>
        </div>
        <div class="d-flex">
          <img src="{{ asset('img/hinh2.jpg') }}" class="rounded-3 me-3" style="width: 100px; height: 70px; object-fit: cover;">
          <div>
          <span class="text-primary small fw-semibold">Hoạt động của Trường Đại Học Công Nghệ Sài Gòn</span>
          <p class="mb-0 fw-medium">Buổi tập huấn cán bộ Đoàn – Hội Khoa Kỹ thuật Cơ – Điện và Máy tính</p>
          </div>
        </div>
        </div>
      </div>
      </div>
    </section>

    <!-- CHƯƠNG TRÌNH ĐÀO TẠO -->
    <section class="education-programs py-5" style="background-color: #e6f7ff;">
      <div class="container">
      <h2 class="text-3xl fw-bold mb-4" style="color: #004080;">Chương trình đào tạo</h2>
      <div class="row g-4">
        <div class="col-md-4">
        <div class="bg-white p-3 rounded-4 shadow-sm h-100">
          <img src="{{ asset('img/hinh2.jpg') }}" class="img-fluid rounded-3 mb-3">
          <h5 class="fw-bold">Chương trình Đại học</h5>
          <p class="text-muted small">Giúp hình thành tư duy nghiên cứu, trang bị kỹ năng hữu ích để phát triển sự nghiệp.</p>
          <a href="#" class="text-decoration-none fw-semibold text-primary">Tìm hiểu thêm</a>
        </div>
        </div>
        <div class="col-md-4">
        <div class="bg-white p-3 rounded-4 shadow-sm h-100">
          <img src="{{ asset('img/hinh1.jpg') }}" class="img-fluid rounded-3 mb-3">
          <h5 class="fw-bold">Chương trình Sau đại học</h5>
          <p class="text-muted small">Cung cấp tài nguyên học thuật và nghiên cứu phong phú cho người học.</p>
          <a href="#" class="text-decoration-none fw-semibold text-primary">Tìm hiểu thêm</a>
        </div>
        </div>
        <div class="col-md-4">
        <div class="bg-white p-3 rounded-4 shadow-sm h-100">
          <img src="{{ asset('img/zxc.jpg') }}" class="img-fluid rounded-3 mb-3">
          <h5 class="fw-bold">Chương trình Liên kết Quốc tế</h5>
          <p class="text-muted small">Cơ hội nhận bằng từ các đại học hàng đầu thế giới, trải nghiệm toàn cầu.</p>
          <a href="#" class="text-decoration-none fw-semibold text-primary">Tìm hiểu thêm</a>
        </div>
        </div>
      </div>
      </div>
    </section>

  <!-- DANH SÁCH SỰ KIỆN MỚI -->
  <section class="events-list py-5" style="background-color: #e6f7ff;">
    <div class="container">
    <h2 class="fw-bold mb-4" style="color: #004080;">Danh sách sự kiện</h2>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 g-4 px-3 pb-4">

      <!-- Sự kiện 1 -->
      <div class="col">
      <div class="card h-100 shadow-sm rounded-4 overflow-hidden">
        <img src="/img/hinh1.jpg" class="card-img-top" alt="Sự kiện 1" style="height: 190px; object-fit: cover;">
        <div class="card-body d-flex flex-column">
        <div class="d-flex align-items-center mb-3">
          <div class="bg-teal-600 text-white text-center rounded-3 py-1 px-2 me-2" style="background-color: #008080; min-width: 50px;">
          <div class="text-uppercase small" style="font-size: 0.7rem;">May</div>
          <div class="fw-bold fs-4">31</div>
          </div>
          <span class="text-muted small">Ngày 31.05.2025</span>
        </div>
        <h5 class="card-title text-secondary mb-3" style="font-weight: 600; font-size: 1rem;">
          Chuỗi Live talk Hướng nghiệp bền vững 5.0 “Empowering Tomorrow”
        </h5>
        <div class="mt-auto">
          <button class="btn btn-warning w-100">Đăng ký tham gia</button>
        </div>
        </div>
      </div>
      </div>

      <!-- Sự kiện 2 -->
      <div class="col">
      <div class="card h-100 shadow-sm rounded-4 overflow-hidden">
        <img src="/img/zxc.jpg" class="card-img-top" alt="Sự kiện 2" style="height: 190px; object-fit: cover;">
        <div class="card-body d-flex flex-column">
        <div class="d-flex align-items-center mb-3">
          <div class="bg-teal-600 text-white text-center rounded-3 py-1 px-2 me-2" style="background-color: #008080; min-width: 50px;">
          <div class="text-uppercase small" style="font-size: 0.7rem;">Jun</div>
          <div class="fw-bold fs-4">07</div>
          </div>
          <span class="text-muted small">Ngày 07.06.2025</span>
        </div>
        <h5 class="card-title text-secondary mb-3" style="font-weight: 600; font-size: 1rem;">
          Đại hội Đại biểu Đảng bộ Đại học Kinh tế Thành phố Hồ Chí Minh lần thứ XIV
        </h5>
        <div class="mt-auto">
          <button class="btn btn-warning w-100">Đăng ký tham gia</button>
        </div>
        </div>
      </div>
      </div>

      <!-- Sự kiện 3 -->
      <div class="col">
      <div class="card h-100 shadow-sm rounded-4 overflow-hidden">
        <img src="/img/hinh3.jpg" class="card-img-top" alt="Sự kiện 3" style="height: 190px; object-fit: cover;">
        <div class="card-body d-flex flex-column">
        <div class="d-flex align-items-center mb-3">
          <div class="bg-teal-600 text-white text-center rounded-3 py-1 px-2 me-2" style="background-color: #008080; min-width: 50px;">
          <div class="text-uppercase small" style="font-size: 0.7rem;">Jun</div>
          <div class="fw-bold fs-4">23</div>
          </div>
          <span class="text-muted small">Ngày 23.06.2025</span>
        </div>
        <h5 class="card-title text-secondary mb-3" style="font-weight: 600; font-size: 1rem;">
          UEH Mekong Summer Camp 2025 – Local Life, Global Mind
        </h5>
        <div class="mt-auto">
          <button class="btn btn-warning w-100">Đăng ký tham gia</button>
        </div>
        </div>
      </div>
      </div>

      <!-- Sự kiện 4 -->
      <div class="col">
      <div class="card h-100 shadow-sm rounded-4 overflow-hidden">
        <img src="/img/hinh2.jpg" class="card-img-top" alt="Sự kiện 4" style="height: 190px; object-fit: cover;">
        <div class="card-body d-flex flex-column">
        <div class="d-flex align-items-center mb-3">
          <div class="bg-teal-600 text-white text-center rounded-3 py-1 px-2 me-2" style="background-color: #008080; min-width: 50px;">
          <div class="text-uppercase small" style="font-size: 0.7rem;">Jul</div>
          <div class="fw-bold fs-4">09</div>
          </div>
          <span class="text-muted small">Ngày 09.07.2025</span>
        </div>
        <h5 class="card-title text-secondary mb-3" style="font-weight: 600; font-size: 1rem;">
          SEED 2025 – Dự án khởi nghiệp bền vững phát triển kinh tế
        </h5>
        <div class="mt-auto">
          <button class="btn btn-warning w-100">Đăng ký tham gia</button>
        </div>
        </div>
      </div>
      </div>

    </div>
    </div>
  </section>
@endsection
