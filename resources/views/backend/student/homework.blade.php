@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css"
        rel="stylesheet">
    <link rel="stylesheet" href="{{url('/css/student/style.student.css')}}">
    {{-- dropzone --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>

    <div class="page-content">
        <div class="container-fluid">
            <div class="container text-center">

                <div class="container px-4 text-center">



                    <div class="row gx-3">
                        <div class="col shadow p-3 mb-5 bg-body-tertiary rounded"
                            style="background: radial-gradient(#13a4b1, #3fbafe);">
                            <h1 class="text-white">{{$homework->category}}</h1>

                            <div class="" style="padding:20px;">
                                <div class="three text-start">

                                </div>
                                <div>
                                    {{-- <h5>Homework Grade: <span class="badge bg-success">Grade</span></h5> --}}

                                </div>
                                <div class="card__title" style="font-size:16px" style="width:60%; margin:auto;">
                                    <p class="justified">
                                        {!! $homework->description !!}
                                    </p>
                                
                                </div>
                                <div class="row">
                                    <div class="mb-2 col-6">
                                        <div class="">
                                            <h6>{{ $homework->video_link }}</h6>
                                        </div>
                                        <div class=""><button class="watch btn btn-light"><a
                                                    href="{{ $homework->video_link }}" target="_blank"
                                                    style="color: rgb(37, 35, 35)">Watch Here</a></button></div>
                                    </div>
                                    <div class="mb-5 col-6">
                                        <div class="">
                                            <h6>{{ $homework->file }}</h6>
                                        </div>
                                        <div class=""><button class="watch btn btn-light"><a
                                                    href="{{ asset('/uploads/' . $homework->file) }}" download
                                                    style="color: rgb(37, 35, 35)">Download</a></button></div>
                                    </div>


                                </div>


                                <form action="{{ route('student.homework.store') }}" method="post"
                                    enctype="multipart/form-data">
                                    <input type="hidden" name="subject_id" value="{{ $homework->subject_id }}">
                                    <input type="hidden" name="homework_id" value="{{ $homework->category }}">
                                    <div class="mb-2 p-1 bg-body-tertiary rounded" style="width:93%;margin:auto">
                                        <h2 class="">Upload File</h2>
                                    </div>

                                    @csrf
                                    <input type="hidden" name="teacher_id" value="{{ $homework->teacher_id }}" readonly>
                                    <div class="custom-file">
                                        <div class="row">

                                            <div class="col"><label class="custom-file-label" for="chooseFile"
                                                    style="font-size:30px"><i class="fa-solid fa-cloud-arrow-up"></i> Select
                                                    file</label>
                                            </div>
                                        </div>
                                        <div style="width:50%; margin:auto;">
                                            <input class="form-control form-control-lg custom-file-input" id="chooseFile"
                                                type="file" name="file">
                                        </div>
                                    </div>
                                    <button type="submit" name="submit" class="sbmit btn btn-light btn-block mt-4"
                                        style="font-size: 20px;">
                                        Submit Homework
                                    </button>
                                </form>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .card__title {
            grid-row: 3/4;
            font-weight: 400;
            color: #ffffff;

        }

        .justified {
            text-align: right !important;
        }

        .ql-align-justify{
            text-align: justify;
        }
    </style>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    name: {
                        required: true,
                    },
                    grade: {
                        required: true,
                    },
                    guardian_name: {
                        required: true,
                    },
                    guardian_mobile_no: {
                        required: true,
                    },
                    guardian_email: {
                        required: true,
                    },
                    student_image: {
                        required: true,
                    },
                    address: {
                        required: true,
                    },
                },
                messages: {
                    name: {
                        required: 'Please enter your Name',
                    },
                    grade: {
                        required: 'Please enter your grade',
                    },
                    guardian_name: {
                        required: 'Please enter your guardian name',
                    },
                    guardian_mobile_no: {
                        required: 'Please enter your Mobile No',
                    },
                    guardian_email: {
                        required: 'Please enter the valid Email Address',
                    },
                    address: {
                        required: 'Please enter your Address',
                    },
                    student_image: {
                        required: 'Please select an Image',
                    },
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
