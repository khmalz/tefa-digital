@extends('admin.layouts.main')
@section('content')
    <div class="container" style="height: 100%">
        <div class="row">
            @forelse ($categories as $category)
                <div class="col-md-6 ">
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

            {{-- <div class="col-6">
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="https://source.unsplash.com/random/900×700/?design" alt="{{ $category->title }}"
                                class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                                    additional content. This content is a little bit longer.</p>
                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
@endsection
