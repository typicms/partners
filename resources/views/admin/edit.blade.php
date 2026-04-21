@extends('core::admin.master')

@section('title', $model->presentTitle())

@section('content')
    {!! BootForm::open()->put()->action(route('admin::update-partner', $model->id))->addClass('form') !!}
    {!! BootForm::bind($model) !!}
    @include('partners::admin._form')
    {!! BootForm::close() !!}
@endsection
