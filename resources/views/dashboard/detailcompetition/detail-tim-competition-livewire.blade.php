<div>
    {{-- Stop trying to control. --}}
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
    {{-- Be like water. --}}

    <section class="section">
        <div class="card">
            <div class="card-header text-center">
                <h2>{{ $name_competition }}</h2>
                <x-flash-message/>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover" id="table1">
                    <thead>
                        <tr>
                            <th>Name TIM</th>
                            <th>Institusi TIM</th>
                            <th>Email Tim</th>
                            <th>Telegram Tim</th>
                            <th>Status TIM</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($timcompetition->timcompetition as $item)
                            <tr>
                                <td>{{ $item->name_tim }}</td>
                                <td>{{ $item->institusi_name_tim }}</td>
                                <td>{{ $item->email_tim }}</td>
                                <td>{{ $item->username_telegram_tim  }}</td>
                                <td>{{ $item->status_verification_tim }}</td>
                                <td>
                                    <a href="/dashboard/detailcompetition/{{ str(strtolower($name_competition))->slug('-')}}/detailtim/{{ $item->code_uniq_tim }}"
                                        class="btn btn-primary">Detail</a>
                                    <button class="btn btn-danger"
                                        wire:click="deletetim('{{ Crypt::encrypt($item->id) }}')"
                                        onclick="confirm('Are you sure you want to delete the tim competition ?') || event.stopImmediatePropagation()">Hapus</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </section>

    @push('modals')
        <script src="/assets/vendors/jquery/jquery.min.js"></script>
        <script src="/assets/vendors/jquery-datatables/jquery.dataTables.min.js"></script>
        {{-- <script src="/assets/vendors/jquery-datatables/custom.jquery.dataTables.bootstrap5.min.js"></script> --}}
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
</div>
