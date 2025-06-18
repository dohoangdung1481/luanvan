<?php

namespace App\Http\Controllers\AdminFunction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Enrollment;
use Illuminate\Support\Facades\Auth;

class Hocphi extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Vui lòng đăng nhập để xem học phí.');
        }

        $userId = Auth::id();

        $student = Student::where('user_id', $userId)->first();

        if (!$student) {
            return redirect()->back()->with('error', 'Không tìm thấy thông tin sinh viên của bạn.');
        }

        $enrollments = Enrollment::where('student_id', $student->id)
                                 ->whereNotNull('tuition_fee')
                                 ->with('class_section.course')
                                 ->get();

        $totalTuitionFee = 0;
        $registeredCoursesDetails = [];

        foreach ($enrollments as $enrollment) {
            if ($enrollment->class_section && $enrollment->class_section->course) {

                $course = $enrollment->class_section->course;
                     
                $totalTuitionFee += $enrollment->tuition_fee ?? 0;

                $registeredCoursesDetails[] = [
                    'section_code' => $enrollment->class_section->section_code,
                    'course_name' => $course->name,
                    'credit' => $course->credit,
                    'tuition_per_section' => $enrollment->tuition_fee,
                    'is_retake' => $enrollment->is_retake,
                ];
            }
        }

        return view('users.hocphi', [
            'student' => $student,
            'registeredCoursesDetails' => $registeredCoursesDetails,
            'totalTuitionFee' => $totalTuitionFee,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
