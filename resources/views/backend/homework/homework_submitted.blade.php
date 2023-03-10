@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Homework All</h4>
                    </div>
                </div>
            </div>

            <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

            <!-- end page title -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">


                            <h4 class="card-title">Homrwork All Data </h4>
                            <table id="datatable" class="table table-bordered dt-responsive wrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Student Name</th>
                                        <th>Subject</th>
                                        <th>Teacher</th>
                                        <th>rating</th>
                                        <th>Comment</th>
                                        <th>File</th>
                                        <th>Action</th>
                                </thead>
                                <tbody>
                                    @foreach ($student_homework as $key => $item)
                                        <tr>
                                            <td style="width: 5%"> {{ $key + 1 }} </td>
                                            <td style="width: 10%"> {{ $item->student->name }} </td>
                                            <td style="width: 10%"> {{ $item->subject->name }} </td>
                                            <td style="width: 10%"> {{ $item->teacher->name }} </td>
                                            <td style="width: 25%"> {{ $item->rating }} </td>
                                            <td style="width: 25%"> {!! $item->comment !!} </td>
                                            <td style="width: 10%"> {{ $item->file }} </td>

                                            <td>
                                                <a href="{{ route('homework.review', $item->id) }}" class="btn btn-info sm"
                                                    title="Edit Data"> <i class="fas fa-edit"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div> <!-- container-fluid -->
    </div>
@endsection
