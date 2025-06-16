<?php

namespace App\Http\Controllers;

use App\Http\Requests\Course\CourseCreateRequest;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{

    public function index()
    {
        $courses = Course::with('modules.contents')->get();
        return view('courses.index', compact('courses'));
    }

    public function create()
    {
        return view('courses.create');
    }


    public function store(CourseCreateRequest $request)
    {


        DB::beginTransaction();
        try {
            $course = Course::create([
                'title' => $request->title,
                'description' => $request->description,
                'category' => $request->category,
                'feature_video' => $request->feature_video,
            ]);

            foreach ($request->modules as $moduleData) {
                $module = $course->modules()->create([
                    'title' => $moduleData['title'],
                ]);

                foreach ($moduleData['contents'] as $contentData) {
                    $module->contents()->create($contentData);
                }
            }

            DB::commit();
            return redirect()->route('courses.index')->with('success', 'Course created successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors('Error: ' . $e->getMessage());
        }
    }

    public function modules($courseId)
    {
        $course = Course::with('modules.contents')->findOrFail($courseId);
        return view('courses.modules', compact('course'));
    }

    public function show($id)
    {
        $course = Course::with('modules.contents')->findOrFail($id);
        return view('courses.show', compact('course'));
    }
}
