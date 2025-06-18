<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function timetable()
    {   
        
        $student = \App\Models\Student::where('user_id', auth()->id())->first();

        if (!$student) {
            // Nếu không tìm thấy student, xử lý lỗi hoặc trả về view trống
            return redirect('/');
        }
        // Lấy dữ liệu thời khóa biểu của học sinh hiện tại

        // Lấy tất cả các bản ghi trong student_schedule của học sinh này
       $scheduleData = DB::table('student_schedule')
        ->where('student_id', $student->id) // lấy đúng id
        ->get();

        // Tạo mảng thời khóa biểu 2 chiều: $timetable[tiết][thứ] = [...]
        $timetable = [];

        foreach ($scheduleData as $item) {
            // Lặp từ tiết bắt đầu đến tiết kết thúc
            for ($period = $item->start_period; $period <= $item->end_period; $period++) {
                $timetable[$period][$item->weekday] = [
                    'course_name' => $item->course_name,
                    'room' => $item->room,
                    'full_name' => $item->full_name,          // tên học sinh, nếu cần
                    'class_section_id' => $item->class_section_id,
                    'year' => $item->year,
                    'semester' => $item->semester,
                    // bạn có thể thêm các trường khác nếu cần
                ];
            }
            
        }        

        // Truyền biến timetable ra view
        return view('users.thoikhoabieu', compact('timetable'));
    }

}
