@extends('admin.dashboard.layouts.main')

@section('content')
    <div class="body flex-grow-1 px-3">
        <div class="container-lg">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h4>Notification</h4>
                                <form method="POST" action="{{ route('order.notification.read') }}">
                                    @csrf
                                    <a onclick="this.parentElement.submit()" href="#"
                                        class="btn btn-success text-light">Read
                                        all</a>
                                </form>
                            </div>

                            @forelse ($notifications as $notification)
                                <div class="card mt-2">
                                    <div class="card-body d-flex justify-content-between align-items-center p-2">
                                        <div>
                                            <h6 class="text-dark m-0">
                                                <span>There's updated {{ $notification->data['category'] }} <a
                                                        href="{{ route('order.show', $notification->data['order_id']) }}"
                                                        class="text-info">order</a>
                                                    from {{ $notification->data['client_name'] }}
                                                </span>
                                            </h6>
                                            <small>
                                                <small>
                                                    <p class="m-0">{{ $notification->created_at->format('d M Y') }},
                                                        {{ $notification->created_at->format('H:i') }} |
                                                        {{ $notification->created_at->diffForHumans() }}</p>
                                                </small>
                                            </small>
                                        </div>

                                        <div>
                                            @if ($notification->unread())
                                                <form method="POST"
                                                    action="{{ route('order.notification.read', $notification->id) }}">
                                                    @csrf
                                                    <button class="btn btn-sm text-primary m-0 border-0 bg-transparent"
                                                        type="submit">
                                                        Read
                                                    </button>
                                                </form>
                                            @else
                                                <p class="btn btn-sm text-secondary m-0 border-0 bg-transparent"
                                                    style="cursor: default">
                                                    Read</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="card mt-2">
                                    <div class="card-body d-flex justify-content-center align-items-center p-1">
                                        <p class="m-0">No Notification</p>
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
