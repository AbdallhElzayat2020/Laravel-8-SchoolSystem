@extends('layouts.master')
@section('css')
    @section('title')
        حصص اونلاين
    @stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')
        حصص اونلاين
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
                                <a href="{{route('online_classes.create')}}" class="btn btn-success btn-sm"
                                   role="button"
                                   aria-pressed="true">اضافة حصة جديدة</a><br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr class="alert-success">
                                            <th>#</th>
                                            <th>المرحلة</th>
                                            <th>الصف</th>
                                            <th>القسم</th>
                                            <th>المعلم</th>
                                            <th>عنوان الحصة</th>
                                            <th>تاريخ البداية</th>
                                            <th>وقت الحصة</th>
                                            <th>رابط الحصة</th>
                                            <th>العمليات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($online_classes as $online_classe)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{$online_classe->grade->Name}}</td>
                                                <td>{{ $online_classe->classroom->Class_Name }}</td>
                                                <td>{{$online_classe->section->Section_Name}}</td>
                                                <td>{{$online_classe->user->name}}</td>
                                                <td>{{$online_classe->topic}}</td>
                                                <td>{{$online_classe->start_at}}</td>
                                                <td>{{$online_classe->duration}}</td>
                                                <td class="text-danger">
                                                    <a href="{{$online_classe->join_url}}"
                                                       target="_blank">
                                                        انضم الان
                                                    </a>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                            data-toggle="modal"
                                                            data-target="#Delete_receipt{{$online_classe->meeting_id}}">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @include('Pages.OnlineClasses.delete')
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
