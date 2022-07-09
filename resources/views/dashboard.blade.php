<x-app-layout>
    <div class="page-heading">
        <h3>Dashboard</h3>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-12 col-lg-9">
                <div class="row">
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon purple">
                                            <i class="iconly-boldProfile"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">Total User</h6>
                                        <h6 class="font-extrabold mb-0">{{ $user->count() }}</h6>
                                    </div>
                                    <a href="/dashboard/manageuser" class="stretched-link"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon blue">
                                            <i class="iconly-boldChart"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">Total Competition</h6>
                                        <h6 class="font-extrabold mb-0">{{ $competition->count() }}</h6>
                                    </div>
                                    <a href="/dashboard/competition" class="stretched-link"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon green">
                                            <i class="iconly-boldDiscovery"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">Total Event</h6>
                                        <h6 class="font-extrabold mb-0">{{ $event->count() }}</h6>
                                    </div>
                                    <a href="/dashboard/event" class="stretched-link"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon red">
                                            <i class="iconly-boldBookmark"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">Active User</h6>
                                        <h6 class="font-extrabold mb-0">{{ $user->where('email_verified_at', '!=', null)->count() }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Competition</h4>
                                <div class="table-responsive">
                                    <table class="table table-hover table-lg">
                                        <thead>
                                            <tr>
                                                <th>Category Competition</th>
                                                @foreach ($timcompetition->unique('status_verification_tim') as $item)
                                                    <th>{{ $item->status_verification_tim }}</th>
                                                @endforeach

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($competition as $item)
                                                <tr>
                                                   <td class="col-3">
                                                    <a href="dashboard/detailcompetition/{{ $item->slug_competition }}">
                                                        {{ $item->name_competition }}
                                                    </a>
                                                    </td>

                                                     @foreach ($timcompetition->unique('status_verification_tim') as $itemstatus)
                                                        <td>
                                                            {{ $item->timcompetition->where('status_verification_tim',$itemstatus->status_verification_tim)->count() }}
                                                        </td>
                                                     @endforeach
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                        <div class="card">
                            <div class="card-header">
                                <h4>Event</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-lg">
                                        <thead>
                                            <tr>
                                                <th>Name Event</th>
                                                <th>Category</th>
                                                <th>Registrant</th>
                                                <th>Feedback</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($event as $item)
                                                <tr>
                                                    <td>
                                                        {{ $item->name_event}}
                                                    </td>
                                                    <td>
                                                        {{ $item->category->name_category }}
                                                    </td>
                                                    <td>
                                                        {{ $item->registrant->count() }}
                                                    </td>
                                                    <td>
                                                        {{ $item->registrant->whereNotNull('feedback')->count() }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="col-12 col-lg-3">
                <div class="card">
                    <div class="card-body py-4 px-5">
                        <div class="d-flex align-items-center">
                            <div class="avatar avatar-xl">
                                <img src="/assets/images/faces/1.jpg" alt="Face 1">
                            </div>
                            <div class="ms-3 name">
                                <h5 class="font-bold">John Duck</h5>
                                <h6 class="text-muted mb-0">@johnducky</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4>Recent Messages</h4>
                    </div>
                    <div class="card-content pb-4">
                        @foreach ($comment as $item)
                            <a href="/dashboard/contact/{{ $item->id }}/detail">
                                <div class="recent-message d-flex px-4 py-3">
                                    <div class="avatar avatar-lg">
                                        <img src="https://ui-avatars.com/api/?background=random&name={{ $item->name_seeder }}" alt="{{ $item->name_seeder }}" />
                                    </div>
                                    <div class="name ms-4">
                                        <h5 class="mb-1">{{ $item->name_seeder }}</h5>
                                        <h6 class="text-muted mb-0">{{ $item->subject_seeder }}</h6>
                                    </div>
                                </div>
                            </a>
                        @endforeach

                        <div class="px-4">
                            <a href="/dashboard/contact">
                                <button class='btn btn-block btn-xl btn-light-primary font-bold mt-3'>Start
                                    Conversation</button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4>Total Competition</h4>
                    </div>
                    <div class="card-body">
                        @foreach ($competition as $item)
                            <div class="row">
                                <div class="col-6">
                                    <div class="d-flex align-items-center">
                                        <h5 class="mb-0 ms-3">{{ $item->name_competition }}</h5>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <h5 class="mb-0">{{ $item->timcompetition->count() }}</h5>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-app-layout>
