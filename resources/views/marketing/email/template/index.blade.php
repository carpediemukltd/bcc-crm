@extends('layout.appTheme')
@section('content')
<div class="position-relative iq-banner default">
    <div class="iq-navbar-header" style="height: 215px;">
        <div class="container-fluid iq-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="flex-wrap d-flex justify-content-between align-items-center">
                        <div>
                            <h1>Email Templates List</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="iq-header-img">
            <img src="{{asset('assets/images/dashboard/top-header.png')}}" alt="header" class="theme-color-default-img img-fluid w-100 h-100 animated-scaleX" loading="lazy">
        </div>
    </div>
</div>
<div class="content-inner pb-0 container-fluid" id="page_layout">
    <div>
        @include('alert_message')
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex justify-content-between">
                        <div class="header-title">
                            <p><a href="{{route('marketing-email-templates.create')}}" class="btn btn-success">Create New Template</a></p>

                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="email-templates-table" class="table table-striped dataTable no-footer" role="grid" aria-describedby="email-templates-table_info">
                                <thead>
                                    <tr class="ligth">
                                        <th class="sorting" tabindex="0" aria-controls="email-templates-table">Template Name</th>
                                        <th class="sorting" tabindex="0" aria-controls="email-templates-table">Email Subject</th>
                                        <th class="sorting" tabindex="0" aria-controls="email-templates-table">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @include('marketing.email.template.pagination')
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Deletion Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this record?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <form id="deleteForm" method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Trigger modal for deletion
    $(document).on('click', '.delete-btn', function() {
        var templateId = $(this).data('template-id');
        var deleteUrl = window.location.origin + "/marketing-email-templates/" + templateId;
        $('#deleteForm').attr('action', deleteUrl);
        $('#deleteModal').modal('show');
    });
</script>

@endsection