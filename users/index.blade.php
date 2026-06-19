@extends('app')
@section('title', trans_choice('common.pilot', 2))

@section('content')
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
        <div>
            <h1 class="h2 mb-1 fw-bold text-uppercase" style="letter-spacing: 0.06em;">
                <i class="bi bi-people-fill text-primary me-2"></i>
                {{ trans_choice('common.pilot', 2) }}
            </h1>
            <p class="text-body-secondary mb-0">
                {{ $users->total() }} {{ trans_choice('common.pilot', $users->total()) }}
            </p>
        </div>
    </div>

    @if ($users->isEmpty())
        <div class="card border-0 shadow-sm">
            <div class="card-body text-center py-5 text-body-secondary">
                <i class="bi bi-person-x fs-1 d-block mb-3"></i>
                @lang('common.no') {{ trans_choice('common.pilot', 2) }}
            </div>
        </div>
    @else
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 g-3">
            @foreach ($users as $user)
                <div class="col">
                    <div class="card h-100 border-0 shadow-sm overflow-hidden">
                        <div class="card-header bg-primary text-white text-center border-0 pt-4 pb-0">
                            <div class="mx-auto mb-3" style="width: 96px; height: 96px;">
                                @if ($user->avatar == null)
                                    <img class="rounded-circle border border-2 border-white shadow"
                                        src="{{ $user->gravatar(192) }}&s=192" alt="{{ $user->name_private }}"
                                        width="96" height="96">
                                @else
                                    <img class="rounded-circle border border-2 border-white shadow object-fit-cover"
                                        src="{{ $user->avatar->url }}" alt="{{ $user->name_private }}" width="96"
                                        height="96">
                                @endif
                            </div>
                            <h2 class="h6 fw-bold text-uppercase mb-1 text-white">
                                {{ $user->ident }}
                            </h2>
                            <p class="small mb-3 opacity-75">{{ $user->name_private }}</p>
                        </div>
                        <div class="card-body pt-3">
                            <div class="d-flex flex-wrap gap-2 mb-3">
                                <span class="badge rounded-pill text-bg-light border">
                                    {{ $user->airline->icao }}
                                </span>
                                @if (filled($user->country))
                                    <span class="badge rounded-pill text-bg-light border d-inline-flex align-items-center gap-1">
                                        <span class="fi fi-{{ $user->country }}"></span>
                                        {{ $country->alpha2($user->country)['name'] }}
                                    </span>
                                @endif
                            </div>

                            <ul class="list-unstyled small mb-0">
                                <li class="d-flex justify-content-between py-1 border-bottom border-light-subtle">
                                    <span class="text-body-secondary">@lang('user.location')</span>
                                    <span class="fw-semibold font-monospace">
                                        @if ($user->current_airport)
                                            {{ $user->curr_airport_id }}
                                        @else
                                            —
                                        @endif
                                    </span>
                                </li>
                                <li class="d-flex justify-content-between py-1 border-bottom border-light-subtle">
                                    <span class="text-body-secondary">{{ trans_choice('common.flight', 2) }}</span>
                                    <span class="fw-semibold">{{ number_format($user->flights) }}</span>
                                </li>
                                <li class="d-flex justify-content-between py-1">
                                    <span class="text-body-secondary">{{ trans_choice('common.hour', 2) }}</span>
                                    <span class="fw-semibold">@minutestotime($user->flight_time)</span>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer bg-transparent border-0 pt-0 pb-3 px-3">
                            <a href="{{ route('frontend.pilots.show.public', [$user->id]) }}"
                                class="btn btn-primary btn-sm w-100">
                                <i class="bi bi-person-badge me-1"></i>
                                @lang('common.profile')
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="row mt-4">
            <div class="col-12 d-flex justify-content-center">
                {{ $users->withQueryString()->links('pagination.bootstrap-5') }}
            </div>
        </div>
    @endif
@endsection
