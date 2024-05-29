@extends('frontend.layout')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Profile Settings') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" id="profileForm">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">{{ __('Name') }}</label>
                            <input type="text" id="name" name="name" class="form-control bg-light" value="{{ Auth::user()->name }}" required disabled>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email') }}</label>
                            <div class="input-group">
                                <input type="email" id="email" name="email" class="form-control bg-light" value="{{ Auth::user()->email }}" required disabled>
                                <span class="input-group-text">
                                    @if (!Auth::user()->hasVerifiedEmail())
                                        <a href="{{ route('verification.notice') }}">Verify Email</a>
                                    @else
                                        <div class="container-fluidw"><i class="fas fa-check-circle text-success"></i> Verified</div>
                                    @endif
                                </span>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">{{ __('Phone Number') }}</label>
                            <input type="text" id="phone" name="phone" class="form-control" value="{{ $user->phone ?? '' }}" {{ $user->hasUpdatedProfile() ? 'disabled' : 'required' }}>
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">{{ __('Address') }}</label>
                            <textarea id="address" name="address" class="form-control" rows="4" {{ $user->hasUpdatedProfile() ? 'disabled' : 'required' }}>{{ $user->address ?? '' }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="ktp" class="form-label">{{ __('KTP') }}</label>
                            <input type="file" id="ktp" name="ktp" class="form-control" accept=".pdf,.jpg,.jpeg,.png" {{ $user->hasUpdatedProfile() ? 'disabled' : 'required' }}>
                            @if ($user->ktp)
                            <div>
                                <a href="{{ Storage::url('ktp/' .$user->ktp) }}">{{ $user->ktp }}</a>
                            </div>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="sim" class="form-label">{{ __('SIM') }}</label>
                            <input type="file" id="sim" name="sim" class="form-control form-control-lg" accept=".pdf,.jpg,.jpeg,.png" {{ $user->hasUpdatedProfile() ? 'disabled' : 'required' }}>
                            @if ($user->sim)
                                <div>
                                    <a href="{{ Storage::url('sim/' . $user->sim) }}">{{ $user->sim }}</a>
                                </div>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary">{{ __('Save Changes') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@emretulek/jbvalidator"></script>
<script>
    $('#profileForm').validator();
</script>
@endsection
