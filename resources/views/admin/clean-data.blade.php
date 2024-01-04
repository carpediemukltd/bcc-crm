@extends('layout.appTheme')
@section('content')
<div class="position-relative iq-banner default">
    <div class="iq-navbar-header" style="height: 215px;">
        <div class="container-fluid iq-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="flex-wrap d-flex justify-content-between align-items-center">
                        <div>
                            <h1>Clean Dummy Data</h1>
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
                    <div class="card-body">
                        <div class="alert alert-warning">
                            <p>Warning: This action will permanently delete users data. Be careful to proceed! </p>
                        </div>
                        <form action="{{ route('clean-dummy-data.post') }}" method="post" id="cleanDummyDataForm" onsubmit="return confirmAndValidate()">
                            @csrf
                            <div class="row date_range_fields">
                                <div class="col-md-4">
                                    <select class="form-control" name="column" id="column" required>
                                        <option value="" selected disabled>--Select column--</option>
                                        <option value="first_name">First Name</option>
                                        <option value="last_name">Last Name</option>
                                        <option value="email">Email</option>
                                        <option value="phone_number">Phone Number</option>
                                        <option value="status">Status</option>
                                        <option value="created_at">Created at</option>

                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <select class="form-control" name="operators" required>
                                        <option value="" selected disabled>--Select Operator--</option>
                                        <option value="=">Equal</option>
                                        <option value="!=">Not Equal</option>
                                        <option value="<">Less Than</option>
                                        <option value="<=">Less Than or Equal To</option>
                                        <option value=">">Greater Than</option>
                                        <option value=">=">Greater Than or Equal To</option>
                                        <option value="contains">Contains</option>
                                        <option value="starts_with">Starts With</option>
                                        <option value="ends_with">Ends With</option>
                                    </select>

                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="value" placeholder="Enter value" required>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12 text-right">
                                    <button type="submit" class="btn btn-primary">Submit</button>
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

<script>
    function confirmAndValidate() {
        if (confirm('Are you sure you want to submit the form?')) {
            var column = document.getElementById('column').value;
            var operators = document.getElementById('operators').value;
            var value = document.getElementById('value').value;

            if (column && operators && value) {
                return true;
            } else {
                alert('Please select a column, operator, and enter a value.');
                return false;
            }
        } else {
            return false;
        }
    }
    $(document).ready(function() {
        $('#column').on('change', function() {
            var column = $('#column');
            var valueInput = $('input[name="value"]');

            if (column.val() === 'created_at') {
                // Change input type to date for 'Created at'
                valueInput.attr('type', 'date');
            } else {
                // Reset input type for other options
                valueInput.attr('type', 'text');
            }
        });

    });
</script>

@endsection