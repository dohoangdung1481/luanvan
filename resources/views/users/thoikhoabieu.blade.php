@extends('layouts.master')

@section('title', 'Thời Khóa Biểu')

@section('content')
<main class="container mt-5">

  <div class="mb-4">
    <div class="d-flex align-items-center gap-3 flex-wrap">
      <label class="form-label m-0">Chọn học kỳ:</label>
      <select class="form-select w-auto">
        <option selected>Học kỳ 2 - Năm học 2024-2025</option>
        <option>Học kỳ 1 - Năm học 2024-2025</option>
      </select>

      <label class="form-label m-0">Chọn tuần:</label>
      <select class="form-select w-auto">
        <option selected>Tuần 39 (26/05 - 01/06/2025)</option>
        <option>Tuần 40 (02/06 - 08/06/2025)</option>
      </select>
    </div>

    <div class="mt-3">
      <p class="mb-1 small">
        <img src="uploaded:image_80d070.png-0d16cd4b-010c-4abd-9ea8-87300026b74b" width="20"
          onerror="this.onerror=null;this.src='https://placehold.co/20x20/008080/FFFFFF?text=i';" class="me-2">
        Lưu ý tuần 24 tương ứng với tuần 1 của học kỳ, bắt đầu từ ngày 10/01/2025
      </p>
      <ul class="small">
        <li>- Tiết 01 (07h00 - 07h45) | Tiết 02 (07h50 - 08h35) | Tiết 03 (08h40 - 09h25)</li>
        <li>- Tiết 04 (09h35 - 10h20) | Tiết 05 (10h25 - 11h10) | Tiết 06 (11h15 - 12h00)</li>
        <li>- Tiết 07 (12h35 - 13h20) | Tiết 08 (13h25 - 14h10) | Tiết 09 (14h15 - 15h00)</li>
        <li>- Tiết 10 (15h00 - 15h45) | Tiết 11 (15h50 - 16h35) | Tiết 12 (16h40 - 17h25)</li>
        <li>- Tiết 13 (17h40 - 18h25) | Tiết 14 (18h30 - 19h15) | Tiết 15 (19h20 - 20h05)</li>
      </ul>
    </div>
  </div>

  <div class="table-responsive">
    <table class="table table-bordered align-middle text-center">
      <thead class="table-light">
        <tr>
          <th class="text-nowrap">Tiết / Ngày</th>
          <th>Thứ 2</th>
          <th>Thứ 3</th>
          <th>Thứ 4</th>
          <th>Thứ 5</th>
          <th>Thứ 6</th>
          <th>Thứ 7</th>
          <th>Chủ nhật</th>
        </tr>
      </thead>
      @php
        $daysOfWeek = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
      @endphp

      <tbody>
        @for ($period = 1; $period <= 15; $period++)
          <tr>
            <td><strong>Tiết {{ $period }}</strong></td>
            @foreach ($daysOfWeek as $day)
              <td>
                @if (isset($timetable[$period][$day]))
                  <div class="timetable-cell-content">
                    <strong>{{ $timetable[$period][$day]['course_name'] }}</strong><br>
                    <span>Phòng: {{ $timetable[$period][$day]['room'] }}</span><br>
                    {{-- <span>Học sinh: {{ $timetable[$period][$day]['full_name'] }}</span> --}}
                    <span>{{ $timetable[$period][$day]['semester'] }} - {{ $timetable[$period][$day]['year'] }}</span>
                  </div>
                @endif
              </td>
            @endforeach
          </tr>
        @endfor
      </tbody>

      <tfoot class="table-light">
        <tr>
          <th class="text-nowrap">Tiết / Ngày</th>
          <th>Thứ 2</th>
          <th>Thứ 3</th>
          <th>Thứ 4</th>
          <th>Thứ 5</th>
          <th>Thứ 6</th>
          <th>Thứ 7</th>
          <th>Chủ nhật</th>
        </tr>
      </tfoot>
    </table>
  </div>
</main>
@endsection
