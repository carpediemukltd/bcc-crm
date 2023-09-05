@extends('layout.appTheme')
@section('css')
<style>
    #loader {
        position: absolute;
        left: 50%;
        top: 50%;
        z-index: 1;
        width: 120px;
        height: 120px;
        margin: -76px 0 0 -76px;
        border: 16px solid #f3f3f3;
        border-radius: 50%;
        border-top: 16px solid #3498db;
        -webkit-animation: spin 2s linear infinite;
        animation: spin 2s linear infinite;
    }

    @-webkit-keyframes spin {
        0% {
            -webkit-transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(360deg);
        }
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    /* Add animation to "page content" */
    .animate-bottom {
        position: relative;
        -webkit-animation-name: animatebottom;
        -webkit-animation-duration: 1s;
        animation-name: animatebottom;
        animation-duration: 1s
    }

    @-webkit-keyframes animatebottom {
        from {
            bottom: -100px;
            opacity: 0
        }

        to {
            bottom: 0px;
            opacity: 1
        }
    }

    @keyframes animatebottom {
        from {
            bottom: -100px;
            opacity: 0
        }

        to {
            bottom: 0;
            opacity: 1
        }
    }

</style>
@endsection
@section('content')
<div class="content-inner container-fluid pb-0" id="page_layout">
    @include('alert_message')
    <div id="loader" style="display: none;"></div>
    <div class="d-flex justify-content-between align-items-center flex-wrap mb-4 gap-3">
        <div class="d-flex flex-column">
            <h3>Deals Report</h3>
            <p class="text-primary mb-0">Users Count</p>
        </div>
        <div class="d-flex justify-content-between align-items-center flex-wrap">
            <div class="form-group">
                <label for="">Stages<span style="color: red">*</span></label>
                <select class="input-sm form-control" id="stages" name="stages">
                    <option value="0">Select Stage</option>
                    <option value="1">Stage 1</option>
                    <option value="2">Stage 2</option>
                    <option value="3">Stage 3</option>
                    <option value="4">Stage 4</option>
                    <option value="5">Stage 5</option>

                </select>
            </div>
            &nbsp;
            &nbsp;
            <div class="form-group">
                <label for="">Date In<span style="color: red">*</span></label>
                <input type="text" class="input-sm form-control" id="daterange" name="daterange" autocomplete="off" />
            </div>
            &nbsp;
            <div class="form-group mt-4">
                <label for=""></label>
                <button type="button" name="filter" id="filter" class="btn btn-primary m2">Filter</button>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card card-block card-stretch card-height">
                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Stage</th>
                                    <th>Pipeline</th>
                                    <th>Deal Owner</th>
                                    <th>Amount</th>
                                    <th>Lead Source</th>
                                    <th style="text-align: center">Date</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0" id="UsersTable">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker@3.1.0/daterangepicker.min.js"></script>

<script>
    $(function () {

        const date       = new Date();
        let currentDay   = String(date.getDate()).padStart(2, '0');
        let currentMonth = String(date.getMonth() + 1).padStart(2, "0");
        let currentYear  = date.getFullYear();

        // we will display the date as DD-MM-YYYY 
        let currentDate = `${currentYear}-${currentMonth}-${currentDay}`;


        $('#daterange').daterangepicker({
            autoUpdateInput: false,
            opens: 'left',
            locale: {
                cancelLabel: 'Clear'
            }
        });

        $('#daterange').on('apply.daterangepicker', function (ev, picker) {
            $(this).val(picker.startDate.format('YYYY/MM/DD') + ' - ' + picker.endDate.format(
                'YYYY/MM/DD'));
        });

        $('#daterange').on('cancel.daterangepicker', function (ev, picker) {
            $(this).val('');
        });
    });
    daterange = $('#daterange').val();

    $(document).on('click', '#filter', function () {

        let daterange = $('#daterange').val();
        let stages    = $('#stages').val();

        if(daterange == "" || daterange == null || stages === "0") {
            alert('please Select both fields to continue');
        } else {
            console.log('hello');
            $.ajax({
            url: '{{ route("filter-deals") }}',
            method: 'GET',
            data: {
                daterange: daterange,
                stages: stages,

            },
            beforeSend: function () {
                $("#loader").show();
            },
            dataType: 'JSON', // The expected data type of the response
            success: function (response) {

                let data = "";
                $.each(response, function(index, item) {

                     // Convert the timestamp to a JavaScript Date object
                    var dateObject = new Date(item.created_at);
                    
                    // Format the date as desired (e.g., "August 24, 2023")
                    var formattedDate = dateObject.toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' });

    
                    data += `<tr>
                        <td>`+item.title+`</td>
                        <td>`+item.stage.title+`</td>
                        <td>`+item.pipeline.title+`</td>
                        <td>`+item.deal_owner+`</td>
                        <td>$`+item.amount+`</td>
                        <td>`+item.lead_source+`</td>
                        <td>`+formattedDate+`</td>

                        </tr>`;
                });

               $('#UsersTable').empty().append(data);
                $("#loader").hide();
            },
            error: function (jqXHR, textStatus, errorThrown) {
                // This function is executed if there's an error in the request
                console.log('Error:', textStatus, errorThrown);
            }
        });
        }
    });

</script>

@endsection
