@extends('layouts.master')

@section('title', 'Môn học đã đăng ký')
@section('content')

<main class="container mt-5">

  <div class="card shadow-sm">
    <div class="card-header bg-white">
      <h4 class="mb-0">Danh sách môn học đã đăng ký</h4>
    </div>
    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
          <thead class="bg-white">
            <tr>
              <th>Mã học phần</th>
              <th>Tên học phần</th>
              <th>Giảng viên</th>
              <th>Học phí</th>
              <th>Hành động</th> {{-- Thêm cột Hành động --}}
            </tr>
          </thead>
          <tbody>
            @forelse($enrollments as $enrollment)
            <tr>
              <td>{{ $enrollment->class_section->course->course_code ?? '-' }}</td>
              <td>{{ $enrollment->class_section->course->name ?? '-' }}</td>
              <td>{{ $enrollment->class_section->teacher->full_name ?? 'Chưa cập nhật' }}</td>
              <td>
                {{ $enrollment->tuition_fee !== null ? number_format($enrollment->tuition_fee, 0, ',', '.') . ' ₫' : '-' }}
              </td>
              <td>
                <form action="{{ route('dangky.destroy', $enrollment->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc muốn hủy đăng ký học phần này không?');">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-danger">Hủy</button>
                </form>
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="5" class="text-center fst-italic">Bạn chưa đăng ký môn học nào.</td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>

</main>

@endsection
