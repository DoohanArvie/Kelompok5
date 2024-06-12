@extends('layouts.app')

@section('content')
    <!-- Main content -->
    <section class="content pt-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Edit Data</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show text-white" role="alert">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            <form action="{{ route('admin.settings.update', $setting->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                {{-- <input type="hidden" name="id" value="{{ $setting->id }}"> --}}
                                <div class="form-group row border-bottom pb-4">
                                    <label for="nama_perusahaan" class="col-sm-2 col-form-label">Nama Perusahaan</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control @error('nama_perusahaan') is-invalid @enderror" name="nama_perusahaan"
                                            value="{{ old('nama_perusahaan', $setting->nama_perusahaan) }}"
                                            id="nama_perusahaan">
                                        @error('nama_perusahaan')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row border-bottom pb-4">
                                    <label for="logo" class="col-sm-2 col-form-label">Logo</label>
                                    <div class="col-sm-12">
                                        <input type="file" class="form-control @error('logo') is-invalid @enderror" name="logo" id="logo">
                                        @error('logo')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row border-bottom pb-4">
                                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control @error('alamat') is-invalid @enderror" onkeyup="this.value = this.value.toUpperCase()" name="alamat"
                                            value="{{ old('alamat', $setting->alamat) }}" id="alamat">
                                        @error('alamat')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row border-bottom pb-4">
                                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email', $setting->email) }}" id="email">
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row border-bottom pb-4">
                                    <label for="phone" class="col-sm-2 col-form-label">Nomer Perusahaan</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone"
                                            value="{{ old('phone', $setting->phone) }}" id="phone">
                                        @error('phone')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row border-bottom pb-4">
                                    <label for="footer_description" class="col-sm-2 col-form-label">Footer
                                        Description</label>
                                    <div class="col-sm-12">
                                        <textarea name="footer_description" id="footer_description" class="form-control @error('footer_description') is-invalid @enderror" cols="30" rows="6">{{ old('footer_description', $setting->footer_description) }}</textarea>
                                        @error('footer_description')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row border-bottom pb-4">
                                    <label for="tentang_perusahaan" class="col-sm-2 col-form-label">Tentang
                                        Perusahaan</label>
                                    <div class="col-sm-12">
                                        <textarea name="tentang_perusahaan" id="tentang_perusahaan" class="form-control @error('tentang_perusahaan') is-invalid @enderror" cols="30" rows="6">{{ old('tentang_perusahaan', $setting->tentang_perusahaan) }}</textarea>
                                        @error('tentang_perusahaan')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row border-bottom pb-4">
                                    <label for="sejarah_perusahaan" class="col-sm-2 col-form-label">Sejarah
                                        Perusahaan</label>
                                    <div class="col-sm-12">
                                        <textarea name="sejarah_perusahaan" id="sejarah_perusahaan" class="form-control @error('sejarah_perusahaan') is-invalid @enderror" cols="30" rows="6">{{ old('sejarah_perusahaan', $setting->sejarah_perusahaan) }}</textarea>
                                        @error('sejarah_perusahaan')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row border-bottom pb-4">
                                    <label for="tentang_team" class="col-sm-2 col-form-label">Tentang Team</label>
                                    <div class="col-sm-12">
                                        <textarea name="tentang_team" id="tentang_team" class="form-control @error('tentang_team') is-invalid @enderror" cols="30" rows="6">{{ old('tentang_team', $setting->tentang_team) }}</textarea>
                                        @error('tentang_team')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row border-bottom pb-4">
                                    <label for="facebook" class="col-sm-2 col-form-label">Facebook</label>
                                    <div class="col-sm-12">
                                        <input type="text" placeholder="https://example.com" pattern="https://.*"
                                            class="form-control @error('facebook') is-invalid @enderror" name="facebook"
                                            value="{{ old('facebook', $setting->facebook) }}" id="facebook">
                                        @error('facebook')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row border-bottom pb-4">
                                    <label for="instagram" class="col-sm-2 col-form-label">Instagram</label>
                                    <div class="col-sm-12">
                                        <input type="text" placeholder="https://example.com" pattern="https://.*"
                                            class="form-control @error('instagram') is-invalid @enderror" name="instagram"
                                            value="{{ old('instagram', $setting->instagram) }}" id="instagram">
                                        @error('instagram')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row border-bottom pb-4">
                                    <label for="linkedin" class="col-sm-2 col-form-label">Linkedin</label>
                                    <div class="col-sm-12">
                                        <input type="text" placeholder="https://example.com" pattern="https://.*"
                                            class="form-control @error('linkedin') is-invalid @enderror" name="linkedin"
                                            value="{{ old('linkedin', $setting->linkedin) }}" id="linkedin">
                                        @error('linkedin')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row border-bottom pb-4">
                                    <label for="twitter" class="col-sm-2 col-form-label">twitter</label>
                                    <div class="col-sm-12">
                                        <input type="text" placeholder="https://example.com" pattern="https://.*"
                                            class="form-control @error('twitter') is-invalid @enderror" name="twitter"
                                            value="{{ old('twitter', $setting->twitter) }}" id="twitter">
                                        @error('twitter')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
