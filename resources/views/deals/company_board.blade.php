@if (isset($stages))
    <div class="row mt-2">
        <?php
        $icount = 0;
        ?>
        @foreach ($stages as $stage)
            <?php
            $icount++;
            ?>
            <div class="col">
                <div class="card-transparent mb-0 desk-info">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <h6 class="text-warning mb-0">{{ $stage->title }}</h6>
                                            {{-- <div class="dropdown">
                                                <span class="d-flex align-items-center h5 mb-0"
                                                    id="dropdownMenuButton08" role="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <svg class="icon-24" xmlns="http://www.w3.org/2000/svg"
                                                        width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none">
                                                        <g>
                                                            <g>
                                                                <circle cx="7" cy="12" r="1"
                                                                    fill="black"></circle>
                                                                <circle cx="12" cy="12" r="1"
                                                                    fill="black"></circle>
                                                                <circle cx="17" cy="12" r="1"
                                                                    fill="black"></circle>
                                                            </g>
                                                        </g>
                                                    </svg>
                                                </span>
                                                <div class="dropdown-menu dropdown-menu-end"
                                                    aria-labelledby="dropdownMenuButton08" style="">
                                                    <a class="dropdown-item" href="#">
                                                        <svg class="icon-20" width="20" viewBox="0 0 24 24"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path opacity="0.4"
                                                                d="M18.8088 9.021C18.3573 9.021 17.7592 9.011 17.0146 9.011C15.1987 9.011 13.7055 7.508 13.7055 5.675V2.459C13.7055 2.206 13.5026 2 13.253 2H7.96363C5.49517 2 3.5 4.026 3.5 6.509V17.284C3.5 19.889 5.59022 22 8.16958 22H16.0453C18.5058 22 20.5 19.987 20.5 17.502V9.471C20.5 9.217 20.298 9.012 20.0465 9.013C19.6247 9.016 19.1168 9.021 18.8088 9.021Z"
                                                                fill="currentColor"></path>
                                                            <path opacity="0.4"
                                                                d="M16.0842 2.56737C15.7852 2.25637 15.2632 2.47037 15.2632 2.90137V5.53837C15.2632 6.64437 16.1742 7.55437 17.2792 7.55437C17.9772 7.56237 18.9452 7.56437 19.7672 7.56237C20.1882 7.56137 20.4022 7.05837 20.1102 6.75437C19.0552 5.65737 17.1662 3.69137 16.0842 2.56737Z"
                                                                fill="currentColor"></path>
                                                            <path
                                                                d="M14.3672 12.2364H12.6392V10.5094C12.6392 10.0984 12.3062 9.7644 11.8952 9.7644C11.4842 9.7644 11.1502 10.0984 11.1502 10.5094V12.2364H9.4232C9.0122 12.2364 8.6792 12.5704 8.6792 12.9814C8.6792 13.3924 9.0122 13.7264 9.4232 13.7264H11.1502V15.4524C11.1502 15.8634 11.4842 16.1974 11.8952 16.1974C12.3062 16.1974 12.6392 15.8634 12.6392 15.4524V13.7264H14.3672C14.7782 13.7264 15.1122 13.3924 15.1122 12.9814C15.1122 12.5704 14.7782 12.2364 14.3672 12.2364Z"
                                                                fill="currentColor"></path>
                                                        </svg>
                                                        Duplicate
                                                    </a>
                                                    <a class="dropdown-item" href="#">
                                                        <svg class="icon-20" width="20" viewBox="0 0 24 24"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path opacity="0.4"
                                                                d="M19.9927 18.9534H14.2984C13.7429 18.9534 13.291 19.4124 13.291 19.9767C13.291 20.5422 13.7429 21.0001 14.2984 21.0001H19.9927C20.5483 21.0001 21.0001 20.5422 21.0001 19.9767C21.0001 19.4124 20.5483 18.9534 19.9927 18.9534Z"
                                                                fill="currentColor"></path>
                                                            <path
                                                                d="M10.309 6.90385L15.7049 11.2639C15.835 11.3682 15.8573 11.5596 15.7557 11.6929L9.35874 20.0282C8.95662 20.5431 8.36402 20.8344 7.72908 20.8452L4.23696 20.8882C4.05071 20.8903 3.88775 20.7613 3.84542 20.5764L3.05175 17.1258C2.91419 16.4915 3.05175 15.8358 3.45388 15.3306L9.88256 6.95545C9.98627 6.82108 10.1778 6.79743 10.309 6.90385Z"
                                                                fill="currentColor"></path>
                                                            <path opacity="0.4"
                                                                d="M18.1208 8.66544L17.0806 9.96401C16.9758 10.0962 16.7874 10.1177 16.6573 10.0124C15.3927 8.98901 12.1545 6.36285 11.2561 5.63509C11.1249 5.52759 11.1069 5.33625 11.2127 5.20295L12.2159 3.95706C13.126 2.78534 14.7133 2.67784 15.9938 3.69906L17.4647 4.87078C18.0679 5.34377 18.47 5.96726 18.6076 6.62299C18.7663 7.3443 18.597 8.0527 18.1208 8.66544Z"
                                                                fill="currentColor"></path>
                                                        </svg>
                                                        Rename
                                                    </a>
                                                    <a class="dropdown-item" href="#">
                                                        <svg class="icon-20" width="20" viewBox="0 0 24 24"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path opacity="0.4"
                                                                d="M19.643 9.48851C19.643 9.5565 19.11 16.2973 18.8056 19.1342C18.615 20.8751 17.4927 21.9311 15.8092 21.9611C14.5157 21.9901 13.2494 22.0001 12.0036 22.0001C10.6809 22.0001 9.38741 21.9901 8.13185 21.9611C6.50477 21.9221 5.38147 20.8451 5.20057 19.1342C4.88741 16.2873 4.36418 9.5565 4.35445 9.48851C4.34473 9.28351 4.41086 9.08852 4.54507 8.93053C4.67734 8.78453 4.86796 8.69653 5.06831 8.69653H18.9388C19.1382 8.69653 19.3191 8.78453 19.4621 8.93053C19.5953 9.08852 19.6624 9.28351 19.643 9.48851Z"
                                                                fill="currentColor"></path>
                                                            <path
                                                                d="M21 5.97686C21 5.56588 20.6761 5.24389 20.2871 5.24389H17.3714C16.7781 5.24389 16.2627 4.8219 16.1304 4.22692L15.967 3.49795C15.7385 2.61698 14.9498 2 14.0647 2H9.93624C9.0415 2 8.26054 2.61698 8.02323 3.54595L7.87054 4.22792C7.7373 4.8219 7.22185 5.24389 6.62957 5.24389H3.71385C3.32386 5.24389 3 5.56588 3 5.97686V6.35685C3 6.75783 3.32386 7.08982 3.71385 7.08982H20.2871C20.6761 7.08982 21 6.75783 21 6.35685V5.97686Z"
                                                                fill="currentColor"></path>
                                                        </svg>
                                                        Delete
                                                    </a>
                                                </div>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="group2-wrap">
                                <div class="group" id="group{{ $icount }}" data-stage_id="{{ $stage->id }}">
                                    @if (isset($deals))
                                        @foreach ($deals as $deal)
                                            @if ($stage->id == $deal->stage_id)
                                                <div class="col-lg-12 group__item" data-deal_id="{{ $deal->id }}" data-user_id="{{ $deal->user_id }}">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div
                                                                class="d-grid grid-flow-col align-items-center justify-content-between mb-2">
                                                                <div class="d-flex align-items-center">
                                                                    <p class="mb-0"><b>Deal Details</b></p>
                                                                    {{-- <svg class="icon-20" width="20"
                                                                        viewBox="0 0 24 24" fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M8.5 5L15.5 12L8.5 19"
                                                                            stroke="currentColor" stroke-width="1.5"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round"></path>
                                                                    </svg> --}}
                                                                    {{-- <p class="mb-0">List</p> --}}
                                                                </div>
                                                                <div class="dropdown">
                                                                    <span class="h5" id="dropDown-011"
                                                                        role="button" data-bs-toggle="dropdown"
                                                                        aria-expanded="false">
                                                                        <svg class="icon-24"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            width="24" height="24"
                                                                            viewBox="0 0 24 24" fill="none">
                                                                            <g>
                                                                                <g>
                                                                                    <circle cx="7"
                                                                                        cy="12" r="1"
                                                                                        fill="black"></circle>
                                                                                    <circle cx="12"
                                                                                        cy="12" r="1"
                                                                                        fill="black"></circle>
                                                                                    <circle cx="17"
                                                                                        cy="12" r="1"
                                                                                        fill="black"></circle>
                                                                                </g>
                                                                            </g>
                                                                        </svg>
                                                                    </span>
                                                                    <div class="dropdown-menu dropdown-menu-end"
                                                                        aria-labelledby="dropDown-011" style="">
                                                                        <a class="dropdown-item" href="#">
                                                                            <svg class="icon-20" width="20"
                                                                                viewBox="0 0 24 24" fill="none"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path opacity="0.4"
                                                                                    d="M18.8088 9.021C18.3573 9.021 17.7592 9.011 17.0146 9.011C15.1987 9.011 13.7055 7.508 13.7055 5.675V2.459C13.7055 2.206 13.5026 2 13.253 2H7.96363C5.49517 2 3.5 4.026 3.5 6.509V17.284C3.5 19.889 5.59022 22 8.16958 22H16.0453C18.5058 22 20.5 19.987 20.5 17.502V9.471C20.5 9.217 20.298 9.012 20.0465 9.013C19.6247 9.016 19.1168 9.021 18.8088 9.021Z"
                                                                                    fill="currentColor"></path>
                                                                                <path opacity="0.4"
                                                                                    d="M16.0842 2.56737C15.7852 2.25637 15.2632 2.47037 15.2632 2.90137V5.53837C15.2632 6.64437 16.1742 7.55437 17.2792 7.55437C17.9772 7.56237 18.9452 7.56437 19.7672 7.56237C20.1882 7.56137 20.4022 7.05837 20.1102 6.75437C19.0552 5.65737 17.1662 3.69137 16.0842 2.56737Z"
                                                                                    fill="currentColor"></path>
                                                                                <path
                                                                                    d="M14.3672 12.2364H12.6392V10.5094C12.6392 10.0984 12.3062 9.7644 11.8952 9.7644C11.4842 9.7644 11.1502 10.0984 11.1502 10.5094V12.2364H9.4232C9.0122 12.2364 8.6792 12.5704 8.6792 12.9814C8.6792 13.3924 9.0122 13.7264 9.4232 13.7264H11.1502V15.4524C11.1502 15.8634 11.4842 16.1974 11.8952 16.1974C12.3062 16.1974 12.6392 15.8634 12.6392 15.4524V13.7264H14.3672C14.7782 13.7264 15.1122 13.3924 15.1122 12.9814C15.1122 12.5704 14.7782 12.2364 14.3672 12.2364Z"
                                                                                    fill="currentColor"></path>
                                                                            </svg>
                                                                            Duplicate
                                                                        </a>
                                                                        <a class="dropdown-item" href="#">
                                                                            <svg class="icon-20" width="20"
                                                                                viewBox="0 0 24 24" fill="none"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path opacity="0.4"
                                                                                    d="M19.9927 18.9534H14.2984C13.7429 18.9534 13.291 19.4124 13.291 19.9767C13.291 20.5422 13.7429 21.0001 14.2984 21.0001H19.9927C20.5483 21.0001 21.0001 20.5422 21.0001 19.9767C21.0001 19.4124 20.5483 18.9534 19.9927 18.9534Z"
                                                                                    fill="currentColor"></path>
                                                                                <path
                                                                                    d="M10.309 6.90385L15.7049 11.2639C15.835 11.3682 15.8573 11.5596 15.7557 11.6929L9.35874 20.0282C8.95662 20.5431 8.36402 20.8344 7.72908 20.8452L4.23696 20.8882C4.05071 20.8903 3.88775 20.7613 3.84542 20.5764L3.05175 17.1258C2.91419 16.4915 3.05175 15.8358 3.45388 15.3306L9.88256 6.95545C9.98627 6.82108 10.1778 6.79743 10.309 6.90385Z"
                                                                                    fill="currentColor"></path>
                                                                                <path opacity="0.4"
                                                                                    d="M18.1208 8.66544L17.0806 9.96401C16.9758 10.0962 16.7874 10.1177 16.6573 10.0124C15.3927 8.98901 12.1545 6.36285 11.2561 5.63509C11.1249 5.52759 11.1069 5.33625 11.2127 5.20295L12.2159 3.95706C13.126 2.78534 14.7133 2.67784 15.9938 3.69906L17.4647 4.87078C18.0679 5.34377 18.47 5.96726 18.6076 6.62299C18.7663 7.3443 18.597 8.0527 18.1208 8.66544Z"
                                                                                    fill="currentColor"></path>
                                                                            </svg>
                                                                            Rename
                                                                        </a>
                                                                        <a class="dropdown-item" href="#">
                                                                            <svg class="icon-20" width="20"
                                                                                viewBox="0 0 24 24" fill="none"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path opacity="0.4"
                                                                                    d="M19.643 9.48851C19.643 9.5565 19.11 16.2973 18.8056 19.1342C18.615 20.8751 17.4927 21.9311 15.8092 21.9611C14.5157 21.9901 13.2494 22.0001 12.0036 22.0001C10.6809 22.0001 9.38741 21.9901 8.13185 21.9611C6.50477 21.9221 5.38147 20.8451 5.20057 19.1342C4.88741 16.2873 4.36418 9.5565 4.35445 9.48851C4.34473 9.28351 4.41086 9.08852 4.54507 8.93053C4.67734 8.78453 4.86796 8.69653 5.06831 8.69653H18.9388C19.1382 8.69653 19.3191 8.78453 19.4621 8.93053C19.5953 9.08852 19.6624 9.28351 19.643 9.48851Z"
                                                                                    fill="currentColor"></path>
                                                                                <path
                                                                                    d="M21 5.97686C21 5.56588 20.6761 5.24389 20.2871 5.24389H17.3714C16.7781 5.24389 16.2627 4.8219 16.1304 4.22692L15.967 3.49795C15.7385 2.61698 14.9498 2 14.0647 2H9.93624C9.0415 2 8.26054 2.61698 8.02323 3.54595L7.87054 4.22792C7.7373 4.8219 7.22185 5.24389 6.62957 5.24389H3.71385C3.32386 5.24389 3 5.56588 3 5.97686V6.35685C3 6.75783 3.32386 7.08982 3.71385 7.08982H20.2871C20.6761 7.08982 21 6.75783 21 6.35685V5.97686Z"
                                                                                    fill="currentColor"></path>
                                                                            </svg>
                                                                            Delete
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="card-body p-0 pt-2">
                                                                {{-- <p class="card-text"><b>ID:</b> {{ $deal->id }}</p> --}}
                                                                <p class="card-text"><b>Title:</b> {{ $deal->title }}
                                                                </p>
                                                                <p class="card-text"><b>Amount:</b> {{ $deal->amount }}
                                                                </p>
                                                                <p class="card-text"><b>Deal Owner:</b>
                                                                    {{ $deal->deal_owner }}</p>
                                                                <p class="card-text"><b>Source:</b>
                                                                    {{ $deal->lead_source }}</p>
                                                                <p class="card-text"><b>Pipeline:</b>
                                                                    {{ $deal->pipeline }}</p>
                                                                {{-- <p class="card-text"><b>Stage:</b>
                                                                    {{ $deal->stage->title }}</p> --}}
                                                            </div>
                                                        </div>
                                                        <span class="remove"></span>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif

<script type="text/javascript">
    var stages = {{ count($stages) }};
    var sortableSpeed = 150;
    var groups = Array();
    var deal_id = 0;
    var user_id = 0;
    var from_stage_id = 0;
    var to_stage_id = 0;
    for (var i = 1; i <= stages; i++) {
        groups.push('group' + i);
    }
    for (var i = 0; i < stages; i++) {
        var group1 = document.getElementById(groups[i]);
        var sortable1 = Sortable.create(group1, {
            group: {
                name: groups[i],
                put: groups
            },
            cursor: 'move',
            animation: sortableSpeed,
            onMove: function(evt) {
                deal_id = $(evt.dragged).data('deal_id');
                user_id = $(evt.dragged).data('user_id');
                var dropGroup = evt.to;
                group2.classList.add("adding");
            },
            onSort: function(evt) {
                evt.from.classList.remove("adding");
            },
            onEnd: function(evt) {
                from_stage_id = $(evt.from).data('stage_id');
                to_stage_id = $(evt.to).data('stage_id');
                group2.classList.remove("adding");
                if(from_stage_id!=to_stage_id)
                UpdateDealStage(user_id, deal_id, to_stage_id);
            },
            filter: ".remove",
            onFilter: function(evt) {
                var item = evt.item,
                    ctrl = evt.target;
                if (Sortable.utils.is(ctrl, ".remove")) {
                    $(item).slideUp('400', function() {
                        $(item).remove();
                    });
                }
            }
        });
    }
    if (!Element.prototype.matches) {
        Element.prototype.matches = Element.prototype.msMatchesSelector;
    }

    function UpdateDealStage(user_id, deal_id, stage_id) {
        var url = "{{ route('user.deals.updatestage', [':user_id', ':deal_id']) }}";
        url = url.replace(':user_id', user_id);
        url = url.replace(':deal_id', deal_id);
        $('#show_loading').show();
        $.post({
            url: url,
            type: 'POST',
            data: {
                _token: "{{ csrf_token() }}",
                deal_id: deal_id,
                stage_id: stage_id
            },
            success: function(res) {
                $('#show_loading').hide();
            },
            error: function(res) {
                $('#show_loading').hide();
                if (res.responseJSON.error_msg) {
                    alert(res.responseJSON.error_msg);
                }
            }
        });
    }
</script>
