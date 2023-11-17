@extends('dashboard.layouts.main')
@section('content')
    <div class="container" style="height: 100%">
        <div class="row">
            @forelse ($categories as $category)
                <div class="col-md-6">
                    <div class="card-mantap">
                        <div class="darken"><span class="centering"><a
                                    href="{{ route('design-category.edit', $category->id) }}"
                                    class="text-decoration-none edit-text">EDIT</a></span>
                        </div>
                        @if ($category->image !== 'placeholder.jpg')
                            <img class="category-img" src="{{ \Illuminate\Support\Facades\Storage::url($category->image) }}"
                                alt="{{ $category->title }}">
                        @else
                            <img class="category-img"
                                src="{{ asset('assets/img/category/placeholder.jpg') }}"
                                alt="{{ $category->title }}">
                        @endif
                        <div class="category-text-container">
                            <span class="category-title text-center">{{ $category->title }}</span><br>
                            <span
                                class="word-break category-text text-center">{{ \Illuminate\Support\Str::words($category->body, 30, '...') }}</span>
                        </div>
                    </div>
                </div>
            @empty
            @endforelse
        </div>
    </div>
@endsection
