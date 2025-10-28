@extends('front.layouts.master')
@section('title','PYQ')
@section('content')


<style>
    .page-title-section{
            padding: 9px 0 90px
        }
</style>



        <section class="py-5 bg-light">
            <div class="container">
                <h2 class="text-center mb-4 fw-bold">Previous Year Question paper</h2>
        
                <div class="accordion" id="papersAccordion">
                    @foreach ($cgpyq as $paperType => $subjects)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading{{ Str::slug($paperType) }}">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ Str::slug($paperType) }}">
                                    {{$paperType}}
                                    
                                </button>
                            </h2>
                            <div id="collapse{{ Str::slug($paperType) }}" class="accordion-collapse collapse">
                                <div class="accordion-body">
                                    <ul class="list-group">
                                        @foreach ($subjects->sortBy('subject_name')->groupBy('subject_name') as $subjectType => $pdfs)
                                            <li class="list-group-item">
                                                <a href="javascript:void(0);" onclick="togglePDFs('pdfList{{ Str::slug($paperType) }}-{{ Str::slug($subjectType) }}')">
                                                    {{$subjectType}}
                
                                                </a>
                                                <ul class="list-group mt-2 d-none" id="pdfList{{ Str::slug($paperType) }}-{{ Str::slug($subjectType) }}">
                                                    @foreach ($pdfs as $pdf)
                                                        
                                                        <li class="list-group-item">
                                                            @if(Auth::check())
                                                                <a href="{{ url('public/'.$pdf->pdf_path) }}" target="_blank">View PDF</a>
                                                            @else
                                                                <a href="javascript:void(0);" class="text-danger" data-bs-toggle="modal" data-bs-target="#loginModal">
                                                                    Login to view PDF
                                                                </a>
                                                            @endif
                                                        </li>
                                                    @endforeach
                                                </ul>
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

      

    
@endsection