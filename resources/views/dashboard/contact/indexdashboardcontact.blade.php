<x-app-layout title="Manage Contact">
    @push('style')
        <link rel="stylesheet" href="/assets/vendors/jquery-datatables/jquery.dataTables.min.css">
        <link rel="stylesheet" href="/assets/vendors/jquery-datatables/jquery.dataTables.bootstrap5.min.css">
        <link rel="stylesheet" href="/assets/vendors/fontawesome/all.min.css">
        <style>
            table.dataTable td {
                padding: 15px 8px;
            }

            .fontawesome-icons .the-icon svg {
                font-size: 24px;
            }

        </style>
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
    @endpush
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Manage Contact</h3>
                    <p class="text-subtitle text-muted">You Can Manage Contact In This Page</p>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <a href="/dashboard/event/add"><button class="btn btn-success">Add New Event</button></a>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover" id="table1">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Status</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($comment as $item)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $item->name_seeder }}</td>
                                    <td>{{ $item->email_seeder }}</td>
                                    <td>{{ $item->subject_seeder }}</td>
                                    <td>{{ $item->reply }}</td>
                                    <td>
                                        <a href="/dashboard/contact/{{ Crypt::encrypt($item->id) }}/detail">
                                            <button class="btn btn-primary">
                                                Detail
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
    @push('modals')
        <script src="/assets/vendors/jquery/jquery.min.js"></script>
        <script src="/assets/vendors/jquery-datatables/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.colVis.min.js"></script>
        <script src="/assets/vendors/fontawesome/all.min.js"></script>

        <script>
            let jquery_datatable = $("#table1").DataTable({
                dom: 'Bfrtip',
                buttons: [{
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'csvHtml5',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    'colvis'
                ]
            })
        </script>
    @endpush
</x-app-layout>
