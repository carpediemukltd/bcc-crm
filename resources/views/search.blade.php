@extends('layout.appTheme')
@section('content')
<!-- search filter start-->
<div id="search_filder" class="d-flex shadow-sm search_filder_holder">
    <span>Search Results for: <b><span class="search-results-for"></span></b></span>
    <ul>
        <span>Filter by:</span>
        <li class="cursor-pointer filter-tag" id="contacts">Contacts</li>
        <li class="cursor-pointer filter-tag" id="deals">Deals</li>
        <li class="cursor-pointer filter-tag" id="companies">Companies</li>
        <li class="cursor-pointer filter-tag" id="stages">Stages</li>
        <li class="cursor-pointer filter-tag" id="pipelines">Pipelines</li>
    </ul>

</div>
<!-- search filter end-->
<div class="content-inner container-fluid pb-0" id="page_layout">
    <div class="row contacts-row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Contacts</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div id="" class="dataTables_wrapper">
                            <form id="frmExample" action="#" method="POST" enctype="multipart/form-data">

                                <div class="table-responsive">
                                    <div id="user-list-table_wrapper" class="dataTables_wrapper">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr class="ligth">
                                                        <th class="sorting sorting_asc" tabindex="0" aria-controls="user-list-table" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Sr: activate to sort column descending">Name</th>
                                                        <th class="sorting" tabindex="0" aria-controls="user-list-table" rowspan="1" colspan="1" aria-label="Title: activate to sort column ascending">Phone</th>
                                                        <th class="sorting" tabindex="0" aria-controls="user-list-table" rowspan="1" colspan="1" aria-label="Type: activate to sort column ascending">Email</th>
                                                        <th class="sorting" tabindex="0" aria-controls="user-list-table" rowspan="1" colspan="1" aria-label="Type: activate to sort column ascending">Status</th>
                                                        <th style="min-width: 100px" class="sorting" tabindex="0" aria-controls="user-list-table" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending">Details</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="ui-sortable contacts-html">
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
            
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="row deals-row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Deals</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div id="" class="dataTables_wrapper">
                            <form id="frmExample" action="#" method="POST" enctype="multipart/form-data">

                                <div class="table-responsive">
                                    <div id="user-list-table_wrapper" class="dataTables_wrapper">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr class="ligth">
                                                        <th class="sorting sorting_asc" tabindex="0" aria-controls="user-list-table" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Sr: activate to sort column descending">Name</th>
                                                        <th style="min-width: 100px" class="sorting" tabindex="0" aria-controls="user-list-table" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="ui-sortable deals-html">
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="row companies-row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Companies</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div id="" class="dataTables_wrapper">
                            <form id="frmExample" action="#" method="POST" enctype="multipart/form-data">

                                <div class="table-responsive">
                                    <div id="user-list-table_wrapper" class="dataTables_wrapper">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr class="ligth">
                                                        <th class="sorting sorting_asc" tabindex="0" aria-controls="user-list-table" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Sr: activate to sort column descending">Name</th>
                                                        <th class="sorting" tabindex="0" aria-controls="user-list-table" rowspan="1" colspan="1" aria-label="Title: activate to sort column ascending">Status</th>
                                                        <th style="min-width: 100px" class="sorting" tabindex="0" aria-controls="user-list-table" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="ui-sortable companies-html">
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="row stages-row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Stages</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div id="" class="dataTables_wrapper">
                            <form id="frmExample" action="#" method="POST" enctype="multipart/form-data">

                                <div class="table-responsive">
                                    <div id="user-list-table_wrapper" class="dataTables_wrapper">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr class="ligth">
                                                        <th class="sorting sorting_asc" tabindex="0" aria-controls="user-list-table" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Sr: activate to sort column descending">Name</th>
                                                        <th style="min-width: 100px" class="sorting" tabindex="0" aria-controls="user-list-table" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="ui-sortable stages-html">
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="row pipelines-row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Pipelines</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div id="" class="dataTables_wrapper">
                            <form id="frmExample" action="#" method="POST" enctype="multipart/form-data">

                                <div class="table-responsive">
                                    <div id="user-list-table_wrapper" class="dataTables_wrapper">
                                        <div class="table-responsive">
                                           Name	 <table class="table">
                                                <thead>
                                                    <tr class="ligth">
                                                        <th class="sorting sorting_asc" tabindex="0" aria-controls="user-list-table" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Sr: activate to sort column descending">Name</th>
                                                        <th style="min-width: 100px" class="sorting" tabindex="0" aria-controls="user-list-table" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="ui-sortable pipelines-html">
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection