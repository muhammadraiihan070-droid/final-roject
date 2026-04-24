@extends('admin.master')

@section('content')

    <h1 class="mb-3 h2">Welcome To Dashboard</h1>
    <div class="row row-cols-1 row-cols-xl-3 row-cols-md-3 mb-6 g-6">

<div class="col">
            <!-- card -->
            <div class="card card-lg">
              <!-- card body -->
              <div class="card-body d-flex flex-column gap-8">
                <div class="d-flex align-items-center gap-3">
                  <div class="icon-shape icon-lg rounded-circle bg-warning-darker text-warning-lighter">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                      stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                      class="icon icon-tabler icons-tabler-outline icon-tabler-shopping-cart">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                      <path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                      <path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                      <path d="M17 17h-11v-14h-2" />
                      <path d="M6 5l14 1l-1 7h-13" />
                    </svg>
                  </div>
                  <div>Zones</div>
                </div>
                <div class="d-flex justify-content-between align-items-center lh-1">
                  <div class="fs-3 fw-bold">{{ $counter['zones'] }}</div>
                  <div class="text-success small">
                    <a href="{{ route('admin.zones.index') }}" class="btn btn-info"> View zones </a>
                    <span>
                      <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-trending-up">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M3 17l6 -6l4 4l8 -8" />
                        <path d="M14 7l7 0l0 7" />
                      </svg>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div>Attractions</div>
                </div>
                <div class="d-flex justify-content-between align-items-center lh-1">
                  <div class="fs-3 fw-bold">{{ $counter['attractions'] }}</div>
                  <div class="text-success small">
                    <a href="{{ route('admin.attractions.index') }}" class="btn btn-info"> View attractions </a>
                    <span>
                      <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-trending-up">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M3 17l6 -6l4 4l8 -8" />
                        <path d="M14 7l7 0l0 7" />
                      </svg>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div>reviews</div>
                </div>
                <div class="d-flex justify-content-between align-items-center lh-1">
                  <div class="fs-3 fw-bold">{{ $counter['publishedReviews'] }}</div>
                  <div class="text-success small">
                    <a href="{{ route('admin.reviews.index') }}" class="btn btn-info"> View reviews </a>
                    <span>
                      <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-trending-up">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M3 17l6 -6l4 4l8 -8" />
                        <path d="M14 7l7 0l0 7" />
                      </svg>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
@endsection