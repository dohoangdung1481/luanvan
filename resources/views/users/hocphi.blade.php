@extends('layouts.master')

@section('title', 'Xem học phí') {{-- Changed title to be more relevant --}}

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

        /* Tuition Fees specific styles */
        .tuition-fees-container {
            background: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0, 2px, 6px, 0.05);
        }

        .tuition-fees-header {
            background-color: #e6f7ff;
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            border: 1px solid #cceeff;
        }

        .tuition-fees-header h5 {
            color: #004080;
            font-weight: bold;
            margin-bottom: 0.5rem;
        }

        .tuition-fees-header .form-select {
            border-color: #008080;
        }

        .tuition-fees-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1.5rem;
        }

        .tuition-fees-table th,
        .tuition-fees-table td {
            border: 1px solid #e0e0e0;
            padding: 0.75rem;
            text-align: center;
            vertical-align: middle;
        }

        .tuition-fees-table thead th {
            background-color: #008080;
            color: white;
            font-weight: bold;
        }

        .tuition-fees-table tbody tr:nth-child(even) {
            background-color: #f8f8f8;
        }

        .tuition-fees-summary {
            background-color: #f0f8ff;
            border: 1px solid #cceeff;
            border-radius: 8px;
            padding: 1rem;
            margin-top: 2rem;
            font-weight: bold;
            text-align: right;
        }

        .tuition-fees-summary p {
            margin-bottom: 0.5rem;
        }

        .tuition-fees-summary span {
            color: #006666;
            font-size: 1.1rem;
        }

        .tuition-fees-note {
            background-color: #fff3cd;
            border: 1px solid #ffc107;
            border-radius: 8px;
            padding: 1rem;
            margin-top: 2rem;
            color: #856404;
        }

        .tuition-fees-note p {
            margin-bottom: 0.5rem;
        }
    </style>

    <main class="container mt-5">
        <div class="tuition-fees-container">
            <div class="tuition-fees-header">
                {{-- Display student info --}}
                @if (isset($student))
                    <h3 class="mb-3">Học Phí của Sinh Viên: <span class="text-info">{{ $student->full_name }}</span> (<span class="text-info">{{ $student->student_code }}</span>)</h3>
                @else
                    <h3 class="mb-3 text-danger">Không tìm thấy thông tin sinh viên.</h3>
                @endif

                <div class="d-flex align-items-center mb-3">
                    <h5 class="m-0 me-3">Chọn học kỳ xem học phí:</h5>
                    <select class="form-select w-auto me-3">
                        {{-- This select is currently static. To make it dynamic, you'd pass a list of semesters from the controller. --}}
                        <option selected>Học kỳ 2 - Năm học 2024-2025</option>
                        <option>Học kỳ 1 - Năm học 2024-2025</option>
                        <option>Học kỳ Hè - Năm học 2023-2024</option>
                    </select>
                </div>
                <p class="mb-1">
                    <i class="fas fa-money-bill-wave text-success me-2"></i>
                    Thông tin học phí chi tiết theo từng học kỳ.
                </p>
            </div>

            <table class="tuition-fees-table">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Mã học phần</th>
                        <th>Tên học phần</th>
                        <th>Số tín chỉ</th>
                        <th>Đơn giá/tín chỉ</th> {{-- Assuming 500,000 VND per credit from your controller --}}
                        <th>Thành tiền</th>
                        <th>Trạng thái</th> {{-- This status (paid/unpaid) is not currently in your data, so it will be static for now --}}
                    </tr>
                </thead>
                <tbody>
                    @if (isset($registeredCoursesDetails) && count($registeredCoursesDetails) > 0)
                        @php $stt = 1; @endphp
                        @foreach ($registeredCoursesDetails as $detail)
                            <tr>
                                <td>{{ $stt++ }}</td>
                                <td>{{ $detail['section_code'] }}</td>
                                <td>{{ $detail['course_name'] }}</td>
                                <td>{{ $detail['credit'] }}</td>
                                <td>{{ number_format(500000, 0, ',', '.') }} VNĐ</td> {{-- Unit price, hardcoded as per your controller's logic --}}
                                <td>{{ number_format($detail['tuition_per_section'], 0, ',', '.') }} VNĐ</td>
                                {{-- The 'Trạng thái' (Status) is not directly available from your current enrollment data.
                                     You would need to add a 'payment_status' or similar field to your Enrollment model
                                     or a related payment table to make this dynamic.
                                     For now, it's a placeholder. --}}
                                <td class="text-danger fw-bold">Chưa thanh toán</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7" class="text-center py-4">Bạn chưa đăng ký môn học nào hoặc không có dữ liệu học phí.</td>
                        </tr>
                    @endif
                </tbody>
            </table>

            <div class="tuition-fees-summary">
                <p>Tổng số tín chỉ đăng ký: <span>
                    @php
                        $totalCredits = 0;
                        foreach ($registeredCoursesDetails as $detail) {
                            $totalCredits += $detail['credit'];
                        }
                        echo $totalCredits;
                    @endphp
                </span></p>
                <p>Tổng học phí học kỳ: <span>{{ number_format($totalTuitionFee, 0, ',', '.') }} VNĐ</span></p>
                
                <p>Số tiền đã thanh toán: <span>0 VNĐ</span></p>
                <p>Số tiền còn nợ: <span class="text-danger">{{ number_format($totalTuitionFee, 0, ',', '.') }} VNĐ</span></p>
                <button class="btn btn-primary mt-3">Thanh toán ngay</button>
            </div>

            <div class="tuition-fees-note">
                <h5><i class="fas fa-info-circle me-2"></i>Lưu ý:</h5>
                <p>- Hạn chót thanh toán học phí là ngày 15/07/2025.</p>
                <p>- Sinh viên có thể thanh toán trực tuyến qua cổng thanh toán của trường hoặc tại phòng tài chính.</p>
                <p>- Mọi thắc mắc về học phí vui lòng liên hệ phòng Kế hoạch - Tài chính.</p>
            </div>
        </div>
    </main>
@endsection