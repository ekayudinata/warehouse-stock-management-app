@extends('components.layout.app')

@section('content')
    @include('components.sections.overview')
    @include('components.sections.setup')
    @include('components.sections.authentication')
    @include('components.sections.api-documentation')
    @include('components.sections.error-handling')
@endsection
