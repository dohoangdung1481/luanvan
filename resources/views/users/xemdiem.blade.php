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
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
        }

        /* View Grades specific styles */
        .grades-container {
            background: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
        }

        .grades-header {
            background-color: #e6f7ff;
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            border: 1px solid #cceeff;
        }

        .grades-header h5 {
            color: #004080;
            font-weight: bold;
            margin-bottom: 0.5rem;
        }

        .grades-header .form-select {
            border-color: #008080;
        }

        .grades-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1.5rem;
        }

        .grades-table th,
        .grades-table td {
            border: 1px solid #e0e0e0;
            padding: 0.75rem;
            text-align: center;
            vertical-align: middle;
        }

        .grades-table thead th {
            background-color: #008080;
            color: white;
            font-weight: bold;
        }

        .grades-table tbody tr:nth-child(even) {
            background-color: #f8f8f8;
        }

        .grades-table tfoot td {
            background-color: #e6f7ff;
            font-weight: bold;
            color: #004d4d;
        }

        .summary-box {
            background-color: #f0f8ff;
            border: 1px solid #cceeff;
            border-radius: 8px;
            padding: 1rem;
            margin-top: 2rem;
            text-align: right;
            font-weight: bold;
        }

        .summary-box p {
            margin-bottom: 0.5rem;
        }

        .summary-box span {
            color: #006666;
        }
    </style>

    <main class="container mt-5">
        <div class="grades-container">
            <div class="grades-header">
                {{-- Display student info --}}
                @if (isset($student))
                    <h3>Bảng Điểm của Sinh Viên: <span class="text-info">{{ $student->full_name }}</span> (<span class="text-info">{{ $student->student_code }}</span>)</h3>
                @else
                    <h3 class="text-danger">Không tìm thấy thông tin sinh viên.</h3>
                @endif

                <div class="d-flex align-items-center mb-3">
                    <h5 class="m-0 me-3">Chọn học kỳ xem điểm:</h5>
                    <select class="form-select w-auto me-3">
                        {{-- These select boxes are static. To make them dynamic, you'd need to pass
                             a list of available semesters/academic years from the controller. --}}
                        <option selected>Học kỳ 2 - Năm học 2024-2025</option>
                        <option>Học kỳ 1 - Năm học 2024-2025</option>
                        <option>Học kỳ Hè - Năm học 2023-2024</option>
                    </select>
                    <select class="form-select w-auto">
                        <option selected>Tất cả học kỳ</option>
                        <option>Học kỳ 1 - 2023-2024</option>
                        <option>Học kỳ 2 - 2023-2024</option>
                    </select>
                </div>
                <p class="mb-1">
                    <i class="fas fa-info-circle text-info me-2"></i>
                    Thông tin điểm số được cập nhật sau khi có kết quả chính thức từ phòng đào tạo.
                </p>
            </div>

            <table class="grades-table">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Mã Học Phần</th>
                        <th>Tên Môn Học</th>
                        <th>Lớp Học Phần</th> {{-- Added this column for clarity --}}
                        <th>Số Tín Chỉ</th>
                        <th>Điểm Tổng Kết</th> {{-- Renamed to reflect available data --}}
                        <th>Trạng Thái</th>
                        <th>Lần Học</th> {{-- Included attempt number --}}
                    </tr>
                </thead>
                <tbody>
                    @if (isset($gradesByCourse) && count($gradesByCourse) > 0)
                        @php $stt = 1; @endphp
                        @foreach ($gradesByCourse as $grade)
                            <tr>
                                <td>{{ $stt++ }}</td>
                                <td>{{ $grade['course_code'] }}</td>
                                <td>{{ $grade['course_name'] }}</td>
                                <td>{{ $grade['class_section_code'] }}</td> {{-- Display class section code --}}
                                <td>{{ $grade['credit'] }}</td>
                                <td>{{ number_format($grade['score'], 1) ?? 'N/A' }}</td> {{-- Display score, formatted to 1 decimal --}}
                                <td>
                                    @if ($grade['status'] == 'Đạt')
                                        <span class="badge bg-success">{{ $grade['status'] }}</span>
                                    @elseif ($grade['status'] == 'Không đạt')
                                        <span class="badge bg-danger">{{ $grade['status'] }}</span>
                                    @else
                                        <span class="badge bg-secondary">{{ $grade['status'] }}</span>
                                    @endif
                                </td>
                                <td>{{ $grade['attempt_number'] }}</td> {{-- Display attempt number --}}
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="8" class="text-center py-4">Sinh viên này chưa có điểm môn học nào được ghi nhận.</td>
                        </tr>
                    @endif
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4">Tổng số tín chỉ tích lũy</td>
                        <td>{{  $totalRegisteredCredits }}</td> 
                        <td colspan="3"></td>
                    </tr>
                </tfoot>
            </table>

            <div class="summary-box">
                {{-- Your controller currently calculates one GPA (cumulative GPA).
                     "Điểm trung bình học kỳ" would require filtering grades by semester,
                     which isn't done in the current controller. --}}
                <p>Điểm trung bình tích lũy (GPA): <span class="text-success">{{ number_format($gpa ?? 0, 2) }}/10</span></p>
                <p>Điểm trung bình hệ 4: <span class="text-secondary">Chưa tính</span></p> {{-- This data is not available from your controller --}}
            </div>
        </div>
    </main>
@endsection