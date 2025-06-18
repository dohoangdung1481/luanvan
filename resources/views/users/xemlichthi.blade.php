@extends('layouts.master')

@section('title', 'Xem điểm')
@section('content')
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

      /* Exam Schedule specific styles */
      .exam-schedule-container {
        background: white;
        padding: 2rem;
        border-radius: 8px;
        box-shadow: 0 2px 6px rgba(0,0,0,0.05);
      }

      .exam-schedule-header {
        background-color: #e6f7ff;
        padding: 1rem;
        border-radius: 8px;
        margin-bottom: 1.5rem;
        border: 1px solid #cceeff;
      }

      .exam-schedule-header h5 {
        color: #004080;
        font-weight: bold;
        margin-bottom: 0.5rem;
      }

      .exam-schedule-header .form-select {
        border-color: #008080;
      }

      .exam-schedule-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 1.5rem;
      }

      .exam-schedule-table th,
      .exam-schedule-table td {
        border: 1px solid #e0e0e0;
        padding: 0.75rem;
        text-align: center;
        vertical-align: middle;
      }

      .exam-schedule-table thead th {
        background-color: #008080;
        color: white;
        font-weight: bold;
      }

      .exam-schedule-table tbody tr:nth-child(even) {
        background-color: #f8f8f8;
      }

      .exam-schedule-note {
        background-color: #fff3cd;
        border: 1px solid #ffc107;
        border-radius: 8px;
        padding: 1rem;
        margin-top: 2rem;
        color: #856404;
      }
      .exam-schedule-note p {
        margin-bottom: 0.5rem;
      }
    </style>

    <main class="container mt-5">
      <div class="exam-schedule-container">
        <div class="exam-schedule-header">
          <div class="d-flex align-items-center mb-3">
            <h5 class="m-0 me-3">Chọn học kỳ xem lịch thi:</h5>
            <select class="form-select w-auto me-3">
              <option selected>Học kỳ 2 - Năm học 2024-2025</option>
              <option>Học kỳ 1 - Năm học 2024-2025</option>
              <option>Học kỳ Hè - Năm học 2023-2024</option>
            </select>
          </div>
          <div class="d-flex align-items-center mb-3">
            <h5 class="m-0 me-3">Tìm kiếm theo Mã sinh viên:</h5>
            <input type="text" id="studentIdSearch" class="form-control w-auto me-3" placeholder="Nhập mã sinh viên (ví dụ: DH52000037)">
            <button class="btn btn-primary" id="searchButton">Tìm kiếm</button>
          </div>
          <p class="mb-1">
            <i class="fas fa-calendar-alt text-primary me-2"></i>
            Thông tin lịch thi được cập nhật thường xuyên. Vui lòng kiểm tra lại trước ngày thi.
          </p>
        </div>

        <table class="exam-schedule-table" id="examScheduleTable">
          <thead>
            <tr>
              <th>STT</th>
              <th>Mã sinh viên</th> <th>Mã học phần</th>
              <th>Tên học phần</th>
              <th>Ngày thi</th>
              <th>Giờ thi</th>
              <th>Phòng thi</th>
              <th>Hình thức thi</th>
              <th>Ghi chú</th>
            </tr>
          </thead>
          <tbody>
            <tr data-student-id="DH52000037">
              <td>1</td>
              <td>DH52000037</td>
              <td>CS101</td>
              <td>Cấu trúc dữ liệu</td>
              <td>01/06/2025</td>
              <td>08:00 - 10:00</td>
              <td>Phòng A201</td>
              <td>Tự luận</td>
              <td>Mang theo thẻ SV</td>
            </tr>
            <tr data-student-id="DH52000037">
              <td>2</td>
              <td>DH52000037</td>
              <td>MA203</td>
              <td>Giải tích 3</td>
              <td>03/06/2025</td>
              <td>13:00 - 15:00</td>
              <td>Phòng B305</td>
              <td>Trắc nghiệm</td>
              <td>Sử dụng máy tính cá nhân</td>
            </tr>
            <tr data-student-id="DH52000038">
              <td>3</td>
              <td>DH52000038</td>
              <td>EN101</td>
              <td>Tiếng Anh cơ bản</td>
              <td>05/06/2025</td>
              <td>09:00 - 11:00</td>
              <td>Phòng Lab C102</td>
              <td>Vấn đáp</td>
              <td>Chuẩn bị bài nói</td>
            </tr>
            <tr data-student-id="DH52000039">
              <td>4</td>
              <td>DH52000039</td>
              <td>IT305</td>
              <td>Lập trình Web</td>
              <td>07/06/2025</td>
              <td>14:00 - 16:00</td>
              <td>Phòng Máy D401</td>
              <td>Thực hành</td>
              <td>Thi trên máy tính</td>
            </tr>
            </tbody>
        </table>

        <div class="exam-schedule-note">
          <h5><i class="fas fa-exclamation-triangle me-2"></i>Lưu ý quan trọng:</h5>
          <p>- Sinh viên có mặt tại phòng thi trước giờ thi 15 phút.</p>
          <p>- Mang theo giấy tờ tùy thân có ảnh (CMND/CCCD hoặc thẻ sinh viên).</p>
          <p>- Nghiêm cấm sử dụng tài liệu, thiết bị điện tử khi chưa được phép.</p>
        </div>
      </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        const studentIdSearchInput = document.getElementById('studentIdSearch');
        const searchButton = document.getElementById('searchButton');
        const examScheduleTable = document.getElementById('examScheduleTable');
        const tableRows = examScheduleTable.querySelectorAll('tbody tr');

        searchButton.addEventListener('click', filterTable);
        studentIdSearchInput.addEventListener('keyup', function(event) {
          if (event.key === 'Enter') {
            filterTable();
          }
        });

        function filterTable() {
          const searchTerm = studentIdSearchInput.value.trim().toLowerCase();

          tableRows.forEach(row => {
            const studentId = row.getAttribute('data-student-id'); // Get student ID from data attribute
            if (studentId && studentId.toLowerCase().includes(searchTerm)) {
              row.style.display = ''; // Show the row
            } else {
              row.style.display = 'none'; // Hide the row
            }
          });
        }
      });
    </script>
@endsection