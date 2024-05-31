@extends('layouts.app')

@section('content')
    <section class="content pt-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Edit Gambar {{ $image }}</h3>
                            <a href="{{ route('admin.cars.edit', $car) }}" class="btn btn-success shadow-sm float-right">
                                <i class="fa fa-arrow-left"></i> Kembali
                            </a>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('admin.cars.update_image', ['car' => $car->id, 'image' => $image]) }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row border-bottom pb-4">
                                    <label for="{{ $image }}" class="col-sm-2 col-form-label">Gambar {{ $image }}</label>
                                    <div class="col-sm-12">
                                        <input type="file" name="{{ $image }}" class="form-control">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success">Simpan Gambar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
