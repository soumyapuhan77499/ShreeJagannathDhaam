@extends('templeuser.layouts.app')

@section('styles')
@endsection

@section('content')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="left-content">
            <span class="main-content-title mg-b-0 mg-b-lg-1">Manage Ratha Yatra</span>
        </div>
        <div class="justify-content-center mt-2">
            <ol class="breadcrumb d-flex justify-content-between align-items-center">
                <li class="breadcrumb-item tx-15"><a href="javascript:void(0);">Dashboard</a></li>
            </ol>
        </div>
    </div>

    <!-- /breadcrumb -->
    @if (session('success'))
        <div id = 'Message' class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('danger'))
        <div id = 'Message' class="alert alert-danger">
            {{ session('danger') }}
        </div>
    @endif

    <!-- Live Video Section -->
    <div class="card mb-4">
        <div class="card-body d-flex justify-content-between align-items-center">
            <div>
                <h5>Live Video</h5>
                <p>Status:
                    <span class="badge {{ $status->live_video === 'active' ? 'bg-success' : 'bg-danger' }}">
                        {{ ucfirst($status->live_video) }}
                    </span>
                </p>
            </div>
            <form action="{{ route('rathayatra.toggleLiveVideo') }}" method="POST">
                @csrf
                <button type="submit"
                    class="btn btn-outline-{{ $status->live_video === 'active' ? 'danger' : 'success' }}">
                    {{ $status->live_video === 'active' ? 'Deactivate' : 'Activate' }}
                </button>
            </form>
        </div>
    </div>

    <!-- Ratha Yatra Section -->
    <div class="card">
        <div class="card-body d-flex justify-content-between align-items-center">
            <div>
                <h5>Ratha Yatra Section</h5>
                <p>Status:
                    <span class="badge {{ $status->section === 'active' ? 'bg-success' : 'bg-danger' }}">
                        {{ ucfirst($status->section) }}
                    </span>
                </p>
            </div>
            <form action="{{ route('rathayatra.toggleSection') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-outline-{{ $status->section === 'active' ? 'danger' : 'success' }}">
                    {{ $status->section === 'active' ? 'Deactivate' : 'Activate' }}
                </button>
            </form>
        </div>
    </div>

    <!-- End Row -->
@endsection

@section('scripts')
@endsection
