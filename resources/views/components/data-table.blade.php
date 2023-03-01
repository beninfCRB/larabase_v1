 <!-- DataTales Example -->
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
 </div>
