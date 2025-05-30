@extends('templeuser.layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
@endsection

@section('content')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="left-content">
            <span class="main-content-title mg-b-0 mg-b-lg-1">Add APK</span>
        </div>
        <div class="justify-content-center mt-2">
            <ol class="breadcrumb d-flex justify-content-between align-items-center">
                <li class="breadcrumb-item tx-15">
                    <div class="text-end">
                        <a href="{{ url('templeuser/manage-apk') }}" class="btn btn-primary text-white">
                            Manage APK
                        </a>
                    </div>
                </li>
                <li class="breadcrumb-item tx-15"><a href="javascript:void(0);">Dashboard</a></li>
            </ol>
        </div>
    </div>
    <div class="progress mb-4" style="height: 25px; display: none;" id="uploadProgressWrapper">
        <div class="progress-bar progress-bar-striped progress-bar-animated bg-success"
             id="uploadProgressBar"
             role="progressbar"
             style="width: 0%;">
            0%
        </div>
    </div>
    

    <div class="row">
        <div class="col-lg-12">
            <div class="card custom-card border-0 shadow-sm">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0"><i class="fa fa-list-alt me-2"></i>Add APK</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('saveApk') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row gy-3">
                            <div class="col-md-6">
                                <label for="version" class="form-label">Version</label>
                                <input type="text" name="version" id="version" class="form-control"
                                    placeholder="Enter APK Version" required>
                            </div>
                            <div class="col-md-6">
                                <label for="apk_file" class="form-label">Upload APK</label>
                                <input type="file" name="apk_file" id="apk_file" class="form-control" accept=".apk"
                                    required>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-12 text-end">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-save me-1"></i>Submit
                                    </button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Show success message -->
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ session('success') }}',
                confirmButtonColor: '#3085d6'
            });
        </script>
    @endif

    <!-- Show error message -->
    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: '{{ session('error') }}',
                confirmButtonColor: '#d33'
            });
        </script>
    @endif

    <!-- Show validation errors -->
    @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'warning',
                title: 'Validation Error',
                html: `{!! implode('<br>', $errors->all()) !!}`,
                confirmButtonColor: '#f39c12'
            });
        </script>
    @endif
@endsection
