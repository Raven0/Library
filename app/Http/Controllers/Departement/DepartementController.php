<?php

namespace App\Http\Controllers\Departement;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Departement;
use Illuminate\Http\Request;
use Session;

class DepartementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $departement = Departement::where('name', 'LIKE', "%$keyword%")
				->orWhere('type', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $departement = Departement::paginate($perPage);
        }

        return view('departement.departement.index', compact('departement'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('departement.departement.create');
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
        
        Departement::create($requestData);

        Session::flash('flash_message', 'Departement added!');

        return redirect('departement/departement');
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
        $departement = Departement::findOrFail($id);

        return view('departement.departement.show', compact('departement'));
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
        $departement = Departement::findOrFail($id);

        return view('departement.departement.edit', compact('departement'));
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
        
        $departement = Departement::findOrFail($id);
        $departement->update($requestData);

        Session::flash('flash_message', 'Departement updated!');

        return redirect('departement/departement');
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
        Departement::destroy($id);

        Session::flash('flash_message', 'Departement deleted!');

        return redirect('departement/departement');
    }
}
