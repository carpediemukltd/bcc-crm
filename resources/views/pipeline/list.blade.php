@extends('layout.appTheme')
@section('content')

    <div class="position-relative iq-banner default">
        <div class="iq-navbar-header" style="height: 215px;">
            <div class="container-fluid iq-container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="flex-wrap d-flex justify-content-between align-items-center">
                            <div>
                                <h1>Pipelines</h1>
                                <p>Experience a simple yet powerful way to build Dashboards.</p>
                            </div>
                            {{-- <div>
                                <a href="{{ route('pipeline.add') }}" class="btn btn-link btn-soft-light">
                                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg" class="icon-28">
                                        <path d="M12 4V20M20 12H4" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                    Add New Pipeline
                                </a>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="iq-header-img">
                <img src="{{ asset('assets/images/dashboard/top-header.png') }}" alt="header"
                    class="theme-color-default-img img-fluid w-100 h-100 animated-scaleX" loading="lazy">

            </div>
        </div>
    </div>
    <div class="content-inner pb-0 container-fluid" id="page_layout">
        <div>
            @include('alert_message')
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">List of Pipelines</h4>
                            </div>
                        </div>
                        <div class="row" id="show_loading" style="display: none;">
                            <div class="col-md-2">
                                <div class="preloader-dot-loading">
                                    <div class="cssload-loading"><i></i><i></i><i></i><i></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div id="user-list-table_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                    <div class="table-responsive my-3">
                                        <table id="user-list-table" class="table table-striped dataTable no-footer"
                                            role="grid" data-toggle="" aria-describedby="user-list-table_info">
                                            <thead>
                                                <tr class="ligth">
                                                    <th width="100%" class="sorting" tabindex="0"
                                                        aria-controls="user-list-table">Title</th>
                                                    <th class="sorting text-center" tabindex="0"
                                                        aria-controls="user-list-table">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody id="control-group">
                                                @if (isset($pipelines))
                                                    @foreach ($pipelines as $rec)
                                                        <tr class="odd" id="{{ $rec->id }}">
                                                            <td style="widh:60%;">
                                                                <div id="show_text_{{ $rec->id }}">{{ $rec->title }}
                                                                </div>
                                                                <div id="show_edit_text_{{ $rec->id }}"
                                                                    style="display: none;">
                                                                    <input type="text" class="form-control"
                                                                        id="pipeline_{{ $rec->id }}"
                                                                        name="pipeline_{{ $rec->id }}"
                                                                        value="{{ $rec->title }}" />
                                                                </div>
                                                                <br />
                                                                <div id="loading_{{ $rec->id }}"
                                                                    style="display: none;">
                                                                </div>
                                                            </td>
                                                            <td class="text-center">
                                                                <a href="javascript:void(0)"
                                                                    onclick="showEditOption('{{ $rec->id }}');">
                                                                    <svg fill="none" xmlns="http://www.w3.org/2000/svg"
                                                                        class="icon-32" width="32" height="32"
                                                                        viewBox="0 0 32 32">
                                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                                            d="M9.3764 20.0279L18.1628 8.66544C18.6403 8.0527 18.8101 7.3443 18.6509 6.62299C18.513 5.96726 18.1097 5.34377 17.5049 4.87078L16.0299 3.69906C14.7459 2.67784 13.1541 2.78534 12.2415 3.95706L11.2546 5.23735C11.1273 5.39752 11.1591 5.63401 11.3183 5.76301C11.3183 5.76301 13.812 7.76246 13.8651 7.80546C14.0349 7.96671 14.1622 8.1817 14.1941 8.43969C14.2471 8.94493 13.8969 9.41792 13.377 9.48242C13.1329 9.51467 12.8994 9.43942 12.7297 9.29967L10.1086 7.21422C9.98126 7.11855 9.79025 7.13898 9.68413 7.26797L3.45514 15.3303C3.0519 15.8355 2.91395 16.4912 3.0519 17.1255L3.84777 20.5761C3.89021 20.7589 4.04939 20.8879 4.24039 20.8879L7.74222 20.8449C8.37891 20.8341 8.97316 20.5439 9.3764 20.0279ZM14.2797 18.9533H19.9898C20.5469 18.9533 21 19.4123 21 19.9766C21 20.5421 20.5469 21 19.9898 21H14.2797C13.7226 21 13.2695 20.5421 13.2695 19.9766C13.2695 19.4123 13.7226 18.9533 14.2797 18.9533Z"
                                                                            fill="currentColor"></path>
                                                                    </svg>
                                                                </a>
                                                                <a href="javascript:void(0)"
                                                                    onclick="DeleteConfirm('{{ $rec->id }}','{{ $rec->title }}');">
                                                                    <svg fill="none" xmlns="http://www.w3.org/2000/svg"
                                                                        width="24" height="24" viewBox="0 0 24 24">
                                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                                            d="M20.2871 5.24297C20.6761 5.24297 21 5.56596 21 5.97696V6.35696C21 6.75795 20.6761 7.09095 20.2871 7.09095H3.71385C3.32386 7.09095 3 6.75795 3 6.35696V5.97696C3 5.56596 3.32386 5.24297 3.71385 5.24297H6.62957C7.22185 5.24297 7.7373 4.82197 7.87054 4.22798L8.02323 3.54598C8.26054 2.61699 9.0415 2 9.93527 2H14.0647C14.9488 2 15.7385 2.61699 15.967 3.49699L16.1304 4.22698C16.2627 4.82197 16.7781 5.24297 17.3714 5.24297H20.2871ZM18.8058 19.134C19.1102 16.2971 19.6432 9.55712 19.6432 9.48913C19.6626 9.28313 19.5955 9.08813 19.4623 8.93113C19.3193 8.78413 19.1384 8.69713 18.9391 8.69713H5.06852C4.86818 8.69713 4.67756 8.78413 4.54529 8.93113C4.41108 9.08813 4.34494 9.28313 4.35467 9.48913C4.35646 9.50162 4.37558 9.73903 4.40755 10.1359C4.54958 11.8992 4.94517 16.8102 5.20079 19.134C5.38168 20.846 6.50498 21.922 8.13206 21.961C9.38763 21.99 10.6811 22 12.0038 22C13.2496 22 14.5149 21.99 15.8094 21.961C17.4929 21.932 18.6152 20.875 18.8058 19.134Z"
                                                                            fill="currentColor" />
                                                                    </svg>
                                                                </a>
                                                                <div id="save_rights_{{ $rec->id }}"
                                                                    style="display:none;float: right;">

                                                                    <a href="javascript:void(0)"
                                                                        onclick="cancelEdit('{{ $rec->id }}');">
                                                                        <svg fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            width="32" height="32"
                                                                            viewBox="0 0 32 32">
                                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                                d="M7.67 1.99927H16.34C19.73 1.99927 22 4.37927 22 7.91927V16.0903C22 19.6203 19.73 21.9993 16.34 21.9993H7.67C4.28 21.9993 2 19.6203 2 16.0903V7.91927C2 4.37927 4.28 1.99927 7.67 1.99927ZM15.01 14.9993C15.35 14.6603 15.35 14.1103 15.01 13.7703L13.23 11.9903L15.01 10.2093C15.35 9.87027 15.35 9.31027 15.01 8.97027C14.67 8.62927 14.12 8.62927 13.77 8.97027L12 10.7493L10.22 8.97027C9.87 8.62927 9.32 8.62927 8.98 8.97027C8.64 9.31027 8.64 9.87027 8.98 10.2093L10.76 11.9903L8.98 13.7603C8.64 14.1103 8.64 14.6603 8.98 14.9993C9.15 15.1693 9.38 15.2603 9.6 15.2603C9.83 15.2603 10.05 15.1693 10.22 14.9993L12 13.2303L13.78 14.9993C13.95 15.1803 14.17 15.2603 14.39 15.2603C14.62 15.2603 14.84 15.1693 15.01 14.9993Z"
                                                                                fill="currentColor" />
                                                                        </svg>
                                                                    </a>

                                                                    <a href="javascript:void(0)"
                                                                        onclick="saveEdited('{{ $rec->id }}');">
                                                                        <svg fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            class="icon-32" width="32" height="32"
                                                                            viewBox="0 0 32 32">
                                                                            <path
                                                                                d="M21.4354 2.58198C20.9352 2.0686 20.1949 1.87734 19.5046 2.07866L3.408 6.75952C2.6797 6.96186 2.16349 7.54269 2.02443 8.28055C1.88237 9.0315 2.37858 9.98479 3.02684 10.3834L8.0599 13.4768C8.57611 13.7939 9.24238 13.7144 9.66956 13.2835L15.4329 7.4843C15.723 7.18231 16.2032 7.18231 16.4934 7.4843C16.7835 7.77623 16.7835 8.24935 16.4934 8.55134L10.72 14.3516C10.2918 14.7814 10.2118 15.4508 10.5269 15.9702L13.6022 21.0538C13.9623 21.6577 14.5826 22 15.2628 22C15.3429 22 15.4329 22 15.513 21.9899C16.2933 21.8893 16.9135 21.3558 17.1436 20.6008L21.9156 4.52479C22.1257 3.84028 21.9356 3.09537 21.4354 2.58198Z"
                                                                                fill="currentColor"></path>
                                                                        </svg>
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="row">

                                        <div class="col">
                                            <button type="button" class="btn btn-success btn-sm btn-info addClickrBtn"
                                                style="float:right;">
                                                <span class="btn-inner">
                                                    <svg width="28" height="28" viewBox="0 0 24 24"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg"
                                                        class="icon-28">
                                                        <path d="M12 4V20M20 12H4" stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                </span>
                                                Add New
                                            </button>
                                        </div>
                                    </div>

                                    <div class="row align-items-center pagination">
                                        <div class="col-md-6">
                                            <!-- nothing happend -->
                                        </div>
                                        <div class="col-md-6">
                                            {!! $pipelines->links('vendor.pagination.custom') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdrop" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body px-4 py-4">
                    <form action="#" autocomplete="off">
                        <h3 class="text-center mb-4">Are you sure you want to delete?</h3>
                        <div class="form-group mb-4">
                            <label class="form-label">Enter the Title of Pipeline to delete.</label>
                            <input type="hidden" id="pipeline_id" name="pipeline_id" />
                            <input type="hidden" id="original_pipeline_title" name="original_pipeline_title" />
                            <input type="text" class="form-control mb-0" id="pipeline_title" name="pipeline_title" placeholder="Pipeline Title" autocomplete="off">
                        </div>

                        <div class="text-center pb-2">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="DeletePipeline();">Delete</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function showEditOption(id) {
            $('#show_text_' + id).hide();
            $('#show_edit_text_' + id).show();
            $('#save_rights_' + id).show();
            $('#loading_' + id).hide();
        }

        function cancelEdit(id) {
            $('#show_text_' + id).show();
            $('#show_edit_text_' + id).hide();
            $('#save_rights_' + id).hide();
            $('#loading_' + id).hide();
        }

        function saveEdited(id) {
            var text = $('#pipeline_' + id).val();
            if (text !== '') {
                $('#loading_' + id).html($('#show_loading').html());
                $('#loading_' + id).show();
                var url = "{{ route('pipeline.edit', ':pipeline_id') }}";
                url = url.replace(':pipeline_id', id);
                $.post({
                    url: url,
                    type: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}",
                        id: id,
                        title: text
                    },
                    success: function(res) {
                        $('#show_text_' + id).html(res.title);
                        $('#show_text_' + id).show();
                        $('#show_edit_text_' + id).val(res.title);
                        $('#show_edit_text_' + id).hide();
                        $('#save_rights_' + id).hide();
                        $('#loading_' + id).hide();
                    },
                    error: function(res) {
                        if (res.responseJSON.error_msg) {
                            $('#loading_' + id).hide();
                            alert(res.responseJSON.error_msg);
                        }
                    }
                });
            }
        }

        function saveNew(id) {
            var text = $('#pipeline_' + id).val();
            if (text !== '') {
                $('#loading_' + id).html($('#show_loading').html());
                $('#loading_' + id).show();
                var url = "{{ route('pipeline.add') }}";
                $.post({
                    url: url,
                    type: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}",
                        id: id,
                        title: text
                    },
                    success: function(res) {
                        $('#show_text_' + id).html(res.title);
                        $('#show_text_' + id).show();
                        $('#show_edit_text_' + id).val(res.title);
                        $('#show_edit_text_' + id).hide();
                        $('#save_rights_' + id).hide();
                        $('#loading_' + id).html(
                            '<br /><b>Pipeline saved successfully, loading the page...</b>');
                        if (res.message == 'success') location.reload();
                    },
                    error: function(res) {
                        if (res.responseJSON.error_msg) {
                            $('#loading_' + id).hide();
                            alert(res.responseJSON.error_msg);
                        }
                    }
                });
            }
        }
        $('.addClickrBtn').click(function() {
            var c = $('#control-group tr:last').attr('id');
            c = parseInt(c) + 1;
            var tr = '<tr id="' + c + '"><td><div><input type="text" placeholder="New Pipeline" id="pipeline_' + c +
                '" name="pipeline_' + c + '" class="form-control" required></div><br /><div id="loading_' + c +
                '" style="display: none;"></div></td><td>';
            tr += '<a href="javascript:void(0)" onclick="saveNew(' + c + ');">';
            tr +=
                '<svg fill="none" xmlns="http://www.w3.org/2000/svg" class="icon-32" width="32" height="32" viewBox="0 0 32 32"><path d="M21.4354 2.58198C20.9352 2.0686 20.1949 1.87734 19.5046 2.07866L3.408 6.75952C2.6797 6.96186 2.16349 7.54269 2.02443 8.28055C1.88237 9.0315 2.37858 9.98479 3.02684 10.3834L8.0599 13.4768C8.57611 13.7939 9.24238 13.7144 9.66956 13.2835L15.4329 7.4843C15.723 7.18231 16.2032 7.18231 16.4934 7.4843C16.7835 7.77623 16.7835 8.24935 16.4934 8.55134L10.72 14.3516C10.2918 14.7814 10.2118 15.4508 10.5269 15.9702L13.6022 21.0538C13.9623 21.6577 14.5826 22 15.2628 22C15.3429 22 15.4329 22 15.513 21.9899C16.2933 21.8893 16.9135 21.3558 17.1436 20.6008L21.9156 4.52479C22.1257 3.84028 21.9356 3.09537 21.4354 2.58198Z" fill="currentColor"></path></svg>';
            tr += '</a>';
            tr +=
                '<button type="button" class="btn btn-danger btn-sm btn-danger delete_row_btn" style="float:right;"><span class="btn-inner"><svg fill="none" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill-rule="evenodd" clip-rule="evenodd" d="M7.67 1.99927H16.34C19.73 1.99927 22 4.37927 22 7.91927V16.0903C22 19.6203 19.73 21.9993 16.34 21.9993H7.67C4.28 21.9993 2 19.6203 2 16.0903V7.91927C2 4.37927 4.28 1.99927 7.67 1.99927ZM15.01 14.9993C15.35 14.6603 15.35 14.1103 15.01 13.7703L13.23 11.9903L15.01 10.2093C15.35 9.87027 15.35 9.31027 15.01 8.97027C14.67 8.62927 14.12 8.62927 13.77 8.97027L12 10.7493L10.22 8.97027C9.87 8.62927 9.32 8.62927 8.98 8.97027C8.64 9.31027 8.64 9.87027 8.98 10.2093L10.76 11.9903L8.98 13.7603C8.64 14.1103 8.64 14.6603 8.98 14.9993C9.15 15.1693 9.38 15.2603 9.6 15.2603C9.83 15.2603 10.05 15.1693 10.22 14.9993L12 13.2303L13.78 14.9993C13.95 15.1803 14.17 15.2603 14.39 15.2603C14.62 15.2603 14.84 15.1693 15.01 14.9993Z" fill="currentColor" /></svg></span></button>';
            tr += '</td></tr>';
            $('#control-group').append(tr);

            $('.delete_row_btn').click(function() {
                $(this).closest("tr").remove();
            });
        });
        /* $('.delete_row_btn').click(function(){
           $(this).closest("tr").remove();
        }); */

        function DeleteConfirm(id, title) {
            $("#pipeline_id").val(id);
            $("#original_pipeline_title").val(title);
            $("#pipeline_title").val("");
            $("#staticBackdrop").modal("show");
        }

        function DeletePipeline() {
            var pipeline_id = $("#pipeline_id").val();
            var original_pipeline_title = $("#original_pipeline_title").val();
            var pipeline_title = $("#pipeline_title").val();
            if (pipeline_title == original_pipeline_title) {
                alert('Deleting the pipline named "' + pipeline_title + '"');
                $('#loading_' + pipeline_id).html($('#show_loading').html());
                $('#loading_' + pipeline_id).show();
                var url = "{{ route('pipeline.delete', ':pipeline_id') }}";
                url = url.replace(':pipeline_id', pipeline_id);
                $.post({
                    url: url,
                    type: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}",
                        id: pipeline_id
                    },
                    success: function(res) {
                        $('#' + pipeline_id).hide();
                        $('#loading_' + pipeline_id).hide();
                    },
                    error: function(res) {
                        if (res.responseJSON.error_msg) {
                            $('#loading_' + pipeline_id).hide();
                            alert(res.responseJSON.error_msg);
                        }
                    }
                });
            } else {
                alert('Incorrect Pipeline name, aborting...');
            }
        }
    </script>
@endsection
