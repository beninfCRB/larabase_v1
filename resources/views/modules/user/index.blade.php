<x-applayout title="Kelola Akun">
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tables</h1>
        <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
            For more information about DataTables, please visit the <a target="_blank"
                href="https://datatables.net">official DataTables documentation</a>.</p>

        {{-- <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Picture</th>
                                <th>Role</th>
                                <th>Date Verified</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($data as $list => $v)
                                <tr>
                                    <td>{{ $list + 1 }}</td>
                                    <td>{{ $v->name }}</td>
                                    <td>{{ $v->email }}</td>
                                    <td>{{ $v->picture }}</td>
                                    <td>{{ $v->role }}</td>
                                    <td>{{ $v->email_verified_at }}</td>
                                    <td class="row">
                                        <a href="{{ url('akun/' . $l->id . '/edit') }}"><i class="fas fa-edit"></i></a>
                                        <form action="{{ url('akun/' . $l->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-sm btn-danger" type="submit"
                                                onclick="return confirm('Anda yakin mau menghapus Data ini ?')"><i
                                                    class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> --}}

    </div>
    <!-- /.container-fluid -->
</x-applayout>
