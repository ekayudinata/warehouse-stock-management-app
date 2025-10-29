@extends('components.layout.app')

@section('content')
    @include('components.sections.overview')
    @include('components.sections.setup')
    @include('components.sections.authentication')
    @include('components.sections.api-documentation')
    @include('components.sections.error-handling')
    @include('components.sections.rate-limiting')
    @include('components.sections.support')

    <!-- Footer -->
    <footer class="mt-12 pt-8 border-t border-gray-200">
        <div class="flex flex-col items-center justify-between md:flex-row">
            <p class="text-sm text-gray-500">
                &copy; {{ date('Y') }} Warehouse Stock Management. All rights reserved.
            </p>
            <div class="flex space-x-4 mt-4 md:mt-0">
                <a href="#" class="text-gray-500 hover:text-gray-700">
                    <i class="fab fa-github"></i>
                </a>
                <a href="#" class="text-gray-500 hover:text-gray-700">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-envelope"></i>
                </a>
            </div>
        </div>
    </footer>
@endsection
