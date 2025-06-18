@extends('layouts.master')

@section('title', 'Đăng ký học phần')
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
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
    }

    /* Course Registration specific styles */
    .registration-container {
    background: white;
    padding: 2rem;
    border-radius: 8px;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
    }

    .registration-header {
    background-color: #e6f7ff;
    padding: 1rem;
    border-radius: 8px;
    margin-bottom: 1.5rem;
    border: 1px solid #cceeff;
    }

    .registration-header h5 {
    color: #004080;
    font-weight: bold;
    margin-bottom: 0.5rem;
    }

    .registration-header .form-select {
    border-color: #008080;
    }

    .registration-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 1.5rem;
    }

    .registration-table th,
    .registration-table td {
    border: 1px solid #e0e0e0;
    padding: 0.75rem;
    text-align: center;
    vertical-align: middle;
    }

    .registration-table thead th {
    background-color: #008080;
    color: white;
    font-weight: bold;
    }

    .registration-table tbody tr:nth-child(even) {
    background-color: #f8f8f8;
    }

    .registration-table .action-cell {
    width: 120px;
    /* Adjust width for buttons */
    }

    .registration-table .btn-register {
    background-color: #28a745;
    /* Green for register */
    color: white;
    border: none;
    padding: 0.5rem 1rem;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    }

    .registration-table .btn-register:hover {
    background-color: #218838;
    }

    .registration-table .btn-registered {
    background-color: #6c757d;
    /* Grey for already registered */
    color: white;
    border: none;
    padding: 0.5rem 1rem;
    border-radius: 5px;
    cursor: not-allowed;
    }

    .registration-summary {
    background-color: #f0f8ff;
    border: 1px solid #cceeff;
    border-radius: 8px;
    padding: 1rem;
    margin-top: 2rem;
    font-weight: bold;
    }

    .registration-summary p {
    margin-bottom: 0.5rem;
    }

    .registration-summary span {
    color: #006666;
    }
  </style>
  <main class="container mt-5">
    <div class="registration-container">
    <div class="registration-header">
      <div class="d-flex align-items-center mb-3">
      <h5 class="m-0 me-3">Chọn học kỳ để đăng ký:</h5>
      <select class="form-select w-auto me-3">
        <option selected>Học kỳ 1 - Năm học 2025-2026</option>
        <option>Học kỳ Hè - Năm học 2024-2025</option>
        <option>Học kỳ 2 - Năm học 2024-2025</option>
      </select>
      </div>
      <div class="d-flex align-items-center mb-3">
      <p class="mb-0 me-3">
        <i class="fas fa-info-circle text-info me-2"></i>
        Vui lòng chọn các học phần muốn đăng ký và nhấn nút "Đăng ký".
      </p>
      <a class="btn btn-info ms-auto" id="viewRegisteredCoursesBtn" href="{{ route('dangky.show')}}">
        <i class="fas fa-eye me-2"></i>Xem các môn đã đăng ký
      </a>
      </div>
    </div>

    <table class="table registration-table" id="registrationTable">
      <thead>
      <tr>
        <th>Mã lớp</th>
        <th>Tên môn học</th>
        <th>Số tín chỉ</th>
        <th>Giáo viên</th>
        <th>Phòng</th>
        {{-- <th>Lịch học</th> --}}
        <th>Đăng ký</th>
      </tr>
      </thead>
      <tbody>
      @foreach($classSections as $section)
      <tr data-class-section-id="{{ $section->id }}">
        <td>{{ $section->section_code }}</td>
        <td>{{ $section->course->name ?? 'N/A' }}</td>
        <td>{{ $section->course->credit ?? 'N/A' }}</td>
        <td>{{ $section->teacher->full_name ?? 'N/A' }}</td>
        <td>{{ $section->room }}</td>
        {{-- <td>{{ $section->schedules-> }}</td> --}}
        <td>
       @php
            $isRegistered = $registeredSectionIds->contains($section->id);
        @endphp

        @if ($isRegistered)
            <button class="btn btn-sm btn-secondary" disabled>
                Đã đăng ký
            </button>
        @else
            <button class="btn btn-sm btn-success btn-register">
                Đăng ký
            </button>
        @endif
        </td>
      </tr>
    @endforeach
      </tbody>
    </table>


    <div class="registration-summary">
      <p>Tổng số tín chỉ đã đăng ký: <span id="total-credits">0</span></p>
      <p>Số học phần đã đăng ký: <span id="total-courses">0</span></p>
      <button class="btn btn-primary mt-3">Xác nhận đăng ký</button>
    </div>
    </div>
  </main>

  
  <script>
    document.querySelectorAll('.btn-register').forEach(button => {
    button.addEventListener('click', function () {
      const row = this.closest('tr');
      const classSectionId = row.dataset.classSectionId;

      fetch("{{ route('dangky.store') }}", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
        "X-CSRF-TOKEN": "{{ csrf_token() }}"
      },
      body: JSON.stringify({
        class_section_id: classSectionId,
      })
      })
      .then(res => res.json())
      .then(data => {
        if (data.success) {
        alert('✅ ' + data.message);
        this.textContent = 'Đã đăng ký';
        this.disabled = true;
        this.classList.remove('btn-success');
        this.classList.add('btn-secondary');
        } else {
        alert('❌ ' + data.message);
        }
      });
    });
    });
  </script>


@endsection