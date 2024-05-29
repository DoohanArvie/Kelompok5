<?php

namespace App\Http\Controllers\Admin;

use App\Models\Motorcycle;
use App\Models\TypeMotorcycle;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Admin\MotorcycleRequest;

class MotorcycleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $motorcycles = Motorcycle::get();

        return view('admin.motorcycles.index', compact('motorcycles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $statuses = Motorcycle::statuses();
        $types = TypeMotorcycle::get(['id','nama']);

        return view('admin.motorcycles.create', compact('statuses','types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MotorcycleRequest $request)
    {
        if($request->validated()) {
            $image = $request->file('image')->store(
                'motorcycles/images', 'public'
            );
            $slug = Str::slug($request->nama_motor, '-');

            Motorcycle::create($request->except('image') + ['image' => $image, 'slug' => $slug]);
        }

        return redirect()->route('admin.motorcycles.index')->with([
            'message' => 'Motorcycle berhasil dibuat',
            'alert-type' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $motorcycle = Motorcycle::findOrFail($id);
        return view('admin.motorcycles.show', compact('motorcycle'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Motorcycle $motorcycle)
    {
        $statuses = Motorcycle::statuses();
        $types = TypeMotorcycle::get(['id','nama']);

        return view('admin.motorcycles.edit', compact('motorcycle','types','statuses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MotorcycleRequest $request, Motorcycle $motorcycle)
    {
        if($request->validated()){
            $slug = Str::slug($request->nama_motor, '-');
            if($request->image) {
                File::delete('storage/' . $motorcycle->image);
                $image = $request->file('image')->store(
                    'motorcycles/images', 'public'
                );
                $motorcycle->update($request->except('image') + ['image' => $image, 'slug' => $slug]);
            }else {
                $motorcycle->update($request->validated() + ['slug' => $slug]);
            }
        }

        return redirect()->route('admin.motorcycles.index')->with([
            'message' => 'Motorcycle berhasil diedit',
            'alert-type' => 'info'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Motorcycle $motorcycle)
    {
        File::delete('storage/' . $motorcycle->image);
        $motorcycle->delete();

        return redirect()->back()->with([
            'message' => 'Motorcycle berhasil dihapus',
            'alert-type' => 'danger'
        ]);
    }
}
