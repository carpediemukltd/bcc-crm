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
                                <!-- <div class="col">
                                    <div class="form-group">
                                        <label class="form-label" for="deal_owner">Company</label>
                                        <select class="form-select" name="deal_owner">

                                        </select>
                                    </div>
                                </div> -->
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
                    <div class="card-body">
                    <div class="row">
                        <h4>Import History</h4>
                        <div class="col">
                        <table id="user-list-table" class="table table-striped dataTable no-footer" role="grid" aria-describedby="user-list-table_info">
                              <thead>
                                 <tr class="ligth">
                                    <th class="sorting" tabindex="0" aria-controls="user-list-table">#</th>
                                    <th class="sorting" tabindex="0" aria-controls="user-list-table">File Name</th>
                                    <th class="sorting" tabindex="0" aria-controls="user-list-table">Records Imported</th>
                                    <th class="sorting" tabindex="0" aria-controls="user-list-table">Total Records</th>
                                    <th class="sorting" tabindex="0" aria-controls="user-list-table">Upload By</th>
                                    <th class="sorting" tabindex="0" aria-controls="user-list-table">Status</th>
                                    <th class="sorting" tabindex="0" aria-controls="user-list-table">Date</th>
                                 </tr>
                              </thead>
                              <tbody>
                                @if(count($data))
                                @foreach($data as $key=>$value)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td><a href="{{$value->file_name}}">{{$value->file_original_name}}</a></td>
                                    <td>{{$value->records_imported}}</td>
                                    <td>{{$value->records}}</td>
                                    <td>{{$value->user->full_name}} ({{ucfirst($value->user->role)}})</td>
                                    <td>{{$value->status}}</td>
                                    <td>{{$value->updated_at}}</td>
                                </tr>
                                @endforeach
                               
                                @endif
                               
                              </tbody>
                            
                        </table>
                        {{$data->links()}}

                                
                        </div>
                    </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection