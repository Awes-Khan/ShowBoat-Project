@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])

@section('title', 'Dashboard')

@php
    $user = Auth::user();
    $isAdmin = $user->email == 'awes@example.com';
    if ($isAdmin == false) {
        redirect()->route(form - entry . create);
    }
@endphp
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Form Entries</h4>
                            <p class="card-category"> Here is the list of form entries performed.</p>
                        </div>
                        <div class="card-body" style="width:100%">
                            <div class="table-responsive" class="form-entries-table">
                                <table class="table" id="form-entries-table">
                                    <thead class=" text-primary">
                                        <tr>
                                            <th>Profile Image</th>
                                            <th>Profile Name</th>
                                            <th>Email</th>
                                            <th>Address</th>
                                            <th>PAN Number</th>
                                            <th>Aadhar Number</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>



    @if (session('createdSuccessfully'))
        {
        <script>
            createdSuccessfully()
        </script>
        }
    @elseif(session('updatedSuccessfully'))
        {
        <script>
            updatedSuccessfully()
        </script>
        }
    @endif


    <script>
        $(document).ready(function() {
            $('.delete-entry').on('click', confirmDelete);
            //     e.preventDefault();
            //     var form = $(this).closest('form');
            function confirmDelete(formEntryId) {
                // alert("insert");
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'Once deleted, you will not be able to recover this form entry.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('delete-form-' + formEntryId).submit();
                        // $('#delete-form').submit();
                    }
                });
            }
        });
        // Data Table fetch Data

        $(document).ready(function() {
            // alert(' scrolling');
            $('#form-entries-table').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                scrollX: false,
                autoWidth: false,


                ajax: {
                    url: '{{ route('admin.form-entries') }}',
                    type: 'GET',
                    // headers: {'_token': '{{ csrf_token() }}' }
                },
                columns: [{
                        data: 'profile_image',
                        name: 'profile_image',
                        orderable: false,
                        searchable: false,
                        width: '15%',
                        render: function(data, type, full, meta) {
                            // alert('profile image');

                            if (data) {
                                // <img src="avatar.png" alt="Avatar" class="avatar">
                                return '<img src="../storage/' + data +
                                    '" alt="profile-image" class="avatar" class="img-thumbnail" width="60" height="60" style="border-radius:50px" />';
                            } else {
                                return '';
                            }
                        },
                    },
                    {
                        data: 'profile_name',
                        name: 'profile_name',
                        width: '15%'
                    },

                    // { data: 'profile_image', name: 'profile_image' },
                    {
                        data: 'email',
                        name: 'email',
                        width: '15%'
                    },
                    {
                        data: 'address',
                        name: 'address',
                        width: '15%'
                    },
                    {
                        data: 'pan_card_number',
                        name: 'pan_card_number',
                        width: '10%'
                    },
                    {
                        data: 'aadhar_card_number',
                        name: 'aadhar_card_number',
                        width: '15%'
                    },
                    {
                        data: 'actions',
                        name: 'actions',
                        orderable: false,
                        searchable: false,
                        width: '15%'
                    },
                ]
            });
        });
        // $('input[type="search"]').
        //   attr('placeholder','Search in this blog ....').
        //   css({'width':'50px','display':'inline-block'});
    </script>

@endsection
