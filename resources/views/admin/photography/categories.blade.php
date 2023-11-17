@extends('dashboard.layouts.main')
@section('content')
    <div class="container" style="height: 100%">
        <div class="row">
            @forelse ($categories as $category)
                <div class="col-md-6">
                    <div class="card-mantap">
                        <div class="darken"><span class="centering"><a
                                    href="{{ route('photography-category.edit', $category->id) }}"
                                    class="text-decoration-none edit-text">EDIT</a></span>
                        </div>
                        @php
                            $imagePath = $category->image !== 'placeholder.jpg' ? \Illuminate\Support\Facades\Storage::url($category->image) : null;
                            $defaultImages = [
                                'Produk' => 'product.jpg',
                                'Pernikahan' => 'wedding.jpg',
                                'Acara' => 'event.jpg',
                            ];
                            $defaultImage = $defaultImages[$category->title] ?? 'product.jpg';
                        @endphp

                        <img class="category-img"
                            src="{{ $imagePath ?? asset("assets/img/sub-category/photography/$defaultImage") }}"
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
