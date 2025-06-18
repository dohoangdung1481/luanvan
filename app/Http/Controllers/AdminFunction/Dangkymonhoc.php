<?php

namespace App\Http\Controllers\AdminFunction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Enrollment;
use App\Models\ClassSection;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;

class Dangkymonhoc extends Controller
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
        $studentId = null;
        if (Auth::check()) {
            $student = Student::where('user_id', Auth::id())->first();
            if ($student) {
                $studentId = $student->id;
            }
        }
        
        $classSections = ClassSection::with(['course', 'teacher'])->get();
        $registeredSectionIds = collect(); // Initialize an empty collection
        if ($studentId) {
            $registeredSectionIds = Enrollment::where('student_id', $studentId)
                                              ->pluck('class_section_id');
        }

        return view('users.dangkihocphan', compact('classSections', 'registeredSectionIds'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        
        $request->validate([
            'class_section_id' => 'required|integer|exists:class_sections,id',
        ]);

        
        $studentId = \App\Models\Student::where('user_id', auth()->id())->value('id');
        $classSectionId = $request->class_section_id;

        $existing = Enrollment::where('student_id', $studentId)
            ->where('class_section_id', $classSectionId)
            ->first();

        if ($existing) {
            return response()->json(['success' => false, 'message' => 'Bạn đã đăng ký lớp học phần này rồi.']);
        }

        $classSection = ClassSection::with('course')->findOrFail($classSectionId);
        $course = $classSection->course;

        if (!$course) {
            return response()->json(['success' => false, 'message' => 'Không tìm thấy môn học của lớp học phần này.']);
        }

    //     $enrolledSections = Enrollment::where('student_id', $studentId)
    //     ->with('class_section')
    //     ->get();

    // foreach ($enrolledSections as $enrolled) {
    //     $enrolledSection = $enrolled->class_section;

    //     if (
    //         $enrolledSection->day_of_week == $classSection->day_of_week &&
    //         $enrolledSection->start_time < $classSection->end_time &&
    //         $enrolledSection->end_time > $classSection->start_time
    //     ) {
    //         return redirect()->back()->with('error', 'Lịch học bị trùng với lớp khác bạn đã đăng ký.');
    //     }
    // }

        $attemptCount = Enrollment::where('student_id', $studentId)
            ->whereHas('class_section.course', function ($query) use ($course) {
                $query->where('id', $course->id);
            })
            ->count();

        
        $tuition = 500000 * $course->credit;
        $isRetake = $attemptCount > 0;

        Enrollment::create([
            'student_id' => $studentId,
            'class_section_id' => $classSectionId,
            'enrolled_at' => now(),
            'registered_at' => now(),
            'attempt_number' => $attemptCount + 1,
            'tuition_fee' => $tuition,
            'is_retake' => $isRetake,
        ]);

        return redirect()->back()->with('success', 'Đăng ký học phần thành công!');
    }


    /**
     * Display the specified resource.
     */
    public function show()
    {
        $user = auth()->user();

        // Lấy student từ user
        $student = \App\Models\Student::where('user_id', auth()->id())->first();

        if (!$student) {
            abort(404, 'Sinh viên không tồn tại.');
        }

        $enrollments = $student->enrollments()
            ->with(['class_section.course', 'class_section.teacher'])
            ->get();

         return view('users.monhoc', compact('enrollments'));
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
        $student = Student::where('user_id', auth()->id())->first();

    if (!$student) {
        return redirect()->back()->with('error', 'Không tìm thấy sinh viên.');
    }

    $enrollment = Enrollment::where('student_id', $student->id)
                            ->where('id', $id)
                            ->first();

    if (!$enrollment) {
        return redirect()->back()->with('error', 'Không tìm thấy đăng ký này.');
    }

    $enrollment->delete();

    return redirect()->back()->with('success', 'Hủy đăng ký học phần thành công!');
    }
}
