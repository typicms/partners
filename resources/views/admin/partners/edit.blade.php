@extends('admin::core.master')

@section('title', $model->presentTitle())

@section('content')
    {!! BootForm::open()->put()->action(route('admin::update-partner', $model->id))->addClass('form') !!}
    {!! BootForm::bind($model) !!}
    @include('admin::partners._form')
    {!! BootForm::close() !!}
@endsection
