<?php

namespace App\Http\Controllers\Borrow;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Borrow;
use App\Student;
use App\Book;
use Illuminate\Http\Request;
use Session;

class BorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 5;

        if (!empty($keyword)) {
            $borrow = Borrow::where('student_id', 'LIKE', "%$keyword%")
				->orWhere('book_id', 'LIKE', "%$keyword%")
				->orWhere('borrow_date', 'LIKE', "%$keyword%")
				->orWhere('return_date', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $borrow = Borrow::paginate($perPage);
        }

        return view('borrow.borrow.index', compact('borrow'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('borrow.borrow.create');
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
        
        Borrow::create($requestData);

        Session::flash('flash_message', 'Borrow added!');

        return redirect('borrow/borrow');
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
        $borrow = Borrow::findOrFail($id);

        return view('borrow.borrow.show', compact('borrow'));
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
        $borrow = Borrow::findOrFail($id);

        return view('borrow.borrow.edit', compact('borrow'));
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
        
        $borrow = Borrow::findOrFail($id);
        $borrow->update($requestData);

        Session::flash('flash_message', 'Borrow updated!');

        return redirect('borrow/borrow');
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
        Borrow::destroy($id);

        Session::flash('flash_message', 'Borrow deleted!');

        return redirect('borrow/borrow');
    }
}
