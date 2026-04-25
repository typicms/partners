@extends('admin::core.master')

@section('title', __('New partner'))

@section('content')
    {!! BootForm::open()->action(route('admin::index-partners'))->addClass('form') !!}
    @include('admin::partners._form')
    {!! BootForm::close() !!}
@endsection
