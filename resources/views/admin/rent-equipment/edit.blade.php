@extends('admin.layouts.master')

@section('contents')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('admin.rent-equipment.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Rent Equipment</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard.index') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('admin.rent-equipment.index') }}">Rent Equipment</a></div>
                <div class="breadcrumb-item">Update</div>

            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Update Rent Equipment</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.rent-equipment.update', $equipment->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Image <span class="text-danger">*</span></label>
                                            <div id="image-preview" class="image-preview">
                                                <label for="image-upload" id="image-label">Choose File</label>
                                                <input type="file" name="image" id="image-upload" />
                                                <input type="hidden" name="old_image" value="{{ $equipment->image }}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="">Title <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="title"
                                        value="{{ $equipment->title }}" required>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Location <span class="text-danger">*</span></label>
                                            <select class="form-control" name="location" required>
                                                <option value="">Select</option>
                                                @foreach ($locations as $location)
                                                    <option @selected($location->id === $equipment->location_id) value="{{ $location->id }}">
                                                        {{ $location->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Price/day <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="price_per_day"
                                                value="{{ $equipment->price_per_day }}" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="">Price/week <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="price_per_week"
                                            value="{{ $equipment->price_per_week }}" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Address <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="address"
                                                value="{{ $equipment->address }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Description <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="description"
                                                value="{{ $equipment->description }}" required>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Phone <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="phone"
                                                value="{{ $equipment->phone }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Email <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="email"
                                                value="{{ $equipment->email }}" required>
                                        </div>
                                    </div>


                                </div>
                                <div class="form-group">
                                    <label for="">Feature <span class="text-danger">*</span></label>
                                    <textarea name="feature" class="summernote" required> {{ $equipment->feature }}</textarea>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Status <span class="text-danger">*</span></label>
                                            <select name="status" class="form-control" required>
                                                <option @selected($equipment->status === 1) value="1">Active</option>
                                                <option @selected($equipment->status === 0) value="0">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Is Featured <span class="text-danger"></span></label>
                                            <select name="is_featured" class="form-control" required>
                                                <option @selected($equipment->is_featured === 0) value="0">No</option>
                                                <option @selected($equipment->is_featured === 1) value="1">Yes</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Is Available <span class="text-danger"></span></label>
                                            <select name="is_available" class="form-control" required>
                                                <option @selected($equipment->is_featured === 0) value="0">No</option>
                                                <option @selected($equipment->is_featured === 1) value="1">Yes</option>
                                            </select>
                                        </div>
                                    </div>
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
    <script>
        $(document).ready(function() {
            $('.image-preview').css({
                'background-image': 'url({{ asset($equipment->image) }})',
                'background-size': 'cover',
                'background-position': 'center center'
            });
        })
    </script>
@endpush
