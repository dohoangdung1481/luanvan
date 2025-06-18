<?php

namespace App\Http\Controllers\AdminFunction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Grade; 
use Illuminate\Support\Facades\Auth;


class Diemmonhoc extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show() 
    {
        
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Vui lòng đăng nhập để xem điểm.');
        }

       
        $userId = Auth::id();

        
        $student = Student::where('user_id', $userId)
                          ->with([
                              'enrollments.grades',
                              'enrollments.class_section.course'
                          ])->first();

        if (!$student) {
            return redirect()->back()->with('error', 'Không tìm thấy thông tin sinh viên của bạn.');
        }

        $gradesByCourse = [];
        $totalCredits = 0;
        $totalWeightedScore = 0; 
        $totalRegisteredCredits = 0;

       
        foreach ($student->enrollments as $enrollment) {
           
            if ($enrollment->class_section && $enrollment->class_section->course) {
                $course = $enrollment->class_section->course;
                $courseCredits = $course->credit ?? 0; 

                $totalRegisteredCredits += $courseCredits;
                
                $grade = $enrollment->grades->first();

                $score = $grade->total_score ?? null; 
                $gradeChar = $grade->grade_char ?? null;
              

                $status = 'Chưa có điểm'; 

                if ($score !== null) {
                   
                    if ($score >= 5.0) {
                        $status = 'Đạt';
                    } else {
                        $status = 'Không đạt';
                    }
                    $totalCredits += $courseCredits;
                    $totalWeightedScore += ($score * $courseCredits);
                }

                $gradesByCourse[] = [
                    'course_code' => $course->course_code,
                    'course_name' => $course->name,
                    'class_section_code' => $enrollment->class_section->section_code,
                    'credit' => $courseCredits,
                    'score' => $score, 
                    'grade_char' => $gradeChar,
                    'status' => $status,
                    'attempt_number' => $enrollment->attempt_number,
                ];
            }
        }
        
       
        $gpa = ($totalCredits > 0) ? ($totalWeightedScore / $totalCredits) : 0;

       
        return view('users.xemdiem', [
            'student' => $student,
            'gradesByCourse' => $gradesByCourse,
            'gpa' => $gpa,
            'totalCredits' => $totalCredits,
            'totalRegisteredCredits' => $totalRegisteredCredits,
        ]);
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
