@extends('admin.layouts.main')
@section('content')
    <div class="container" style="height: auto">
        @foreach ($categoriesOutput as $category)
            <div class="row mb-5">
                <div class="row mt-3">
                    <div class="header-cat d-flex">
                        <hr class="left-line">
                        <h4>{{ $category['title'] }}</h4>
                        <hr class="right-line">
                    </div>
                </div>
                <div class="row mt-3" style="padding-left: 30px;position: relative">
                    @forelse ($category['plans'] as $plan)
                        <div class="col-md-6 col-lg-4 col-xl-3">
                            <div class="plan-card position-relative mt-3 overflow-hidden">
                                <div class="blurrer">Show More</div>
                                <div class="darken"><a href="{{ route('videography-plan.edit', $plan->id) }}"
                                        class="centering text-decoration-none edit-text">Edit</a>
                                    <form id="delete-form-{{ $plan->id }}"
                                        action="{{ route('videography-plan.destroy', $plan->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="d-none"
                                            onclick="return confirm('Yakin untuk menghapusnya?')"><span>DELETE</span></button>
                                    </form>
                                    <a class="delete-tombol text-decoration-none" href="#"
                                        onclick="event.preventDefault(); confirm('Yakin untuk menghapusnya?') && document.getElementById('delete-form-{{ $plan->id }}').submit();"><span
                                            class="">DELETE</span></a>
                                </div>
                                <div class="plan-card-content p-3">
                                    <div>
                                        <h5 class="plan-card-title">{{ $plan->title }}</h5>
                                        <h4 class="">{{ $plan->price }}</h4>
                                        <span>{{ $plan->description ?? '' }}</span>
                                    </div>
                                    <hr>
                                    <div class="plan-card-feature mt-4">
                                        @foreach ($plan->features as $feature)
                                            <div>
                                                <h6>{{ $feature->text }}</h6>
                                                <span>{{ \Illuminate\Support\Str::words($feature->description, 6, '...') }}</span>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="show-more"></div>
                                <div class="show-less"></div>
                            </div>
                        </div>
                    @empty
                    @endforelse
                    @if ($category['plans']->count() < 4)
                        <div class="col plan-card-invis position-relative">
                            <a href="{{ route('videography-plan.create', ['category' => $category['title']]) }}"
                                class="centering big-plus text-decoration-none">+</a>
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
@endsection
