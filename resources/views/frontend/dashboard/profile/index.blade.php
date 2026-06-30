@extends('frontend.dashboard.index')
@push('styles')
    <style>
        .submit-button {

            background: #02ba43 no-repeat right 24px center;
            color: #fff;
            border-color: #02ba43;
            font-size: 1rem;
            border-radius: 30px;
            box-shadow: 0px 3px 4px #cbcbcb;
            text-align: center;
            max-width: 130px;
            width: 100%;
            height: 40px;
        }
    </style>
@endpush
@section('content')
    <section id="dashboard">
        <div class="container">
            <div class="row">
                {{-- <div class="col-lg-3">
                    @include('frontend.dashboard.sidebar')
                </div> --}}
                <div class="col-lg-12">
                    <div class="dashboard_content">
                        <div class="my_listing">
                            <h4>basic information</h4>
                            <form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-xl-8 col-md-12">
                                        <div class="row">
                                            <div class="col-xl-6 col-md-6 mb-3">
                                                <div class="my_listing_single form-group ">
                                                    <label>Name <span class="text-danger">*</span></label>
                                                    <div class="input_area">
                                                        <input type="text" class="form-control" placeholder="Name"
                                                            name="name" value="{{ $user->name }}" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6 mb-3">
                                                <div class="my_listing_single form-group">
                                                    <label>phone <span class="text-danger">*</span></label>
                                                    <div class="input_area">
                                                        <input type="text" class="form-control" placeholder="1234"
                                                            name="phone" value="{{ $user->phone }}" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 mb-3">
                                                <div class="my_listing_single form-group">
                                                    <label>email <span class="text-danger">*</span></label>
                                                    <div class="input_area">
                                                        <input type="Email" class="form-control" placeholder="Email"
                                                            name="email" value="{{ $user->email }}" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 mb-3">
                                                <div class="my_listing_single form-group">
                                                    <label>Address <span class="text-danger">*</span></label>
                                                    <div class="input_area">
                                                        <input type="text" class="form-control" placeholder="Address"
                                                            name="address" value="{{ $user->address }}" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 mb-3">
                                                <div class="my_listing_single form-group">
                                                    <label>About Me <span class="text-danger">*</span></label>
                                                    <div class="input_area">
                                                        <textarea cols="3" class="form-control" rows="3" placeholder="Your Text" name="about" required>{!! $user->about !!}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 mb-3">
                                                <div class="my_listing_single form-group">
                                                    <label>Website</label>
                                                    <div class="input_area">
                                                        <input type="text" class="form-control" placeholder="Website"
                                                            name="website" value="{{ $user->website }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 mb-3">
                                                <div class="my_listing_single form-group">
                                                    <label>Facebook</label>
                                                    <div class="input_area">
                                                        <input type="text" class="form-control" placeholder="Facebook"
                                                            name="fb_link" value="{{ $user->fb_link }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 mb-3">
                                                <div class="my_listing_single form-group">
                                                    <label>X</label>
                                                    <div class="input_area">
                                                        <input type="text" class="form-control" placeholder="X"
                                                            name="x_link" value="{{ $user->x_link }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 mb-3">
                                                <div class="my_listing_single form-group">
                                                    <label>Linkedin</label>
                                                    <div class="input_area">
                                                        <input type="text" class="form-control" placeholder="Linkedin"
                                                            name="in_link" value="{{ $user->in_link }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 mb-3">
                                                <div class="my_listing_single form-group">
                                                    <label>Whatsapp</label>
                                                    <div class="input_area">
                                                        <input type="text" class="form-control" placeholder="Whatsapp"
                                                            name="wa_link" value="{{ $user->wa_link }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 mb-3">
                                                <div class="my_listing_single form-group">
                                                    <label>Instragram</label>
                                                    <div class="input_area">
                                                        <input type="text" class="form-control"
                                                            placeholder="Instragram" name="insta_link"
                                                            value="{{ $user->insta_link }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-5">
                                        <div class="my_listing_single">
                                            <label for="">Avatar</label>
                                            <div class="profile_pic_upload">
                                                <img src="{{ asset($user->avatar) }}" alt="img"
                                                    class="imf-fluid w-100">
                                                <input type="file" class="form-control" name="avatar">
                                                <input type="hidden" name="old_avatar" value="{{ $user->avatar }}">

                                            </div>
                                        </div>

                                        <div class="my_listing_single">
                                            <label for="">Banner</label>

                                            <div class="profile_pic_upload">

                                                <img src="{{ asset($user->banner) }}" alt="img"
                                                    class="imf-fluid w-100">
                                                <input type="file" class="form-control" name="banner">
                                                <input type="hidden" name="old_banner" value="{{ $user->banner }}">

                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-12 mt-3">
                                    <button type="submit" class="read_btn submit-button">Update</button>
                                </div>
                            </form>
                        </div>
                        <div class="my_listing list_mar mt-3">
                            <h4 class="mt-3 mb-3">change password</h4>
                            <form action="{{ route('user.profile-password.update') }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-xl-4 col-md-6 mb-3">
                                        <div class="my_listing_single">
                                            <label>current password</label>
                                            <div class="input_area">
                                                <input type="password" class="form-control"
                                                    placeholder="Current Password" name="current_password">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-6 mb-3">
                                        <div class="my_listing_single">
                                            <label>new password</label>
                                            <div class="input_area">
                                                <input type="password" class="form-control" placeholder="New Password"
                                                    name="password">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 mb-3">
                                        <div class="my_listing_single ">
                                            <label>confirm password</label>
                                            <div class="input_area">
                                                <input type="password" class="form-control"
                                                    placeholder="Confirm Password" name="password_confirmation">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 mt-3">
                                        <button type="submit" class="read_btn submit-button">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
