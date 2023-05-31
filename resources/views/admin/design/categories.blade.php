@extends('admin.layouts.main')
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
                        <img class="category-img"
                            src="https://source.unsplash.com/random/900×700/?design&{{ $loop->iteration }}"
                            alt="{{ $category->title }}">
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