@extends('front.layouts.master')
@section('title','User Dashboard')
@section('content')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


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

        .btn-close.orange-close {
            /* background-color: orange; */
            opacity: 1;
            background-image: none;
            color: orange;
            font-size: 20px;
            line-height: 1;
            padding: 0.5rem;
            border-radius: 0.25rem;
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
                        <li class="list-group-item">
                            <a href="{{ route('profile') }}" class="text-decoration-none">👤 My Profile</a>
                        </li>
                        @if(auth()->check() && $hasPlan)
                            <li class="list-group-item">
                                <a href="{{url('current_affair')}}" class="text-decoration-none">📰 Monthly Current Affairs</a>
                            </li>
                        @endif
                    </ul>
                </nav>
        

                <main class="col-md-9 col-lg-9 justify-content-center align-items-center">
                    
                    <div class="col-md-10 mt-5 col-lg-12">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h1 style="margin-left: 26px">My Answer</h1>
                        </div>
                        

                        <?php $sn = 1; ?>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Username</th>
                                    <th>Submission Date</th>
                                    <th>checked Answer sheet</th>
                                    {{-- <th>Email</th> --}}
                                    <th>Doubts</th>
                                    <th>Reply</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($message as $item)
                                <tr>
                                    <td>{{ $sn++ }}</td>
                                    <td>{{ $item->username }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->submission)->format('d-M-Y') }}</td>
                                    <td>
                                        <a href="{{ asset('public/'.$item->check_file)}}" target="_blank">
                                            <img src="{{ asset('/public/assets/front/img/logos/pd.png') }}" alt="Doubt File" height="50" width="50">
                                        </a>
                                    </td>

                                    <td>
                                        <button class="btn btn-primary btn-sm view-description" 
                                                data-description="{{ $item->description }}"
                                                data-title="Doubt Message"
                                                data-bs-toggle="modal"
                                                data-bs-target="#descriptionModal">
                                            View
                                        </button>
                                    @if ($item->doubt_file)
                                        <a href="{{ asset('public/'.$item->doubt_file)}}" target="_blank">
                                            <img src="{{ asset('/public/assets/front/img/logos/pd.png') }}" alt="Doubt File" height="50" width="50">
                                        </a>
                                    @endif
                                    </td>
                                    <td>
                                        <button class="btn btn-success btn-sm view-description" 
                                                data-description="{{ $item->reply }}"
                                                data-title="Reply Message"
                                                data-bs-toggle="modal"
                                                data-bs-target="#descriptionModal">
                                            View
                                        </button>
                                    
                                        @if($item->resolve_file)
                                            <a href="{{ asset('public/'.$item->resolve_file) }}" target="_blank">
                                                <img src="{{ asset('/public/assets/front/img/logos/pd.png') }}" alt="Doubt File" height="50" width="50">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            
                        
                            <div class="modal fade" id="descriptionModal" tabindex="-1" aria-labelledby="descModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="descModalLabel">Content</h5>
                                      <button type="button" class="btn-close orange-close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
                                    </div>
                                    <div class="modal-body" id="descriptionModalBody">
                                      <!-- Content loads here -->
                                    </div>
                                  </div>
                                </div>
                              </div>
                            
                        </table>
                        
                    </div>

                </main>
            </div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const buttons = document.querySelectorAll('.view-description');
                const modalBody = document.getElementById('descriptionModalBody');
                const modalTitle = document.getElementById('descModalLabel');
        
                buttons.forEach(button => {
                    button.addEventListener('click', function () {
                        const content = this.getAttribute('data-description') || 'No content available';
                        const title = this.getAttribute('data-title') || 'Details';
        
                        modalBody.textContent = content;
                        modalTitle.textContent = title;
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