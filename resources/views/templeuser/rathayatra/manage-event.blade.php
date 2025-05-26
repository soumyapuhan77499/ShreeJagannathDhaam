@extends('templeuser.layouts.app')

@section('styles')
    <!-- Data table css -->
    <link href="{{ asset('assets/plugins/datatable/css/dataTables.bootstrap5.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/datatable/css/buttons.bootstrap5.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/datatable/responsive.bootstrap5.css') }}" rel="stylesheet" />

    <!-- INTERNAL Select2 css -->
    <link href="{{ asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="left-content">
            <span class="main-content-title mg-b-0 mg-b-lg-1">Manage Event</span>
        </div>
        <div class="justify-content-center mt-2">
            <ol class="breadcrumb d-flex justify-content-between align-items-center">
                <a href="{{ route('rathayatra.addEvent') }}" class="breadcrumb-item tx-15 btn btn-warning">Add Event</a>
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
    <!-- Row -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card custom-card overflow-hidden">
                <div class="card-body">
                    <div class="table-responsive  export-table">
                        <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom">
                            <thead>
                                <tr>
                                    <th>SlNo</th>
                                    <th>Event Name</th>
                                    <th>Date</th>
                                    <th>Language</th>
                                    <th>Description</th>
                                    <th>Photos</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($events as $index => $event)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $event->event_name }}</td>
                                        <td>{{ $event->date }}</td>
                                        <td>{{ $event->language }}</td>
                                        <td>{{ Str::limit($event->description, 50) }}</td>
                                        <td>
                                            <button class="btn btn-info btn-sm"
                                                onclick="showPhotos({{ json_encode($event->photo) }})">View Photos</button>
                                        </td>
                                        <td>
                                            <button class="btn btn-warning btn-sm"
                                                onclick="openEditModal({{ $event }})">Edit</button>
                                            <button class="btn btn-danger btn-sm"
                                                onclick="confirmDelete({{ $event->id }})">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- View Photos Modal -->
    <div class="modal fade" id="photoModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content p-3">
                <h5>Event Photos</h5>
                <div id="photoGallery" class="d-flex flex-wrap gap-2"></div>
            </div>
        </div>
    </div>

    <!-- Edit Event Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form method="POST" id="editForm">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" id="edit_id">
                <div class="modal-content p-3">
                    <h5>Edit Event</h5>
                    <div class="form-group">
                        <label>Event Name</label>
                        <input type="text" name="event_name" id="edit_event_name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Date</label>
                        <input type="date" name="date" id="edit_date" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Language</label>
                        <select name="language" id="edit_language" class="form-control">
                            <option value="English">English</option>
                            <option value="Odia">Odia</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" id="edit_description" rows="4" class="form-control"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Update</button>
                </div>
            </form>
        </div>
    </div>

    <!-- End Row -->
@endsection

@section('scripts')
    <!-- Internal Data tables -->
    <script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/js/table-data.js') }}"></script>

    <!-- INTERNAL Select2 js -->
    <script src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
        setTimeout(function() {
            document.getElementById('Message').style.display = 'none';
        }, 3000);
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function showPhotos(photoJson) {
            const photos = JSON.parse(photoJson);
            let gallery = document.getElementById('photoGallery');
            gallery.innerHTML = '';
            photos.forEach(url => {
                let img = document.createElement('img');
                img.src = url;
                img.className = 'img-thumbnail';
                img.style.width = '150px';
                gallery.appendChild(img);
            });
            new bootstrap.Modal(document.getElementById('photoModal')).show();
        }

        function openEditModal(event) {
            document.getElementById('edit_id').value = event.id;
            document.getElementById('edit_event_name').value = event.event_name;
            document.getElementById('edit_date').value = event.date;
            document.getElementById('edit_language').value = event.language;
            document.getElementById('edit_description').value = event.description;

            // Set action URL dynamically with ID
            document.getElementById('editForm').action = `/templeuser/update-rathayatra-event/${event.id}`;

            new bootstrap.Modal(document.getElementById('editModal')).show();
        }

        function confirmDelete(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "This event will be deleted!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#aaa',
                confirmButtonText: 'Yes, delete it!'
            }).then(result => {
                if (result.isConfirmed) {
                    fetch(`/templeuser/delete-rathayatra-event/${id}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                'content'),
                            'Accept': 'application/json',
                            'Content-Type': 'application/json'
                        }
                    }).then(response => {
                        if (response.ok) {
                            Swal.fire('Deleted!', 'Event has been deleted.', 'success')
                                .then(() => window.location.reload());
                        } else {
                            Swal.fire('Error', 'Failed to delete the event.', 'error');
                        }
                    });
                }
            });
        }
    </script>
@endsection
