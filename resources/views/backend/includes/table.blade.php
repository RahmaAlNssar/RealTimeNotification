@extends('layouts.admin')
@section('title')
    المدراء
@endsection

@section('content')
<div class="card">

    <div class="btn-group">
        <a href="{{ route('admin.' . rules() . '.mult.delete') }}"
        class="btn btn-outline-danger col-lg-2  multi-delete" style="margin: 10px"><i class="fas fa-trash"></i>حذف
        الجميع</a>
        @if(request()->segment(2) != 'complains')
        <a href="{{ route('admin.' . rules() . '.create') }}"
        class="btn btn-outline-primary col-lg-2" style="margin: 10px"><i class="fas fa-plus"></i>
        إضافة</a>
        @endif
    </div>

    <div class="card-content collpase show">
        <div class="card-body table-responsive data_table">

            {{ $dataTable->table() }}

        </div>
    </div>
</div>
@endsection

@push('scripts')
    {{ $dataTable->scripts() }}

@endpush
