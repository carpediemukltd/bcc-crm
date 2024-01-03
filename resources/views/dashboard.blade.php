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

    #myDiv {
        display: none;
        text-align: center;
    }

</style>
@endsection
@section('content')
<div class="content-inner container-fluid pb-0 dashboard_view" id="page_layout">
    @include('alert_message')
    <div id="loader" style="display: none;"></div>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card card-block card-stretch card-height mb-0">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center flex-wrap mb-2 gap-3">
                        <div class="d-flex flex-column">
                            <h3>Quick Insights</h3>
                            <p class="text-primary mb-0">Users Count</p>
                        </div>
                        <div class="">
                            <div class="form-group">
                                <label for="">Date In<span style="color: red">*</span></label>
                                <div class="d-flex justify-content-between align-items-center">
                                    <input type="text" class="input-sm form-control" id="daterange" name="daterange" autocomplete="off" />
                                    <button type="button" name="filter" id="filter" class="ml-2 btn btn-primary m2">Filter</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
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
                    </div>
                </div>
            </div>
         </div>

      <!-- <div class="col-lg-6 col-md-12">
         <div class="card card-block card-stretch card-height">
            <div class="card-header">
               <div class=" d-flex justify-content-between  flex-wrap">
                  <h4 class="card-title">Net Volumes From Sales</h4>
                  <div class="dropdown">
                     <a href="#" class="text-secondary dropdown-toggle" id="dropdownMenuButton22" data-bs-toggle="dropdown" aria-expanded="false">
                     This year
                     </a>
                     <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton22">
                        <li><a class="dropdown-item" href="#">Year</a></li>
                        <li><a class="dropdown-item" href="#">Month</a></li>
                        <li><a class="dropdown-item" href="#">Week</a></li>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="card-body">
               <div id="dashboard-line-chart" ></div>
            </div>
         </div>
      </div>
      <div class="col-lg-6 col-md-12">
         <div class="card card-block card-stretch card-height">
            <nav class="tab-bottom-bordered">
               <div class="mb-0 nav nav-tabs justify-content-around" id="nav-tab1" role="tablist">
                  <button class="nav-link py-3 active" id="nav-home-11-tab" data-bs-toggle="tab" data-bs-target="#nav-home-11" type="button" role="tab" aria-controls="nav-home-11" aria-selected="true">Payments</button>
                  <button class="nav-link py-3" id="nav-profile-11-tab" data-bs-toggle="tab" data-bs-target="#nav-profile-11" type="button" role="tab" aria-controls="nav-profile-11" aria-selected="false">Settlements</button>
                  <button class="nav-link py-3" id="nav-contact-11-tab" data-bs-toggle="tab" data-bs-target="#nav-contact-11" type="button" role="tab" aria-controls="nav-contact-11" aria-selected="false">Refunds</button>
               </div>
            </nav>
            <div class="tab-content iq-tab-fade-up" id="nav-tabContent">
               <div class="tab-pane fade show active" id="nav-home-11" role="tabpanel" aria-labelledby="nav-home-11-tab">
                  <div class="table-responsive">
                     <table id="transaction-table" class="table mb-0 table-striped" role="grid">
                        <tbody>
                           <tr>
                              <td>
                                 <div class="d-flex align-items-center">
                                    <h6 class="mb-0">$1,833</h6>
                                 </div>
                              </td>
                              <td class="text-primary">
                                 hui_vxnnjigakm
                              </td>
                              <td class="text-dark">1 Hour Ago</td>
                              <td class="text-end">
                                 <span class="badge rounded-pill bg-success ">Processed</span>
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 <div class="d-flex align-items-center">
                                    <h6 class="mb-0">$1,204</h6>
                                 </div>
                              </td>
                              <td class="text-primary">
                                 hui_uwsxaiuhhs
                              </td>
                              <td class="text-dark">23 Days Ago</td>
                              <td class="text-end">
                                 <span class="badge rounded-pill bg-success">Processed</span>
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 <div class="d-flex align-items-center">
                                    <h6 class="mb-0">$2,833</h6>
                                 </div>
                              </td>
                              <td class="text-primary">
                                 hui_taxrcfzhny
                              </td>
                              <td class="text-dark">1 month ago</td>
                              <td class="text-end">
                                 <span class="badge rounded-pill bg-success">Processed</span>
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 <div class="d-flex align-items-center">
                                    <h6 class="mb-0">$2,235</h6>
                                 </div>
                              </td>
                              <td class="text-primary">
                                 hui_pknfotsmhl
                              </td>
                              <td class="text-dark">1 month ago</td>
                              <td class="text-end">
                                 <span class="badge rounded-pill bg-success">Processed</span>
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 <div class="d-flex align-items-center">
                                    <h6 class="mb-0">$2,442</h6>
                                 </div>
                              </td>
                              <td class="text-primary">
                                 hui_xqgczqbgto
                              </td>
                              <td class="text-dark">3 month ago</td>
                              <td class="text-end">
                                 <span class="badge rounded-pill bg-success">Processed</span>
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 <div class="d-flex align-items-center">
                                    <h6 class="mb-0">$1,924</h6>
                                 </div>
                              </td>
                              <td class="text-primary">
                                 hui_eoasrkizdw
                              </td>
                              <td class="text-dark">4 month ago</td>
                              <td class="text-end">
                                 <span class="badge rounded-pill bg-success">Processed</span>
                              </td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
               </div>
               <div class="tab-pane fade" id="nav-profile-11" role="tabpanel" aria-labelledby="nav-profile-11-tab">
                  <div class="table-responsive">
                     <table id="transaction-table-1" class="table mb-0 table-striped" role="grid">
                        <tbody>
                           <tr>
                              <td>
                                 <div class="d-flex align-items-center">
                                    <h6 class="mb-0">$2,298</h6>
                                 </div>
                              </td>
                              <td class="text-primary">
                                 hui_ufsoishqbw
                              </td>
                              <td class="text-dark">7 Days Ago</td>
                              <td class="text-end">
                                 <span class="badge rounded-pill bg-success ">Processed</span>
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 <div class="d-flex align-items-center">
                                    <h6 class="mb-0">$2,032</h6>
                                 </div>
                              </td>
                              <td class="text-primary">
                                 hui_fescijfgbb
                              </td>
                              <td class="text-dark">23 Days </td>
                              <td class="text-end">
                                 <span class="badge rounded-pill bg-success">Processed</span>
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 <div class="d-flex align-items-center">
                                    <h6 class="mb-0">$1,514</h6>
                                 </div>
                              </td>
                              <td class="text-primary">
                                 hui_eihghndltk
                              </td>
                              <td class="text-dark">1 month ago</td>
                              <td class="text-end">
                                 <span class="badge rounded-pill bg-success">Processed</span>
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 <div class="d-flex align-items-center">
                                    <h6 class="mb-0">$1,425</h6>
                                 </div>
                              </td>
                              <td class="text-primary">
                                 hui_bvihnfpdfq
                              </td>
                              <td class="text-dark">2 month ago</td>
                              <td class="text-end">
                                 <span class="badge rounded-pill bg-success">Processed</span>
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 <div class="d-flex align-items-center">
                                    <h6 class="mb-0">$2,838</h6>
                                 </div>
                              </td>
                              <td class="text-primary">
                                 hui_afrtmvdyjp
                              </td>
                              <td class="text-dark">2 month ago</td>
                              <td class="text-end">
                                 <span class="badge rounded-pill bg-success">Processed</span>
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 <div class="d-flex align-items-center">
                                    <h6 class="mb-0">$2,613</h6>
                                 </div>
                              </td>
                              <td class="text-primary">
                                 hui_jterqcvjxz
                              </td>
                              <td class="text-dark">5 month ago</td>
                              <td class="text-end">
                                 <span class="badge rounded-pill bg-success">Processed</span>
                              </td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
               </div>
               <div class="tab-pane fade" id="nav-contact-11" role="tabpanel" aria-labelledby="nav-contact-11-tab">
                  <div class="table-responsive">
                     <table id="transaction-table-2" class="table mb-0 table-striped" role="grid">
                        <tbody>
                           <tr>
                              <td>
                                 <div class="d-flex align-items-center">
                                    <h6 class="mb-0">$2,866</h6>
                                 </div>
                              </td>
                              <td class="text-primary">
                                 hui_odqethdqye
                              </td>
                              <td class="text-dark">3 Days Ago</td>
                              <td class="text-end">
                                 <span class="badge rounded-pill bg-info ">Process</span>
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 <div class="d-flex align-items-center">
                                    <h6 class="mb-0">$1,637</h6>
                                 </div>
                              </td>
                              <td class="text-primary">
                                 hui_nmngvsosnh
                              </td>
                              <td class="text-dark">22 Days Ago</td>
                              <td class="text-end">
                                 <span class="badge rounded-pill bg-success">Refunded</span>
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 <div class="d-flex align-items-center">
                                    <h6 class="mb-0">$2,922</h6>
                                 </div>
                              </td>
                          <td class="text-primary">
                                 hui_uikgtphcpo
                              </td>
                              <td class="text-dark">1 month ago</td>
                              <td class="text-end">
                                 <span class="badge rounded-pill bg-success">Refunded</span>
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 <div class="d-flex align-items-center">
                                    <h6 class="mb-0">$2,563</h6>
                                 </div>
                              </td>
                              <td class="text-primary">
                                 hui_cieqrdyqkp
                              </td>
                              <td class="text-dark">2 month ago</td>
                              <td class="text-end">
                                 <span class="badge rounded-pill bg-info">Process</span>
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 <div class="d-flex align-items-center">
                                    <h6 class="mb-0">$2,334</h6>
                                 </div>
                              </td>
                              <td class="text-primary">
                                 hui_wmdvzpfavx
                              </td>
                              <td class="text-dark">3 month ago</td>
                              <td class="text-end">
                                 <span class="badge rounded-pill bg-success">Refunded</span>
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 <div class="d-flex align-items-center">
                                    <h6 class="mb-0">$2,632</h6>
                                 </div>
                              </td>
                              <td class="text-primary">
                                 hui_jplpprjzbr
                              </td>
                              <td class="text-dark">5 month ago</td>
                              <td class="text-end">
                                 <span class="badge rounded-pill bg-danger">Failed</span>
                              </td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
            <div class="card-footer text-end">
               <a href="#">
                  <span class="me-2">
                  View all Settlements
                  </span>
                  <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="">
                     <path d="M8.5 5L15.5 12L8.5 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg>
               </a>
            </div>
         </div>
      </div> -->
      </div>
   </div>
