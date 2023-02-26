<?php

namespace App\Http\Controllers;

use App\Models\Teachers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeachersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['title'] = 'Data Teachers';
        $data['q'] = $request->q;
        $data['rows'] = teachers::where('name_teachers', 'like', '%' . $request->q . '%')->get();
        return view('teachers.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data['title'] = 'Tambah teachers';
        $data['levels'] = ['admin' => 'Admin', 'teachers' => 'teachers'];
        return view('teachers.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_teachers' => 'required',
            'city' => 'required',
            'pob' => 'required',
            'dob' => 'required',
        ]);

        $teachers = new Teachers();
        $teachers->name_teachers = $request->name_teachers;
        $teachers->city = $request->city;
        $teachers->pob = $request->city;
        $teachers->dob = $request->dob;
        $teachers->save();
        return redirect('teachers')->with('success', 'Tambah Data Berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teachers  $teachers
     * @return \Illuminate\Http\Response
     */
    public function show(Teachers $teachers)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teachers  $teachers
     * @return \Illuminate\Http\Response
     */
    public function edit(Teachers $teachers)
    {
        $data['title'] = 'Ubah teachers';
        $data['row'] = $teachers;
        $data['levels'] = ['admin' => 'Admin', 'teachers' => 'teachers'];
        return view('teachers.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teachers  $teachers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teachers $teachers)
    {
        $request->validate([
            'name_teachers' => 'required',
            'city' => 'required',
            'pob' => 'required',
        ]);

        $teachers->name_teachers = $request->name_teachers;
        $teachers->city = $request->city;
        $teachers->pob = $request->pob;
        $teachers->dob = $request->dob;
        $teachers->save();
        return redirect('teachers')->with('success', 'Ubah Data Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teachers  $teachers
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teachers $teachers)
    {
        $teachers->delete();
        return redirect('teachers')->with('success', 'Hapus Data Berhasil');
    }
}