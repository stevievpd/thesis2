@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Review Student Page </h4><br><br>

                            <form method="post" action="{{ route('homework.review.update') }}" id="myForm"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $student_homework->id }}">
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Submitted File</label>
                                    <div class="form-group col-sm-10">
                                        <button class="btn btn-sm btn-primary"><a
                                            href="{{ asset('/uploads/'.$student_homework->file) }}" download
                                            style="color: rgb(255, 255, 255)">Download</a></button> <span> <em>{{ $student_homework->file }}</em> </span>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Student Name</label>
                                    <div class="form-group col-sm-10">
                                        <input name="name" class="form-control" type="text" value="{{$student_homework->student->name}}" readonly>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Category</label>
                                    <div class="form-group col-sm-10">
                                        <input name="name" class="form-control" value="Category" type="text" readonly>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Rating</label>
                                    <div class="form-group col-sm-10">
                                        <input name="rating" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="row mb-5">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Comment</label>
                                    <div class="form-group col-sm-10">
                                        <!-- Create the editor container -->
                                        <div id="descriptionQuill">
                                            <p>White your Comment Here</p>
                                            <p><br></p>
                                        </div>
                                        <textarea name="comment" id="comment" cols="30" rows="10" style="display: none"></textarea>
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="pt-3">
                                <input type="submit" class="btn btn-info waves-effect waves-light float-end" value="Submit Rating and Comment">
                            </div>
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>
    <script>
        var quill = new Quill('#descriptionQuill', {
            theme: 'snow'
        });
        $("#myForm").on("submit", function() {
            $("#comment").val($("#descriptionQuill .ql-editor").html());
        });
    </script>
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
