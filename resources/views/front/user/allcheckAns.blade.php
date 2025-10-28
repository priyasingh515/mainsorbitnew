@extends('front.layouts.master')
@section('title','User Dashboard')
@section('content')
<!-- jQuery (Agar already included hai to ignore karein) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Bootstrap JS (Agar already included hai to ignore karein) -->
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> --}}

<style>
    .sidebar {
            background: #ebebeb57;
            color: white;
            padding: 20px;
            height: 100vh;
        }

        @media (max-width: 768px) {
            .sidebar {
                display: block !important;
                width: 100%;
                padding: 15px;
                height: auto;
            }
        }

        /* Main Content Fix */
        main {
            min-height: 100vh !important;
            height: auto !important;
        }
        .contact-form {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }
        .page-title-section{
            padding: 9px 0 90px
        }

        @media (max-width: 768px) {
            .table-responsive {
                width: 100% !important;
                max-width: 100%;
                overflow-x: auto !important;
                padding: 0 10px;
            }
            .table {
                margin-left: 0 !important;
                margin-right: auto !important;
            }

            main {
                align-items: flex-start !important;
            }
        }
</style>



        <div class="container-fluid">
            <div class="row">
                <!-- Sidebar -->
                <nav class="col-md-3 col-lg-3 sidebar d-none d-md-block">
                    @if(Auth::user()->name)
                        <h4 style="font-size: 12px">Name: {{ Auth::user()->name }}</h4>
                    @else
                        <h4 style="font-size: 12px">Email: {{ Auth::user()->email }}</h4>
                    @endif
                    {{-- @if ($activePlan)
                        <div class="alert alert-info">
                            <strong>Plan Details:</strong><br>
                            <b>Purchase Date:</b>{{$activePlan->name}}<br>
                            <b>Purchase Date:</b> {{ date('d M, Y', strtotime($activePlan->purchase_date)) }}<br>
                            <b>Expiry Date:</b> {{ date('d M, Y', strtotime($activePlan->expiry_date)) }}
                        </div>
                    @endif --}}
                    <ul class="list-group">
                        {{-- <li class="list-group-item">
                            <a href="{{ route('user.count') }}" class="text-decoration-none">📊 Dashboard</a>
                        </li> --}}
                        <li class="list-group-item">
                            <a href="{{ route('user.answerForm') }}" class="text-decoration-none">📝 Submit Answer</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{url('/answerList')}}" class="text-decoration-none">📂 My Answers</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ route('user.msg') }}" class="text-decoration-none">💬 Doubt Messages</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ route('user.count') }}" class="text-decoration-none">📊 Your Report</a>
                        </li>
                        @if(auth()->check() && $hasPlan)
                            <li class="list-group-item">
                                <a href="{{url('current_affair')}}" class="text-decoration-none">📰 Monthly Current Affairs</a>
                            </li>
                        @endif
                    </ul>
                </nav>
        
                <!-- Main Content -->
                <main class="col-md-9 col-lg-9 justify-content-center align-items-center">
                    
                    <div class="col-md-10 mt-5 col-lg-12">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 style="margin-left: 26px">My Answer</h5>
                        </div>
                        

                        <?php $sn = 1; ?>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Submission date</th>
                                        <th>No of Question</th>
                                        <th>Answer sheet</th>
                                       
                                        <th>Status</th>
                                        <th>Action</th>
                                        @if($checkAnsw->contains(function($item){ return !empty($item->remark); }))
                                            <th>Remark</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($checkAnsw as $item)
                                    <tr>
                                        <td>{{ $sn++ }}</td>
                                        <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d-M-Y') }}</td>
                                        <td>{{ $item->question_no }}</td>

                                        @if(!$item->check_file)
                                            <td>
                                                @if($item->answer_pdf) 
                                                    <a href="{{ url('public/'.$item->answer_pdf) }}" target="_blank" class="btn btn-info btn-sm">View PDF</a>
                                                @else
                                                    <span class="text-danger">No PDF</span>
                                                @endif
                                            </td>
                                        @else 
                                            <td>
                                                <a href="{{ url('public/'.$item->check_file) }}" target="_blank" class="btn btn-success btn-sm">View Checked PDF</a>
                                            </td>
                                        @endif

                                        

                                        <td>
                                            <span class="badge 
                                                @if($item->status == 'checked') bg-success 
                                                @elseif($item->status == 'pending' || $item->status == 'assigned') bg-danger 
                                                @endif">
                                                {{ $item->status == 'assigned' ? 'Pending' : ucfirst($item->status) }}
                                            </span>
                                        </td>
                                        
                                        <td>
                                            @if(empty($item->teacher_name))
                                                <button class="btn btn-secondary btn-sm" disabled>Ask Doubt</button>
                                            @elseif(!empty($item->doubt_id))
                                                <button 
                                                    class="btn btn-secondary btn-sm ask-doubt-redirect-btn">
                                                    Ask Doubt
                                                </button>
                                            @else
                                                <button 
                                                    class="btn btn-primary btn-sm ask-doubt-btn" 
                                                    data-answer-id="{{ $item->id }}">
                                                    Ask Doubt 
                                                </button>
                                            @endif
                                        </td>

                                        @if(!empty($item->remark))
                                            <td>
                                                <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#remarkModal" data-message="{{ $item->remark }}">
                                                    View 
                                                </button>
                                            </td>
                                        @endif
                                    </tr>
                                    
                                    @endforeach
                                    {{-- Remark message --}}

                                    
                                    <div class="modal fade" id="askDoubtModal" tabindex="-1" aria-labelledby="askDoubtModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="askDoubtModalLabel">Ask Your Doubt</h5>
                                                    <button type="button" class="btn position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close">
                                                        <i class="fa-solid fa-xmark" style="color: #ff7029; font-size: 1.2rem;"></i>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form id="askDoubtForm" enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="hidden" value="" name="answer_id" id="answer_id"> 
                                    
                                                        <div class="mb-3">
                                                            <label for="doubt_description" class="form-label">Doubt Message</label>
                                                            <textarea class="form-control" id="doubt_description" name="description" placeholder="Type your doubt..." rows="4" required></textarea>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="doubt_file" class="form-label">Attach a file (optional)</label>
                                                            <input type="file" class="form-control" id="doubt_file" name="doubt_file" accept=".pdf,.doc,.docx,.jpg,.png">
                                                        </div>
                                                        <p style="font-size: 10px"><i class="fa-solid fa-circle-exclamation"></i>You can ask a doubt only once</p>
    
                                    
                                                        <div class="mt-3">
                                                            <button type="submit" id="submitButton" class="btn btn-primary">
                                                                <span class="spinner-border spinner-border-sm d-none me-2" role="status" aria-hidden="true"></span>
                                                                Submit
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </tbody>
                                
                            </table>
                            <div class="modal fade" id="remarkModal" tabindex="-1" aria-labelledby="remarkModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Message</h5>
                                            <button type="button" class="btn position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close">
                                                <i class="fa-solid fa-xmark" style="color: #ff7029; font-size: 1.2rem;"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body" id="messageContent">
                                            <!-- Message content will appear here -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                        
                    </div>

                </main>
            </div>
        </div>
        {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> --}}
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            // Wait for DOM to load
            document.addEventListener("DOMContentLoaded", function () {
                var messageModal = document.getElementById('remarkModal');

                messageModal.addEventListener('show.bs.modal', function (event) {
                    var button = event.relatedTarget; // Button that triggered the modal
                    var message = button.getAttribute('data-message'); // Extract info from data-* attributes
                    var modalBody = messageModal.querySelector('#messageContent');

                    modalBody.textContent = message;
                });
            });
        </script>
        
        <script>
            $(document).ready(function () {
                // Open modal for new doubt
                $('.ask-doubt-btn').on('click', function () {
                    const answerId = $(this).data('answer-id');
                    $('#answer_id').val(answerId);
                    $('#askDoubtModal').modal('show');
                    $('#askDoubtModal').data('button', $(this));
                });

                // Submit doubt
                $('#askDoubtForm').on('submit', function (e) {
                    e.preventDefault();
                    const formData = new FormData(this);
                    const $submitBtn = $('#submitButton');
                    const $spinner = $submitBtn.find('.spinner-border');
                    const $modal = $('#askDoubtModal');
                    const $buttonToDisable = $modal.data('button');

                    $submitBtn.prop('disabled', true);
                    $spinner.removeClass('d-none');

                    $.ajax({
                        url: '{{ route("submit.doubt") }}',
                        method: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function (res) {
                            $spinner.addClass('d-none');
                            $submitBtn.prop('disabled', false);
                            $modal.modal('hide');
                            $('#askDoubtForm')[0].reset();

                            // Convert button to redirect version
                            $buttonToDisable
                                .removeClass('btn-primary ask-doubt-btn')
                                .addClass('btn-secondary ask-doubt-redirect-btn')
                                .text('Ask Doubt');
                        },
                        error: function (err) {
                            $spinner.addClass('d-none');
                            $submitBtn.prop('disabled', false);
                            alert('Something went wrong!');
                        }
                    });
                });

                // Redirect to doubt messages page
                $(document).on('click', '.ask-doubt-redirect-btn', function () {
                    window.location.href = '/usermessage'; // 🔹 apna page route yahan likho
                });
            });
        </script>

        <script>
            document.addEventListener("DOMContentLoaded", function () {
                document.querySelectorAll(".ask-doubt-btn").forEach(button => {
                    button.addEventListener("click", function (event) {
                        if (this.hasAttribute("disabled")) {
                            event.preventDefault();
                            return;
                        }
                        
                        let answerId = this.getAttribute("data-answer-id");
                        document.getElementById("answer_id").value = answerId;
                        let askDoubtModal = new bootstrap.Modal(document.getElementById("askDoubtModal"));
                        askDoubtModal.show();
                    });
                });
            });
        </script>
        <script>
            setTimeout(() => {
                const element = document.querySelectorAll('.submenu-button')[1];
                element.style.display = 'none';
            }, 1000); 
        </script>

@endsection