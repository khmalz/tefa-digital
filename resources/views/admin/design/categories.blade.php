@extends('admin.layouts.main')
@section('content')
    <div class="container" style="height: 100vh">
        <div class="row">
            <div class="col-6">
                @forelse ($categories as $category)
                    <div class="card-mantap">
                        <div class="darken"><span class="centering"><a
                                    href="{{ route('design-category.edit', $category->id) }}"
                                    class="text-decoration-none edit-text">EDIT</a></span>
                        </div>
                        <img class="category-img"
                            src="https://source.unsplash.com/random/900×700/?design&{{ $loop->iteration }}"
                            alt="{{ $category->title }}">
                        <div class="category-text-container">
                            <h3 class="text-center">{{ $category->title }}</h3>
                            <span class="word-break category-text text-center">{{ $category->body }}</span>
                        </div>
                    </div>
                @empty
                @endforelse
            </div>
        </div>
    </div>
@endsection
