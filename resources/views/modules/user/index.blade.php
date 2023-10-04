<x-applayout :title="$title">
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800 font-weight-bold">{{ $title }}</h1>
        <x-BreadCumb :breadcumb="$breadcumb" />
        <div class="card opacity-75 text-success  shadow-lg border border-success">
            <h1 class="mx-auto mt-4">{{ $method }}</h1>
            <div class="row ml-auto">
                <div class="col">
                    <x-AddButton :module="$breadcumb[0]" />
                </div>
            </div>
            <div class="card-body">
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
    @push('scripts')
        {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
    @endpush
</x-applayout>

{{-- ===================================================Add================================================================ --}}
<div class="modal" id="add" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah {{ $title }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formAdd" action="{{ route($breadcumb[0] . '.store') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="form-group col-12">
                            <label for="role">Role</label>
                            <select
                                class="form-control @error('role')
                            is-invalid
                        @enderror"
                                name="role" id="role" autofocus>
                                <option value="user">USER</option>
                                <option value="admin">ADMIN</option>
                            </select>
                            @error('role')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-12">
                            <label for="">Nama Lengkap</label>
                            <input id="name" type="text"
                                class="form-control @error('name')
                            is-invalid
                        @enderror"
                                name="name" autofocus>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-12">
                            <label for="">Email</label>
                            <input id="email" type="email"
                                class="form-control @error('email')
                            is-invalid
                            @enderror"
                                name="email">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <div class="row">
                        <div class="form-group col-6">
                            <label for="">Kata Sandi</label>
                            <input id="password" type="password"
                                class="form-control @error('password')
                            is-invalid
                            @enderror"
                                name="password" autocomplete="new-password">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label for="">Konfirmasi Kata Sandi</label>
                            <input id="password_confirmation" type="password" class="form-control"
                                name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-12">
                            <div class="form-check">
                                <input
                                    class="form-check-input @error('is_active')
                                is-invalid
                                @enderror"
                                    type="checkbox" name="is_active" id="is_active" value="1">
                                <label class="form-check-label" for="is_active">
                                    Aktivasi Akun
                                </label>
                            </div>
                            @error('is_active')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <x-CreateButton />
                </form>
            </div>
        </div>
    </div>
</div>

{{-- ===================================================Edit================================================================ --}}
@foreach ($data as $value)
    <div class="modal" id="edit{{ $value->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Ubah {{ $title }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formEdit" action="{{ route($breadcumb[0] . '.update', $value->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="form-group col-12">
                                <label for="role">Role</label>
                                <select
                                    class="form-control @error('role')
                                is-invalid
                            @enderror"
                                    name="role" id="role" autofocus>
                                    <option value="user">USER</option>
                                    <option value="admin">ADMIN</option>
                                </select>
                                @error('role')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-12">
                                <label for="">Nama Lengkap</label>
                                <input id="name" type="text"
                                    class="form-control @error('name')
                                is-invalid
                            @enderror"
                                    name="name" value="{{ $value->name }}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-12">
                                <label for="">Email</label>
                                <input readonly id="email" type="email"
                                    class="form-control @error('email')
                                is-invalid
                                @enderror"
                                    name="email" value="{{ $value->email }}">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>


                        <input hidden id="password" type="password" class="form-control" name="password"
                            autocomplete="new-password" value="{{ $value->password }}">


                        <input hidden id="password_confirmation" type="password" class="form-control"
                            name="password_confirmation" value="{{ $value->password }}">

                        <div class="row">
                            <div class="form-group col-12">
                                <div class="form-check">
                                    <input
                                        class="form-check-input @error('is_active')
                                        is-invalid
                                        @enderror"
                                        type="checkbox" name="is_active" id="is_active" value="1"
                                        @if ($value->is_active) checked @endif>
                                    <label class="form-check-label" for="is_active">
                                        Aktivasi Akun
                                    </label>
                                </div>
                                @error('is_active')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <x-CreateButton />
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
