<div>
    {{-- Success is as dangerous as failure. --}}

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
            <div class="card-body">
                <table class="table table-striped table-hover" id="table1">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Name User</th>
                            <th>Email</th>
                            <th>No Wa</th>
                            <th>Event Name </th>
                            <th>Feedback Event</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($registrants as $item)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                @foreach ($item->user as $user)
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->wa_user }}</td>
                                @endforeach
                                @foreach ($item->event as $event)
                                    <td>{{ $event->name_event }}</td>
                                @endforeach
                                
                                <td>
                                    @if (isset($item->feedback))
                                        {{ "sudah" }}
                                    @else
                                        {{ "belum" }}
                                    @endif
                                    {{-- {{ $item->feedback }} --}}
                                </td>
                                <td>
                                    <button class="btn btn-danger"
                                        wire:click="deleteevent('{{ Crypt::encrypt($item->id) }}')"
                                        onclick="confirm('Are you sure you want to delete the event ?') || event.stopImmediatePropagation()">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path
                                                d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                            <path fill-rule="evenodd"
                                                d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                        </svg>
                                    </button>
                                    <a href="/dashboard/event/{{ Crypt::encrypt($item->id) }}/edit">
                                        <button class="btn btn-success">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                                <path
                                                    d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z" />
                                            </svg>
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
