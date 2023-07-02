@extends('layouts.app', ['activePage' => 'new-entry', 'titlePage' => __('New Form Entry')])

@section('title', 'New Entry');

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10" >
                <div class="card" style="margin-top:100px;">
                    {{-- <div class="card-header">{{ __('Create Form Entry') }}</div> --}}
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Create Form Entry</h4>
                        <p class="card-category"> Here is the list of form entries performed.</p>
                      </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('form-entry.store') }}" enctype="multipart/form-data">
                            @csrf
                    <br>
                    <br>
                            <div class="form-row ">
                                <div class="form-group col">
                                    <label for="profile_name">{{ __('Profile Name') }}</label>
                                    <input type="text" name="profile_name" id="profile_name" class="form-control" value="{{ old('profile_name') }}"required>
                                    @error('profile_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group col">
                                    <label for="email">{{ __('Email') }}</label>
                                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}"required>
                                    @error('Email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        <br>
                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="address">{{ __('Address') }}</label>
                                    <textarea name="address" id="address" class="form-control" value="{{ old('address') }}" rows="4"></textarea>
                                    @error('address')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col row">
                                    <div class="col row">
                                        <div id="previewContainer" class=" col-md-4" style=""></div>
                                        <div class="col mb-4">
                                        <label for="avatarInput" style="padding-top:60px; margin-left:-10px;" class="form-label text-primary">Choose Avatar   
                                            <input type="file" class="form-control" value="{{ old('profile_image') }}" id="avatarInput" style="border: 2px;"name="profile_image" accept="image/*">
                                        </label>
                                        </div>
                                        @error('profile_image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
                            </div>

                            </div>
                            <br>
                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="pan_card_number">{{ __('PAN Card Number') }}</label>
                                    <input type="text" name="pan_card_number" id="pan_card_number" value="{{ old('pan_card_number') }}" maxlength="10" class="form-control" required>
                                    @error('pan_card_number')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group col">
                                    <label for="aadhar_card_number">{{ __('Aadhar Card Number') }}</label>
                                    <input type="text" name="aadhar_card_number" id="aadhar_card_number" value="{{ old('aadhar_card_number') }}" maxlength="12" class="form-control" required>
                                    @error('aadhar_card_number')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
    // Preview avatar image
    $('#previewContainer').html('<img src="/default-avatar.png" class="img-thumbnail" style="width: 100px;border-radius:100px;padding-top:0px;    margin-top: -10px;" alt="Avatar Preview">');
    $('#avatarInput').change(function() {
      var file = $(this).prop('files')[0];
  
      if (file) {
        var reader = new FileReader();
  
        reader.onload = function(e) {
          $('#previewContainer').html('<img src="' + e.target.result + '" class="img-thumbnail" style="width: 100px;height: 100px;border-radius:500px;padding-top:0px;margin-top: -10px;"alt="Avatar Preview">');
        };
  
        reader.readAsDataURL(file);
      }
    });
    }  );
        
        // createPageImageHandler();
    </script>
@endsection