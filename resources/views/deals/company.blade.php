@extends('layout.appTheme')
@section('content')

    <div class="position-relative iq-banner default">
        <div class="iq-navbar-header" style="height: 215px;">
            <div class="container-fluid iq-container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="flex-wrap d-flex justify-content-between align-items-center">
                            <div>
                                <h1>All Deals</h1>
                                <p>Experience a simple yet powerful way to build Dashboards.</p>
                            </div>
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
                                <h4 class="card-title">Company Deals Listing</h4>
                            </div>

                            <div class="d-flex justify-content-between">
                                {{-- <div class="cutsom-field-dropdown dropdown">
                        <button class="btn  dropdown-toggle me-2" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                           Company Deals
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" data-popper-placement="bottom-start" >
                           
                           <li>
                              <a class="dropdown-item" href="#">
                                 <input type="radio">
                                 Action
                              </a>
                           </li>
                           <li><a class="dropdown-item" href="#"><input type="radio"> Another action</a></li>
                           <li><a class="dropdown-item" href="#"><input type="radio"> Something else here</a></li>
                           <li>
                              <hr class="dropdown-divider">
                           </li>
                           <li><a class="dropdown-item" href="#"><input type="radio"> Separated link</a></li>
                        </ul>
                     </div> --}}
                                <div>
                                    <a class="btn btn-primary px-3 me-1" href="javascript::void(0);"
                                        onclick="setView('list');"data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="List view">
                                        <svg class="svg-inline--fa fa-list fs--2" width="12px" aria-hidden="true"
                                            focusable="false" data-prefix="fas" data-icon="list" role="img"
                                            xmlns="" viewBox="0 0 512 512" data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M88 48C101.3 48 112 58.75 112 72V120C112 133.3 101.3 144 88 144H40C26.75 144 16 133.3 16 120V72C16 58.75 26.75 48 40 48H88zM480 64C497.7 64 512 78.33 512 96C512 113.7 497.7 128 480 128H192C174.3 128 160 113.7 160 96C160 78.33 174.3 64 192 64H480zM480 224C497.7 224 512 238.3 512 256C512 273.7 497.7 288 480 288H192C174.3 288 160 273.7 160 256C160 238.3 174.3 224 192 224H480zM480 384C497.7 384 512 398.3 512 416C512 433.7 497.7 448 480 448H192C174.3 448 160 433.7 160 416C160 398.3 174.3 384 192 384H480zM16 232C16 218.7 26.75 208 40 208H88C101.3 208 112 218.7 112 232V280C112 293.3 101.3 304 88 304H40C26.75 304 16 293.3 16 280V232zM88 368C101.3 368 112 378.7 112 392V440C112 453.3 101.3 464 88 464H40C26.75 464 16 453.3 16 440V392C16 378.7 26.75 368 40 368H88z">
                                            </path>
                                        </svg>
                                    </a>
                                    <a class="btn btn-primary px-3 me-1" href="javascript::void(0);"
                                        onclick="setView('board');" data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-title="Board view" aria-describedby="tooltip352331">
                                        <svg width="9" height="9" viewBox="0 0 9 9" fill="none" xmlns="">
                                            <path
                                                d="M0 0.5C0 0.223857 0.223858 0 0.5 0H1.83333C2.10948 0 2.33333 0.223858 2.33333 0.5V1.83333C2.33333 2.10948 2.10948 2.33333 1.83333 2.33333H0.5C0.223857 2.33333 0 2.10948 0 1.83333V0.5Z"
                                                fill="currentColor"></path>
                                            <path
                                                d="M3.33333 0.5C3.33333 0.223857 3.55719 0 3.83333 0H5.16667C5.44281 0 5.66667 0.223858 5.66667 0.5V1.83333C5.66667 2.10948 5.44281 2.33333 5.16667 2.33333H3.83333C3.55719 2.33333 3.33333 2.10948 3.33333 1.83333V0.5Z"
                                                fill="currentColor"></path>
                                            <path
                                                d="M6.66667 0.5C6.66667 0.223857 6.89052 0 7.16667 0H8.5C8.77614 0 9 0.223858 9 0.5V1.83333C9 2.10948 8.77614 2.33333 8.5 2.33333H7.16667C6.89052 2.33333 6.66667 2.10948 6.66667 1.83333V0.5Z"
                                                fill="currentColor"></path>
                                            <path
                                                d="M0 3.83333C0 3.55719 0.223858 3.33333 0.5 3.33333H1.83333C2.10948 3.33333 2.33333 3.55719 2.33333 3.83333V5.16667C2.33333 5.44281 2.10948 5.66667 1.83333 5.66667H0.5C0.223857 5.66667 0 5.44281 0 5.16667V3.83333Z"
                                                fill="currentColor"></path>
                                            <path
                                                d="M3.33333 3.83333C3.33333 3.55719 3.55719 3.33333 3.83333 3.33333H5.16667C5.44281 3.33333 5.66667 3.55719 5.66667 3.83333V5.16667C5.66667 5.44281 5.44281 5.66667 5.16667 5.66667H3.83333C3.55719 5.66667 3.33333 5.44281 3.33333 5.16667V3.83333Z"
                                                fill="currentColor"></path>
                                            <path
                                                d="M6.66667 3.83333C6.66667 3.55719 6.89052 3.33333 7.16667 3.33333H8.5C8.77614 3.33333 9 3.55719 9 3.83333V5.16667C9 5.44281 8.77614 5.66667 8.5 5.66667H7.16667C6.89052 5.66667 6.66667 5.44281 6.66667 5.16667V3.83333Z"fill="currentColor">
                                            </path>
                                            <path
                                                d="M0 7.16667C0 6.89052 0.223858 6.66667 0.5 6.66667H1.83333C2.10948 6.66667 2.33333 6.89052 2.33333 7.16667V8.5C2.33333 8.77614 2.10948 9 1.83333 9H0.5C0.223857 9 0 8.77614 0 8.5V7.16667Z"fill="currentColor">
                                            </path>
                                            <path
                                                d="M3.33333 7.16667C3.33333 6.89052 3.55719 6.66667 3.83333 6.66667H5.16667C5.44281 6.66667 5.66667 6.89052 5.66667 7.16667V8.5C5.66667 8.77614 5.44281 9 5.16667 9H3.83333C3.55719 9 3.33333 8.77614 3.33333 8.5V7.16667Z"
                                                fill="currentColor"></path>
                                            <path
                                                d="M6.66667 7.16667C6.66667 6.89052 6.89052 6.66667 7.16667 6.66667H8.5C8.77614 6.66667 9 6.89052 9 7.16667V8.5C9 8.77614 8.77614 9 8.5 9H7.16667C6.89052 9 6.66667 8.77614 6.66667 8.5V7.16667Z"
                                                fill="currentColor"></path>
                                        </svg>
                                    </a>
                                    <a href="javascript:void(0);" class="btn btn-sm btn-primary" onclick="ExportCSV();">
                                        <svg width="32" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.4"
                                                d="M16.191 2H7.81C4.77 2 3 3.78 3 6.83V17.16C3 20.26 4.77 22 7.81 22H16.191C19.28 22 21 20.26 21 17.16V6.83C21 3.78 19.28 2 16.191 2Z"
                                                fill="currentColor"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M8.07996 6.6499V6.6599C7.64896 6.6599 7.29996 7.0099 7.29996 7.4399C7.29996 7.8699 7.64896 8.2199 8.07996 8.2199H11.069C11.5 8.2199 11.85 7.8699 11.85 7.4289C11.85 6.9999 11.5 6.6499 11.069 6.6499H8.07996ZM15.92 12.7399H8.07996C7.64896 12.7399 7.29996 12.3899 7.29996 11.9599C7.29996 11.5299 7.64896 11.1789 8.07996 11.1789H15.92C16.35 11.1789 16.7 11.5299 16.7 11.9599C16.7 12.3899 16.35 12.7399 15.92 12.7399ZM15.92 17.3099H8.07996C7.77996 17.3499 7.48996 17.1999 7.32996 16.9499C7.16996 16.6899 7.16996 16.3599 7.32996 16.1099C7.48996 15.8499 7.77996 15.7099 8.07996 15.7399H15.92C16.319 15.7799 16.62 16.1199 16.62 16.5299C16.62 16.9289 16.319 17.2699 15.92 17.3099Z"
                                                fill="currentColor"></path>
                                        </svg> Export CSV
                                    </a>
                                    <a href="javascript:void(0);" style="margin-left:5px;" class="btn btn-sm btn-primary"
                                        onclick="ExportXLS();"> <svg width="32" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.4"
                                                d="M16.191 2H7.81C4.77 2 3 3.78 3 6.83V17.16C3 20.26 4.77 22 7.81 22H16.191C19.28 22 21 20.26 21 17.16V6.83C21 3.78 19.28 2 16.191 2Z"
                                                fill="currentColor"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M8.07996 6.6499V6.6599C7.64896 6.6599 7.29996 7.0099 7.29996 7.4399C7.29996 7.8699 7.64896 8.2199 8.07996 8.2199H11.069C11.5 8.2199 11.85 7.8699 11.85 7.4289C11.85 6.9999 11.5 6.6499 11.069 6.6499H8.07996ZM15.92 12.7399H8.07996C7.64896 12.7399 7.29996 12.3899 7.29996 11.9599C7.29996 11.5299 7.64896 11.1789 8.07996 11.1789H15.92C16.35 11.1789 16.7 11.5299 16.7 11.9599C16.7 12.3899 16.35 12.7399 15.92 12.7399ZM15.92 17.3099H8.07996C7.77996 17.3499 7.48996 17.1999 7.32996 16.9499C7.16996 16.6899 7.16996 16.3599 7.32996 16.1099C7.48996 15.8499 7.77996 15.7099 8.07996 15.7399H15.92C16.319 15.7799 16.62 16.1199 16.62 16.5299C16.62 16.9289 16.319 17.2699 15.92 17.3099Z"
                                                fill="currentColor"></path>
                                        </svg> Export XLS
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-lg-3">
                                    @if (isset($companies))
                                        <div class="form-group w-100">
                                            <label class="form-label">Select Company</label>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <select class="form-control" id="companies" name="companies">
                                                    <option value="0">All</option>
                                                    @foreach ($companies as $company)
                                                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-lg-3">
                                    @if (isset($pipelines))
                                        <div class="form-group w-100">
                                            <label class="form-label">Select Pipeline</label>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <select class="form-control" id="pipelines" name="pipelines">
                                                    <option value="0">All</option>
                                                    @foreach ($pipelines as $pipeline)
                                                        <option value="{{ $pipeline->id }}">{{ $pipeline->title }}</option>
                                                    @endforeach
                                                </select>&nbsp;
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group w-100">
                                        <label class="form-label">&nbsp;</label>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <button type="button" class="btn btn-primary" data-toggle="tooltip"
                                        data-placement="top" onclick="triggerGet()">Load</button>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="row" id="show_loading" style="display: none;">
                                <div class="col-md-12">
                                    <div class="preloader-dot-loading mt-3">
                                        <div class="cssload-loading"><i></i><i></i><i></i><i></i></div>
                                    </div>
                                </div>
                            </div>
                            <div id="deals">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#pipelines').change(function() {
                getDeals();
            });
            $('#companies').change(function() {
                getDeals();
            });
            triggerGet();
        });
        var dealsView = 'list';

        function setView(view) {
            dealsView = view;
            getDeals();
        }

        function triggerGet() {
            $('#companies').trigger('change');
        }

        function getDeals() {
            var company_id = $('#companies').val();
            var pipeline_id = $('#pipelines').val();
            $('#deals').html('Loading...');
            var url = "{{ route('company.deals.detail', ':deals_view') }}";
            url = url.replace(':deals_view', dealsView);
            $('#show_loading').show();
            $.post({
                url: url,
                type: 'POST',
                data: {
                    _token: "{{ csrf_token() }}",
                    company_id: company_id,
                    pipeline_id: pipeline_id
                },
                success: function(res) {
                    $('#show_loading').hide();
                    $('#deals').html(res);
                },
                error: function(res) {
                    $('#show_loading').hide();
                    $('#deals').html('Something went wrong...');
                }
            });
        }
    </script>
@endsection
