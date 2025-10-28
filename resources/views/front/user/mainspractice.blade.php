@extends('front.layouts.master')
@section('title','Mains practice Question paper')
@section('content')

        <style>
            .blinking {
            animation: blinker 1s linear infinite;
        }
        @keyframes blinker {
            50% { opacity: 0; }
        }

       
        </style>
        <section class="py-5 bg-light" style="height: auto">
            <div class="container">
                <h2 class="text-center mb-4 fw-bold">Mains Practice Question</h2>

                <div class="accordion" id="papersAccordion">
                    @foreach ($papers as $paperType => $subjects)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading{{ Str::slug($paperType) }}">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ Str::slug($paperType) }}">
                                    {{ $paperType }}
                                </button>
                            </h2>
                            <div id="collapse{{ Str::slug($paperType) }}" class="accordion-collapse collapse">
                                <div class="accordion-body">
                                    <ul class="list-group scrollable-list">
                                        {{-- Check if any subject is not null --}}
                                        @php
                                            $hasSubjects = $subjects->whereNotNull('subject_name')->count() > 0;
                                        @endphp
        
                                        @if ($hasSubjects)
                                            {{-- Subject-wise grouping --}}
                                            @foreach ($subjects->whereNotNull('subject_name')->sortBy('subject_name')->groupBy('subject_name') as $subjectType => $pdfs)
                                                <li class="list-group-item">
                                                    <a href="javascript:void(0);" onclick="togglePDFs('pdfList{{ Str::slug($paperType) }}-{{ Str::slug($subjectType) }}')">
                                                        {{ $subjectType }}
                                                    </a>
                                                    <ul class="list-group mt-2 d-none scrollable-list" id="pdfList{{ Str::slug($paperType) }}-{{ Str::slug($subjectType) }}">
                                                        @foreach ($pdfs->sortByDesc('created_at')->values() as $index => $pdf)
                                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                @if(Auth::check())
                                                                    <a href="{{ url('public/'.$pdf->mains_file) }}" target="_blank">View PDF</a>
                                                                @else
                                                                    <a href="javascript:void(0);" class="text-danger" data-bs-toggle="modal" data-bs-target="#loginModal">
                                                                        Login to view PDF
                                                                    </a>
                                                                @endif
                                                                @if ($index === 0)
                                                                    <span class="badge bg-danger blinking">New</span>
                                                                @endif
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            @endforeach
                                        @endif
        
                                        {{-- Show PDFs where subject_name is null --}}
                                        @foreach ($subjects->whereNull('subject_name')->sortByDesc('created_at')->values() as $index => $pdf)
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                @if(Auth::check())
                                                    <a href="{{ url('public/'.$pdf->mains_file) }}" target="_blank">View PDF</a>
                                                @else
                                                    <a href="javascript:void(0);" class="text-danger" data-bs-toggle="modal" data-bs-target="#loginModal">
                                                        Login to view PDF
                                                    </a>
                                                @endif
                                                @if ($index === 0)
                                                    <span class="badge bg-danger blinking">New</span>
                                                @endif
                                            </li>
                                        @endforeach
        
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </section>

       
        <script>
            function togglePDFs(id) {
                let pdfList = document.getElementById(id);
                pdfList.classList.toggle("d-none");
            }
        </script>

        <script>
            setTimeout(() => {
                const element = document.querySelectorAll('.submenu-button')[1];
                element.style.display = 'none';
            }, 1000); 
        </script>

@endsection