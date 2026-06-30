@extends('admin.layouts.master')

@section('contents')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('admin.users.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Users</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.users.index') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">User</a></div>
                <div class="breadcrumb-item">Update</div>

            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Update User</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.users.update', $user->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="">Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                                </div>

                                <div class="form-group">
                                    <label for="">Password <span class="text-danger">*</span></label>
                                    <input type="password" class="form-control" name="password">
                                </div>


                                <div class="form-group">
                                    <label for="">User Type <span class="text-danger">*</span></label>
                                    <select name="user_type" class="form-control">
                                        <option @selected($user->user_type == 'user') value="user">User</option>
                                        <option @selected($user->user_type == 'farmer') value="farmer">Farmer</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="">Status <span class="text-danger">*</span></label>
                                    <select name="status" class="form-control">
                                        <option @selected($user->status === 1) value="1">Active</option>
                                        <option @selected($user->status === 0) value="0">Inactive</option>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection

@push('scripts')
@endpush
