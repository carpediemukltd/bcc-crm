@extends('layout.appTheme')
@section('content')
<div class="position-relative iq-banner default">
    <div class="iq-navbar-header" style="height: 215px;">
        <div class="container-fluid iq-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="flex-wrap d-flex justify-content-between align-items-center">
                        <div>
                            <h1>Global Reporting</h1>
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
<div class="content-inner pb-0 container-fluid email-marketing-campaign" id="page_layout">
    <div>
        @include('alert_message')
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Global Reporting</h4>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="row step5 mb-5" style="padding: 10px;">
                            <div class="col-md-12 pb-5">
                                <select class="form-control select-campaign" name="campaign">
                                    <option value="0">--Select Campaign--</option>
                                    @if(count($campaigns))
                                    @foreach($campaigns as $camp)
                                        <option value="{{$camp->id}}">{{$camp->name}}</option>
                                    @endforeach
                                    @endif
                                </select>


                            </div><br>
                            <div class="col-md-2">
                                <p> Emails Sent: <span class="emails-sent-stats"></span></p>

                            </div>
                            <div class="col-md-2">
                                <p> Opened Emails: <span class="emails-opened-stats"></span></p>

                            </div>
                            <div class="col-md-2">
                                <p> Failed Emails: <span class="emails-failed-stats"></span> </p>

                            </div>
                            <div class="col-md-2">
                                <p> Open Rate: <span class="emails-openrate"></span></p>

                            </div>
                            <div class="col-md-2">
                                <p> Bounce Rate: <span class="emails-bouncerate"></span></p>

                            </div>
                            <div class="col-md-12">
                                <canvas id="myChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        var chartInstance = "";

        function getAnalyticsData(campaignId) {

            $.ajax({
                type: 'GET',
                url: '/marketing-global-reporting-data', // Replace with your actual search endpoint
                data: {
                    id: campaignId
                },
                success: function(data) {
                    $(".emails-sent-stats").html('');
                    $(".emails-opened-stats").html('');
                    $(".emails-failed-stats").html('');
                    $(".eemails-openrate").html('');
                    $(".emails-bouncerate").html('');

                    $(".emails-sent-stats").html(data.data.totalSentEmails);
                    $(".emails-opened-stats").html(data.data.totalOpened);
                    $(".emails-failed-stats").html(data.data.totalFailed);
                    $(".emails-openrate").html(data.data.openRate);
                    $(".emails-bouncerate").html(data.data.bounceRate);
                    renderGraph(data.data.graphData);


                },
                error: function(error) {
                    // Handle error response
                    console.error(error);
                }
            });
        }

        function renderGraph(data) {
            const ctx = document.getElementById('myChart');
            if (typeof chartInstance !== 'string') {
                chartInstance.destroy();
            }

            // Get the last 30 dates starting from today
            const last30Dates = Array.from({
                length: 30
            }, (_, index) => {
                const date = new Date();
                date.setDate(date.getDate() - index);
                return date.toISOString().split('T')[0];
            }).reverse(); // Reverse to have the oldest date first

            // Initialize datasets with zeros for each date
            const datasets = [{
                    label: 'Emails Sent',
                    data: Array(30).fill(0),
                    fill: false,
                    borderColor: 'rgb(75, 192, 192)',
                    tension: 0.1
                },
                {
                    label: 'Opened Emails',
                    data: Array(30).fill(0),
                    fill: false,
                    borderColor: 'rgb(255, 205, 86)',
                    tension: 0.1
                },
                {
                    label: 'Failed Emails',
                    data: Array(30).fill(0),
                    fill: false,
                    borderColor: 'rgb(255, 99, 132)',
                    tension: 0.1
                }
            ];

            // Update datasets with actual counts for each date
            data.forEach(entry => {
                const index = last30Dates.indexOf(entry.date);
                if (index !== -1) {
                    datasets[0].data[index] = entry.emails_sent;
                    datasets[1].data[index] = entry.opened_emails;
                    datasets[2].data[index] = entry.failed_emails;
                }
            });

            chartInstance = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: last30Dates,
                    datasets: datasets
                }
            });
        }
        $(document).on('change', '.select-campaign', function() {
            var selectedCampaignId = $(this).val();
            getAnalyticsData(selectedCampaignId);
        });

        getAnalyticsData(0);
    });
</script>


@endsection