</div>
<!-- bcc footer start -->
<div class="chat-container">
    <div class="chat-icon" id="chat-title">
        <span id="chat-title">Chat</span>
        <span class="badge"></span>
    </div>
    <div class="chat-window">
        <div class="chat-messages" id="chat-messages">
            <div class="clearSession">
                <div class="d-flex inline" style="display: inline; float: left">Do you want to close this session</div>
                <div class="clickToClear" style="cursor:pointer; display: inline; float: right">x</div>
            </div>
            <div class="jumbotron noSession">You do not have any open chats</div>

            @php
                $iUserId = auth()->user()->id;
                $iOwnerId = request()->cookie("consultant");
                if($iOwnerId)
                {
                    $objCheckClosedChat =App\Models\ChatLog::where("chat_message", 200)
                        ->where(function ($query) use ($iUserId, $iOwnerId) {
                            $query->where(function ($query) use ($iUserId, $iOwnerId) {
                                $query->where('sender_id', $iUserId)
                                      ->where('receiver_id', $iOwnerId);
                            })
                            ->orWhere(function ($query) use ($iOwnerId, $iUserId) {
                                $query->where('sender_id', $iOwnerId)
                                      ->where('receiver_id', $iUserId);
                            });
                        })
                        ->select(["id"])
                        ->latest()
                        ->first();
                    if($objCheckClosedChat)
                    {
                        $aAllChats =App\Models\ChatLog::where("id", ">", $objCheckClosedChat->id)
                            ->where(function ($query) use ($iUserId, $iOwnerId) {
                                $query->where(function ($query) use ($iUserId, $iOwnerId) {
                                    $query->where('sender_id', $iUserId)
                                          ->where('receiver_id', $iOwnerId);
                                })
                                ->orWhere(function ($query) use ($iOwnerId, $iUserId) {
                                    $query->where('sender_id', $iOwnerId)
                                          ->where('receiver_id', $iUserId);
                                });
                            })
                            ->select(["chat_message", "sender_id", "receiver_id", "id"])
                            ->get();
                        if($aAllChats)
                        {
                            foreach($aAllChats AS $iKey => $aValue)
                            {
                                if($iUserId == $aValue["sender_id"])
                                    echo '<div class="message user-message"><div class="content">'.$aValue["chat_message"].'</div></div>';
                                else
                                    echo '<div class="message other-message"><div class="content" style="word-wrap: break-word">'.$aValue["chat_message"].'</div></div>';
                            }
                        }
                    }
                }
            @endphp
        </div>
        <div class="user-input">
            <input disabled type="text" id="user-message" placeholder="Type your message...">
            <button id="send-button">Send</button>
        </div>
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker@3.1.0/daterangepicker.min.js"></script>
<script type="text/javascript" src="{{asset("pusher/pusher.min.js")}}"></script>

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

    let userId = 0;
    let messageCounter = 0;
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

    $(document).on('click', '#filter', function () {

        let daterange = $('#daterange').val();

        if(daterange == "" || daterange == null) {
            alert('please Daterange to continue!!');
        } else {
            $.ajax({
                url: '{{ route("sandbox-daterange") }}',
                method: 'GET',
                data: {
                    daterange: daterange,
                },
                beforeSend: function () {
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
        }
    });
    document.addEventListener("DOMContentLoaded", function () {

        const chatIcon = document.querySelector(".chat-icon");
        const chatWindow = document.querySelector(".chat-window");
        let isChatOpen = false;
        let borderRadius = $(".chat-icon").css("border-radius");
        chatIcon.addEventListener("click", function () {
            messageCounter = 0;
            $(".badge").text("");
            isChatOpen = !isChatOpen;
            chatWindow.style.display = isChatOpen ? "block" : "none";
            if(borderRadius == "50px")
                borderRadius = "0px";
            else
                borderRadius = "50px"
            $(".chat-icon").css({borderRadius: borderRadius})

        });
    });

    const sendButton = document.getElementById('send-button');
    const userMessageInput = document.getElementById('user-message');
    const chatMessages = document.getElementById('chat-messages');

    sendButton.addEventListener('click', () => {
        const message = userMessageInput.value.trim();
        if (message !== '') {
            addUserMessage(message);
            userMessageInput.value = '';
        }
    });

    $("#user-message").on("keypress", function(event) {
        if(event.keyCode === 13)
            $("#send-button").click();
    })

    async function addUserMessage(message) {
        if(userId == 0)
            return false;

        let messageDiv = "";
        messageDiv = document.createElement('div');
        messageDiv.classList.add('message', 'user-message');
        messageDiv.innerHTML = `<div class="content">${message}</div>`;
        chatMessages.appendChild(messageDiv);
        chatMessages.scrollTop = chatMessages.scrollHeight;
        setChatContent("user-chat", message, 1);

        await AsyncAjax("{{url("chatMessage")}}", {"message": message, "userId": userId, channel: "chat"+userId});
        setCookie("consultant", userId, 5);
    }

    let pusher = new Pusher("{{env("PUSHER_APP_KEY")}}", {
        cluster: "{{env("PUSHER_APP_CLUSTER")}}",
        encrypted: true
    })
    let channel = pusher.subscribe("chat{{auth()->user()->id}}");
    channel.bind("App\\Events\\ChatMessage", function(data) {
        let message = "";
        try {
            data = JSON.parse(data.message);
        } catch(e) {
            data = data.message;
        }
        message = data.message;
        setCloseStatus(data);
        console.log(data);
        setChatContent("user-chat", message, 2);
        if(!getCookie("clientName"))
            setCookie("clientName", data.clientName, 5);

        if(data.close) {
            setCloseStatus({}, true);
        } else {
            let messageDiv = document.createElement('div');
            messageDiv.classList.add('message', 'other-message');
            messageDiv.innerHTML = `<div class="content" style="word-wrap: break-word">${message}</div>`;
            chatMessages.appendChild(messageDiv);
            chatMessages.scrollTop = chatMessages.scrollHeight;
            if($(".chat-window").css("display") === "none")
                $(".badge").text(++messageCounter);
        }
    });
    function setCookie(cookieName, cookieValue, expirationMinutes) {
        var d = new Date();
        d.setTime(d.getTime() + (expirationMinutes * 60 * 1000));
        var expires = "expires=" + d.toUTCString();
        document.cookie = cookieName + "=" + cookieValue + ";" + expires + ";path=/";
    }
    function expireCookie(cookieName) {
        var expiredDate = new Date();
        expiredDate.setFullYear(expiredDate.getFullYear() - 1); // Set the date to the past
        var expires = "expires=" + expiredDate.toUTCString();
        document.cookie = cookieName + "=; " + expires + "; path=/";
    }
    function getCookie(cookieName) {
        const allCookie = document.cookie.split(";");
        for(let i = 0; i < allCookie.length; i++) {
            let cookie = allCookie[i].split("=");
            if(cookie[0].trim() === cookieName)
                return cookie[1];
        }
        return false;
    }
    let intervalTime = "";
    $(document).ready(function() {
        const cookieValue = getCookie("consultant");
        if(cookieValue) {
            $("#chat-title").text(getCookie("clientName"));
            setCloseStatus({userId: cookieValue})
            intervalTime = setInterval(() => {
                let cookieValue = getCookie("consultant");
                if(!cookieValue) {
                    setCloseStatus({}, true);
                }
            }, 100000);
        }
        // expireCookie("user-chat")
        // let chatData = getCookie("user-chat");
        // if(chatData) {
        //     chatData = JSON.parse(chatData);
        //     for(let i = 0; i < chatData.length; i++) {
        //         // let message = atob(chatData[i].message);
        //         let message = chatData[i].message;
        //         if(chatData[i].toOrFrom === 1) {
        //             let messageDiv = document.createElement('div');
        //             messageDiv.classList.add('message', 'user-message');
        //             messageDiv.innerHTML = `<div class="content">${message}</div>`;
        //             chatMessages.appendChild(messageDiv);
        //             chatMessages.scrollTop = chatMessages.scrollHeight;
        //         } else {
        //             let messageDiv      = document.createElement('div');
        //             messageDiv.classList.add('message', 'other-message');
        //             messageDiv.innerHTML = `<div class="content" style="word-wrap: break-word">${message}</div>`;
        //             chatMessages.appendChild(messageDiv);
        //             chatMessages.scrollTop = chatMessages.scrollHeight;
        //         }
        //     }
        // }
    })
    function setCloseStatus(data = {}, closed = false) {
        if(closed) {
            userId       = 0;
            $(".chat-messages").append(`
            <div class="jumbotron" align="center" style="font-size: 16px">
                Your chat session has been expired
            </div>`);
            $(".clearSession").hide();
            $(".noSession").show();
            chatMessages.scrollTop = chatMessages.scrollHeight;
            $("#chat-title").text("Chat");
            clearInterval(intervalTime);
            expireCookie("consultant")
            expireCookie("user-chat")
            expireCookie("clientName");
            $(".chat-messages").css({"paddingTop": "1%"});
            $("#user-message").attr("disabled", true);

        } else {
            $(".clearSession").show();
            $(".chat-messages").css({"paddingTop": "10%"});
            setCookie("consultant", data.userId, 5);
            userId       = data.userId;
            $(".noSession").hide();
            $("#user-message").attr("disabled", false);
            $(".jumbotron").hide();
        }
    }
    function convertToHtmlEntities(inputString) {
        return inputString.replace(/[&<>"'`;]/g, function(match) {
            switch(match) {
                case "&":
                    return "";
                case "<":
                    return "";
                case ">":
                    return "";
                case '"':
                    return "";
                case "'":
                    return "";
                case '`':
                    return "";
                case ';':
                    return ""; // HTML entity for semicolon
                default:
                    return match;
            }
        });
    }
    function setChatContent(cookieName, chatMessage, toOrFrom = 1) {
        let chatData = getCookie(cookieName);
        if (chatData) {
            chatData = JSON.parse(decodeURIComponent(chatData));
        } else {
            chatData = [];
        }
        chatData.push({ message: convertToHtmlEntities(chatMessage), toOrFrom: toOrFrom });
        setCookie(cookieName, JSON.stringify(chatData), 5);
    }
    $(".clickToClear").on("click", async function() {
        if(confirm("Are you sure? Do you want to close this session?")) {
            await AsyncAjax("{{url("chatMessage")}}", {message: 200, close: true, "channel": "chat"+userId, userId: userId});
            setCloseStatus({}, true);
        }
    });
</script>
@endsection


