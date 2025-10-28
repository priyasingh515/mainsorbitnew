@extends('admin.layouts.app')

@section('content')

<section class="content-header">
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Update Mains Practice Question</h1>
            </div>
          
        </div>
    </div>

</section>

<section class="content">

    <div class="container-fluid">
        <form  method="POST" action="{{route('mains.update',$mainsData->id)}}" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="state">State</label>
                                <select name="state" id="state" class="form-control">
                                    <option value="">Select</option>
                                    <option value="cg" {{ ($mainsData->state ?? '') == 'cg' ? 'selected' : '' }}>CG</option>
                                    <option value="mp" {{ ($mainsData->state ?? '') == 'mp' ? 'selected' : '' }}>MP</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="paper_type">Paper Type</label>
                                 <select name="paper_type" id="paper_type" class="form-control">
                                    <option value="">Select Paper Type</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="subject_type">Subject</label>
                                <select name="subject_type" id="subject_type" class="form-control">
                                    <option value="">Select Subject</option>
                                </select> 
                             </div>
                        </div>
    
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="mains_file">Upload PDF</label>
                                <input type="file" name="mains_file" id="mains_file" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pb-5 pt-3">
                <button type="submit" class="btn btn-primary">Submit</button>
                {{-- <a href="" class="btn btn-outline-dark ml-3">Cancel</a> --}}
            </div>
        </form>
    </div>
    
</section>

@endsection



@section('customJs')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
<script>
    document.addEventListener("DOMContentLoaded", function() {
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: "{{ session('success') }}",
            });
        @endif

        @if(session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: "{{ session('error') }}",
            });
        @endif

        @if($errors->any())
            let errorMessages = "";
            @foreach ($errors->all() as $error)
                errorMessages += "{{ $error }}\n";
            @endforeach

            Swal.fire({
                icon: 'error',
                title: 'Validation Error!',
                text: errorMessages,
            });
        @endif
    });
</script>

<script>
    $(document).ready(function () {
        // Load Paper Types based on selected state
        function loadPaperTypes(state, selectedPaperType = null) {
            if (state) {
                $.ajax({
                    url: '/admin/get_paper',
                    type: 'GET',
                    data: { state: state },
                    success: function (data) {
                        console.log('Paper Type Data:', data);
                        $('#paper_type').html('<option value="">Select Paper Type</option>');
                        $.each(data, function (key, value) {
                            var selected = (value.id == selectedPaperType) ? 'selected' : '';
                            $('#paper_type').append('<option value="' + value.id + '" ' + selected + '>' + value.paper_type_name + '</option>');
                        });

                        // If a paper type was selected, load its subjects
                        if (selectedPaperType) {
                            loadSubjects(selectedPaperType, "{{ $mainsData->subject_type ?? '' }}");
                        }
                    }
                });
            }
        }

        // Load Subjects based on selected paper type
        function loadSubjects(paperTypeId, selectedSubject = null) {
            if (paperTypeId) {
                $.ajax({
                    url: '/admin/get_subjects',
                    type: 'GET',
                    data: { paper_type_id: paperTypeId },
                    success: function (data) {
                        $('#subject_type').html('<option value="">Select Subject</option>');
                        $.each(data, function (key, value) {
                            var selected = (value.id == selectedSubject) ? 'selected' : '';
                            $('#subject_type').append('<option value="' + value.id + '" ' + selected + '>' + value.subject_name + '</option>');
                        });
                    }
                });
            }
        }

        // On State Change
        $('#state').on('change', function () {
            var state = $(this).val();
            $('#subject_type').html('<option value="">Select Subject</option>');
            loadPaperTypes(state);
        });

        // On Paper Type Change
        $('#paper_type').on('change', function () {
            var paperTypeId = $(this).val();
            loadSubjects(paperTypeId);
        });

        // Page Load: If state and paper_type already selected, load dependent data
        var selectedState = "{{ $mainsData->state ?? '' }}";
        var selectedPaperType = "{{ $mainsData->paper_type ?? '' }}";
        if (selectedState && selectedPaperType) {
            loadPaperTypes(selectedState, selectedPaperType);
        }
    });
</script>

@endsection