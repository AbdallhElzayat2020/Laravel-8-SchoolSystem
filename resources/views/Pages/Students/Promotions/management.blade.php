@extends('layouts.master')
@section('css')
@section('title')
    {{ trans('language.Students_Promotions_update') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{ trans('language.Students_Promotions_update') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div class="col-xl-12 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            {{-- button for Modal --}}
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#Delete_all">
                                {{ __('Students_trans.back_promotions_update_btn') }}
                            </button>

                            <br><br>
                            <div class="table-responsive">
                                <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                    data-page-length="50" style="text-align: center">
                                    <thead>
                                        <tr>
                                            <th class="alert-info">#</th>
                                            <th class="alert-info">{{ trans('students_trans.student_name') }}</th>
                                            <th class="alert-danger">{{ trans('students_trans.f_grade') }}</th>
                                            <th class="alert-danger">{{ trans('students_trans.f_sections') }}</th>
                                            <th class="alert-danger">{{ trans('students_trans.f_classroom') }}</th>
                                            <th class="alert-danger">{{ trans('students_trans.academic_year') }}</th>


                                            <th class="alert-success">{{ trans('students_trans.t_grade') }}</th>
                                            <th class="alert-success">{{ trans('students_trans.t_classroom') }}</th>
                                            <th class="alert-success">{{ trans('students_trans.t_sections') }}</th>
                                            <th class="alert-success">{{ trans('students_trans.academic_year_new') }}
                                            </th>
                                            <th class="alert-info">{{ trans('students_trans.Processes') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($promotions as $key => $promotion)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $promotion->student_name->name }}</td>
                                                <td>{{ $promotion->f_grade->Name }}</td>
                                                <td>{{ $promotion->f_classroom->Class_Name }}</td>
                                                <td>{{ $promotion->f_sections->Section_Name }}</td>
                                                <td>{{ $promotion->academic_year }}</td>

                                                <td>{{ $promotion->t_grade->Name }}</td>
                                                <td>{{ $promotion->t_classroom->Class_Name }}</td>
                                                <td>{{ $promotion->t_sections->Section_Name }}</td>
                                                <td>{{ $promotion->academic_year_new }}</td>
                                                <td class="d-flex align-items-center justify-content-between">
                                                    <button type="button" class="btn mx-1 btn-outline-danger"
                                                        data-toggle="modal"
                                                        data-target="#Delete_one{{ $promotion->id }}">ارجاع
                                                        الطالب
                                                    </button>
                                                    <button type="button" class="btn mx-1 btn-outline-success"
                                                        data-toggle="modal" data-target="#">تخرج الطالب
                                                    </button>
                                                </td>
                                            </tr>
                                            @include('Pages.Students.Promotions.Delete_img')
                                            @include('Pages.Students.Promotions.Delete_one')
                                        @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
