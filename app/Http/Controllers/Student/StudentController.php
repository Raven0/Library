<?php

namespace App\Http\Controllers\Student;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Student;
use App\Departement;
use Illuminate\Http\Request;
use Session;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 4;

        if (!empty($keyword)) {
            $student = Student::where('name', 'LIKE', "%$keyword%")
				->orWhere('departement_id', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $student = Student::paginate($perPage);
        }

        return view('student.student.index', compact('student'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $var = Departement::all();
        return view('student.student.create')->with('jurusan', $var);;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        Student::create($requestData);

        Session::flash('flash_message', 'Student added!');

        return redirect('student/student');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $student = Student::findOrFail($id);
        $vars = Student::all();
        return view('student.student.show')->with(compact('student'))->with(compact('vars'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $bismillah = Student::find($id);
        $var = Departement::all();
        return view('student.student.edit')->with('student', $bismillah)->with('jurusan', $var);
        
        /*$student = Student::findOrFail($id);
        $vars = Student::all();
        return view('student.student.edit')->with(compact('student'))->with(compact('vars'));*/
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        
        $requestData = $request->all();
        
        $student = Student::findOrFail($id);
        $student->update($requestData);

        Session::flash('flash_message', 'Student updated!');

        return redirect('student/student');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Student::destroy($id);

        Session::flash('flash_message', 'Student deleted!');

        return redirect('student/student');
    }
}
