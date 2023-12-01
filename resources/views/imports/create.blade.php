@extends('layout.appTheme')
@section('content')
<div class="position-relative  iq-banner ">
    <div class="iq-navbar-header" style="height: 215px;">
        <div class="container-fluid iq-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="flex-wrap d-flex justify-content-between align-items-center">
                        <div>
                            <p>Import Contacts</p>
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
<div class="content-inner container-fluid pb-0" id="page_layout">
    <div>
        @include('alert_message')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Import Contacts</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        @if ($errors->has('success'))
                        <span class="text-success">{{ $errors->first('success') }}</span>
                        @endif
                        <form action="{{route('processImportContacts')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-label" for="title">Choose Excel File:</label>
                                        <input type="file" class="form-control" id="file" name="file" accept=".xlsx" required>
                                        @if ($errors->has('file'))
                                        <span class="text-danger">{{ $errors->first('file') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-label" for="deal_owner">Select Company</label>
                                        <select class="form-select" name="company">
                                            @foreach($companies as $company)
                                            <option value="{{$company->id}}">{{$company->name}}</option>
                                            @endforeach()
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col"><br /></div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="card-body inprogress-imports-section">
                        <div class="row">
                            <h4>Importing Files</h4>
                            <div class="col">
                                <table style="box-shadow: 1px 1px 3px 0px;" class="table table-striped dataTable no-footer inprogress-imports-table" role="grid" aria-describedby="user-list-table_info">
                                    <tbody></tbody>
                                </table>

                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="row">
                            <h4>Import History</h4>
                            <div class="col">
                                <table class="table table-striped dataTable no-footer" role="grid" aria-describedby="user-list-table_info">
                                    <thead>
                                        <tr class="ligth">
                                            <th class="sorting" tabindex="0" aria-controls="user-list-table">#</th>
                                            <th class="sorting" tabindex="0" aria-controls="user-list-table">File Name</th>
                                            <th class="sorting" tabindex="0" aria-controls="user-list-table">Records Imported</th>
                                            <th class="sorting" tabindex="0" aria-controls="user-list-table">Total Records</th>
                                            <th class="sorting" tabindex="0" aria-controls="user-list-table">Duplicates</th>
                                            <th class="sorting" tabindex="0" aria-controls="user-list-table">Upload By</th>
                                            <th class="sorting" tabindex="0" aria-controls="user-list-table">Status</th>
                                            <th class="sorting" tabindex="0" aria-controls="user-list-table">Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($user_imports))
                                        @foreach($user_imports as $key=>$value)
                                        <tr>
                                            <td>{{++$key}}</td>
                                            @if($value->is_file_deleted == '0')
                                            <td><a href="{{URL('/')}}{{'/csv/imports/'}}{{$value->file_name}}">{{$value->file_original_name}} </a>
                                                <?php if (($value->status == 'Completed' || $value->status == 'Failed') && $value->is_file_deleted == '0') { ?>
                                                    | <span data-bs-toggle="modal" data-bs-target="#delete-files-{{$value->id}}" class="cursor-pointer">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                        </svg>
                                                    </span>
                                                <?php } ?>
                                                <?php if ($value->status == 'Stopped') { ?>
                                                    | <span data-bs-toggle="modal" data-bs-target="#restart-import-{{$value->id}}" class="cursor-pointer">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-play" viewBox="0 0 16 16">
                                                            <path d="M10.804 8 5 4.633v6.734L10.804 8zm.792-.696a.802.802 0 0 1 0 1.392l-6.363 3.692C4.713 12.69 4 12.345 4 11.692V4.308c0-.653.713-.998 1.233-.696l6.363 3.692z" />
                                                        </svg>
                                                    </span>
                                                <?php } ?>
                                            </td>
                                            @else
                                            <td>{{$value->file_original_name}}</td>
                                            @endif
                                            <td>{{$value->records_imported}}</td>
                                            <td>{{$value->records}}</td>
                                            <td>{{$value->duplicate_records}}</td>
                                            <td>{{$value->user->full_name}} ({{ucfirst($value->user->role)}})</td>
                                            <td>{{$value->status}}</td>
                                            <td>{{$value->updated_at}}</td>
                                        </tr>
                                        <div class="modal fade" id="delete-files-{{$value->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdrop" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-body px-4 py-4">
                                                        <form action="{{route('importFilesDelete', $value->id)}}" method="POST">
                                                            @method('delete')
                                                            @csrf()
                                                            <h3 class="text-center mb-4">Are you sure you want to delete file {{$value->file_original_name}}?</h3>
                                                            <div class="form-group mb-4">
                                                            </div>

                                                            <div class="text-center pb-2">
                                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No, Cancel</button>
                                                                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Yes, Delete it!</button>
                                                            </div>

                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="restart-import-{{$value->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdrop" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-body px-4 py-4">
                                                        <form action="{{route('resumeUserImport', $value->id)}}" method="POST">
                                                            @method('put')
                                                            @csrf()
                                                            <h3 class="text-center mb-4">Are you sure you want to Resume importing again?</h3>
                                                            <div class="form-group mb-4">
                                                            </div>

                                                            <div class="text-center pb-2">
                                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                                                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Yes, Proceed</button>
                                                            </div>

                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach

                                        @endif

                                    </tbody>

                                </table>
                                {{$user_imports->links()}}


                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="stop-importing" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdrop" aria-hidden="true">
    <!-- Modal Content -->
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body px-4 py-4">
                <form action="{{route('stopUserImport', 1)}}" class="stop-import-form" method="POST">
                    @method('put')
                    @csrf()
                    <input class="import-id-input" type="hidden" name="importId" value="">
                    <h3 class="text-center mb-4">Are you sure you want to stop importing ?</h3>
                    <div class="form-group mb-4">
                    </div>
                    <div class="text-center pb-2">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Yes, Stop!</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $(".inprogress-imports-section").hide();

        // Trigger modal on span click
        $(document).on('click', '.stop-importing-icon', function() {
            const importId = $(this).data('import-id');
            url = window.location.origin + "/stop-user-import/" + importId;
            $(".import-id-input").val(importId)
            $(`#stop-importing form.stop-import-form`).attr('action', url);

            // Show the modal
            $(`#stop-importing`).modal('show');
        });

        // Function to fetch in-progress imports from API
        function fetchInProgressImports() {
            $.ajax({
                url: '/api/contacts/import-inprogress', // replace with your actual API endpoint
                method: 'GET',
                success: function(response) {
                    updateInProgressImports(response);
                },
                error: function(error) {
                    console.error(error);
                }
            });
        }

        // Function to update the content based on API response
        function updateInProgressImports(data) {
            // Check if there are in-progress imports
            if (data.data.length > 0) {
                // Clear existing content
                $(".inprogress-imports-table tbody").empty();

                // Update the table with API data
                $.each(data.data, function(index, importData) {
                    const progressPercentage = ((importData.records_imported / importData.records) * 100).toFixed(1).replace(/\.0$/, '');

                    $(".inprogress-imports-table tbody").append(
                        `<tr>
                            <td>${index + 1}</td>
                            <td><a href="${importData.file_name}">${importData.file_original_name}</a></td>
                            <td class="records-stats">
                            <label for="file">Importing progress:</label>
                                <progress id="file" value="${progressPercentage}" max="100"> ${progressPercentage}% </progress>
                            </td>
                            <td class="file-upload-loader-parent">${importData.status=='Inprogress'?'<div class="file-upload-loader"></div>':'Pending'}</td>
                            <td>
                                <span data-import-id="${importData.id}" data-bs-toggle="modal" data-bs-target="#stop-importing-${importData.id}" class="cursor-pointer stop-importing-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                </span>
                            </td>
                        </tr>`
                    );
                });

                // Display the table
                $(".inprogress-imports-table").show();
                $(".inprogress-imports-section").show();
            } else {
                // No in-progress imports, hide the table or show a message
                $(".inprogress-imports-table").hide();
                $(".inprogress-imports-section").hide();

            }
        }

        // Fetch in-progress imports on document ready
        fetchInProgressImports();

        // Set an interval to fetch in-progress imports every 5 seconds
        setInterval(fetchInProgressImports, 50000);
    });
</script>
@endsection