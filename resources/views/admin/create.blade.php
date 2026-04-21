@extends('core::admin.master')

@section('title', __('New partner'))

@section('content')
    {!! BootForm::open()->action(route('admin::index-partners'))->addClass('form') !!}
    @include('partners::admin._form')
    {!! BootForm::close() !!}
@endsection
