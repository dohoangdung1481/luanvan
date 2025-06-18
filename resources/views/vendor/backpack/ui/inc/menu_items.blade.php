{{-- This file is used for menu items by any Backpack v6 theme --}}
@include('backpack.language-switcher::language-switcher')

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>
<hr class="nav-hr">
<x-backpack::menu-item title="Users" icon="la la-question" :link="backpack_url('user')" />


<hr class="nav-hr">
<x-backpack::menu-item title="Người dùng" icon="la la-question" :link="backpack_url('user')" />
<x-backpack::menu-item title="Niên khóa" icon="la la-question" :link="backpack_url('nien-khoa')" />
<x-backpack::menu-item title="Cố vấn học tập" icon="la la-question" :link="backpack_url('co-van-hoc-tap')" />
<x-backpack::menu-item title="Lớp học phần" icon="la la-question" :link="backpack_url('lop-hoc-phan')" />
<x-backpack::menu-item title="Học phần" icon="la la-question" :link="backpack_url('hoc-phan')" />
<x-backpack::menu-item title="Chuyên ngành" icon="la la-question" :link="backpack_url('chuyen-nganh')" />
<x-backpack::menu-item title="Khoa" icon="la la-question" :link="backpack_url('khoa')" />
<x-backpack::menu-item title="Điểm số" icon="la la-question" :link="backpack_url('diem-so')" />

{{-- <x-backpack::menu-item title="Lượt học học phần" icon="la la-question" :link="backpack_url('course-attempt')" /> --}}
<x-backpack::menu-item title="Đăng ký học" icon="la la-question" :link="backpack_url('enrollment')" />
{{-- <x-backpack::menu-item title="Thay đổi đăng ký học" icon="la la-question" :link="backpack_url('enrollment-change')" /> --}}
{{-- <x-backpack::menu-item title="Quyền của mô hình" icon="la la-question" :link="backpack_url('model-has-permission')" />
<x-backpack::menu-item title="Vai trò của mô hình" icon="la la-question" :link="backpack_url('model-has-role')" /> --}}
{{-- <x-backpack::menu-item title="Thông báo" icon="la la-question" :link="backpack_url('notification')" />
<x-backpack::menu-item title="Quyền hạn" icon="la la-question" :link="backpack_url('permission')" />
<x-backpack::menu-item title="Đợt đăng ký học" icon="la la-question" :link="backpack_url('registration-session')" />
<x-backpack::menu-item title="Vai trò" icon="la la-question" :link="backpack_url('role')" />
<x-backpack::menu-item title="Vai trò có quyền" icon="la la-question" :link="backpack_url('role-has-permission')" /> --}}
<x-backpack::menu-item title="Lịch học" icon="la la-question" :link="backpack_url('lich-hoc')" />
<x-backpack::menu-item title="Sinh viên" icon="la la-question" :link="backpack_url('student')" />
{{-- <x-backpack::menu-item title="Lịch học của sinh viên" icon="la la-question" :link="backpack_url('student-schedule')" /> --}}
{{-- <x-backpack::menu-item title="Tổng kết học kỳ của sinh viên" icon="la la-question" :link="backpack_url('student-semester-summary')" /> --}}
<x-backpack::menu-item title="Giảng viên" icon="la la-question" :link="backpack_url('giao-vien')" />
{{-- <x-backpack::menu-item title="Phân công giảng dạy" icon="la la-question" :link="backpack_url('teaching-assignment')" /> --}}
