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
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
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
  from { bottom:-100px; opacity:0 } 
  to { bottom:0px; opacity:1 }
}

@keyframes animatebottom { 
  from{ bottom:-100px; opacity:0 } 
  to{ bottom:0; opacity:1 }
}

#myDiv {
  display: none;
  text-align: center;
}
  </style>
@endsection
@section('content')
<div class="content-inner container-fluid pb-0" id="page_layout">
    @include('alert_message')
    <div id="loader" style="display: none;"></div>
    <div class="d-flex justify-content-between align-items-center flex-wrap mb-4 gap-3">
        <div class="d-flex flex-column">
            <h3>Quick Insights</h3>
            <p class="text-primary mb-0">Users Count</p>
        </div>
        <div class="row">
            <div class="col-md-9">
                <div class="form-group">
                    <label for="">Date In<span style="color: red">*</span></label>
                    <input type="text" class="input-sm form-control" id="daterange" name="daterange"
                        autocomplete="off" />
                </div>
            </div>
            <div class="col-md-3">
                <label for=""></label>
                <button type="button" name="filter" id="filter" class="btn btn-primary m2">Filter</button>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-lg-2 col-md-2"></div>
        <div class="col-lg-8 col-md-8">
            <div class="card card-block card-stretch card-height">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between mb-2">
                        <p class="mb-0 text-dark">Gross Volume</p>
                        {{-- <a class="badge rounded-pill bg-soft-primary" href="#">
                     View
                  </a> --}}
                    </div>
                    <div class="mb-3">
                        <h2 class="counter" id="CountUser">{{ $user_count }}</h2>
                        <small>Last updated 1 hour ago.</small>
                    </div>
                    <div>
                        <div id="contactReport"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-2"></div>

    </div>
</div>
@endsection

@section('script')
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker@3.1.0/daterangepicker.min.js"></script>

<script>
    var demos = @json($week_data);

    if (document.querySelectorAll("#contactReport").length) {
        const variableColors = IQUtils.getVariableColor();
        const colors = [variableColors.primary, variableColors.info];
        const options = {
            series: [{
                name: "User Count",
                data: [demos.sun_count, demos.mon_count, demos.tue_count, demos.wed_count, demos.thu_count,
                    demos.fri_count, demos.sat_count
                ],
            }, ],
            chart: {
                type: "bar",
                height: "100%",
                stacked: true,
                toolbar: {
                    show: false,
                },
            },
            colors: colors,
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: "28%",
                    endingShape: "rounded",
                    borderRadius: 3,
                },
            },
            legend: {
                show: false,
            },
            dataLabels: {
                enabled: false,
            },
            stroke: {
                show: true,
                width: 3,
                colors: ["transparent"],
            },
            grid: {
                show: true,
                strokeDashArray: 7,
            },
            xaxis: {
                categories: ["S", "M", "T", "W", "T", "F", "S"],
                labels: {
                    minHeight: 20,
                    maxHeight: 20,
                    style: {
                        colors: "#8A92A6",
                    },
                },
            },
            yaxis: {
                title: {
                    text: "",
                },
                labels: {
                    minWidth: 20,
                    maxWidth: 20,
                    style: {
                        colors: "#8A92A6",
                    },
                },
            },
            fill: {
                opacity: 1,
            },
            tooltip: {
                y: {
                    formatter: function (val) {
                        return val;
                    },
                },
            },
            responsive: [{
                breakpoint: 1025,
                options: {
                    chart: {
                        height: 130,
                    },
                },
            }, ],
        };

        var chart = new ApexCharts(
            document.querySelector("#contactReport"),
            options
        );
        chart.render();

        //color customizer
        document.addEventListener("theme_color", (e) => {
            const variableColors = IQUtils.getVariableColor();
            const colors = [variableColors.primary, variableColors.info];

            const newOpt = {
                colors: colors,
                fill: {
                    type: "gradient",
                    gradient: {
                        shade: "dark",
                        type: "vertical",
                        gradientToColors: colors, // optional, if not defined - uses the shades of same color in series
                        opacityFrom: 1,
                        opacityTo: 1,
                        colors: colors,
                    },
                },
            };
            chart.updateOptions(newOpt);
        });

        //Font customizer
        document.addEventListener("body_font_family", (e) => {
            let prefix =
                getComputedStyle(document.body).getPropertyValue("--prefix") || "bs-";
            if (prefix) {
                prefix = prefix.trim();
            }
            const font_1 = getComputedStyle(document.body).getPropertyValue(
                `--${prefix}body-font-family`
            );
            const fonts = [font_1.trim()];
            const newOpt = {
                chart: {
                    fontFamily: fonts,
                },
            };
            chart.updateOptions(newOpt);
        });
    }

</script>

<script>
  $(function () {

      const date = new Date();
      let currentDay = String(date.getDate()).padStart(2, '0');
      let currentMonth = String(date.getMonth() + 1).padStart(2, "0");
      let currentYear = date.getFullYear();

      // we will display the date as DD-MM-YYYY 
      let currentDate = `${currentYear}-${currentMonth}-${currentDay}`;


      $('#daterange').daterangepicker({
          autoUpdateInput: false,
          opens: 'left',
          maxSpan: {
              days: 6 // Set the maximum span to 7 days
          },
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

  $(document).on('click', '#filter', function() {

    let daterange = $('#daterange').val();
    console.log(daterange);
    $.ajax({
        url: '{{ route("sandbox-daterange") }}',
        method: 'GET',
        data: {
            daterange: daterange,
        },
        beforeSend: function() {
          $("#loader").show();
        },
        dataType: 'JSON', // The expected data type of the response
        success: function (response) {
            // console.table(response);

            let responseData = [
              response.sun_count,
              response.mon_count,
              response.tue_count,
              response.wed_count,
              response.thu_count,
              response.fri_count,
              response.sat_count
            ];
      
            chart.updateSeries([{
                name: 'User Count',
                data: responseData,
            }]);
            
            $('#CountUser').text(response.user_count);
            $("#loader").hide();
        },
        error: function (jqXHR, textStatus, errorThrown) {
            // This function is executed if there's an error in the request
            console.log('Error:', textStatus, errorThrown);
        }
    });
  });

</script>
@endsection
