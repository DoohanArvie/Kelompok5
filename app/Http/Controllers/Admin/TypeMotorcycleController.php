<?php

namespace App\Http\Controllers\Admin;

use App\Models\TypeMotorcycle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TypeMotorcycleRequest;

class TypeMotorcycleController extends Controller
{
    public function index()
    {
        $types = TypeMotorcycle::all();

        return view('admin.typemotorcycles.index', compact('types'));
    }

    public function create()
    {
        return view('admin.typemotorcycles.create');
    }

    public function store(TypeMotorcycleRequest $request)
    {
        TypeMotorcycle::create($request->validated());

        return redirect()->route('admin.typemotorcycles.index')->with([
            'message' => 'berhasil di buat',
            'alert-type' => 'success'
        ]);
    }

    public function edit(TypeMotorcycle $typemotorcycle)
    {
        return view('admin.typemotorcycles.edit', ['type' => $typemotorcycle]);
    }

    public function update(TypeMotorcycleRequest $request, TypeMotorcycle $typemotorcycle)
    {
        $typemotorcycle->update($request->validated());

        return redirect()->route('admin.typemotorcycles.index')->with([
            'message' => 'berhasil di edit',
            'alert-type' => 'info'
        ]);
    }

    public function destroy(TypeMotorcycle $typemotorcycle)
    {
        $typemotorcycle->delete();

        return redirect()->back()->with([
            'message' => 'berhasil di hapus',
            'alert-type' => 'danger'
        ]);
    }
}
