@extends('admin.layouts.main')
@section('content')
    <div class="container" style="height: auto">
        @foreach ($categoriesOutput as $category)
            <div class="row mb-5">
                <div class="row">
                    <div class="header-cat d-flex">
                        <hr class="left-line">
                        <h4>{{ $category['title'] }}</h4>
                        <hr class="right-line">
                    </div>
                </div>
                <div class="row mt-3" style="padding-left: 30px;position: relative">
                    <div class="col-3">
                        @forelse ($category['plans'] as $plan)
                            <div class="plan-card position-relative overflow-hidden">
                                <div class="darken"><a href="{{ route('design-plan.edit', $plan->id) }}"
                                        class="centering text-decoration-none edit-text">Edit</a>
                                </div>
                                <div class="plan-card-content p-3">
                                    <div>
                                        <h5 class="plan-card-title">{{ $plan->title }}</h5>
                                        <h4 class="">{{ $plan->price }}</h4>
                                    </div>
                                    <hr>
                                    <div class="plan-card-feature mt-4">
                                        @foreach ($plan->features as $feature)
                                            <div>
                                                <h6>{{ $feature->text }}</h6>
                                                <span>{{ \Illuminate\Support\Str::words($feature->description, 12, '...') }}</span>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @empty
                        @endforelse
                    </div>
                    <div class="col-3 position-relative">
                        <a href="{{ route('design-plan.create') }}" class="centering big-plus text-decoration-none">+</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection