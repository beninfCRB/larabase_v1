<x-applayout title="{{ $title }}">
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800 font-weight-bold">{{ $title }}</h1>

        <div class="card col-md-12 shadow-lg">
            <h1 class="mx-auto mt-4">{{ $method }}</h1>
            <div class="card-body col-md-6 border rounded mx-auto p-4 m-4 shadow-lg">
                <x-BackButton module="users" />
                <form action="{{ route('users.update', $data->id) }}" method="POST">
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
                                name="name" value="{{ $data->name }}">
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
                                name="email" value="{{ $data->email }}">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <input hidden id="password" type="password" class="form-control" name="password"
                        autocomplete="new-password" value="{{ $data->password }}">


                    <input hidden id="password_confirmation" type="password" class="form-control"
                        name="password_confirmation" value="{{ $data->password }}">

                    <div class="row">
                        <div class="form-group col-12">
                            <div class="form-check">
                                <input
                                    class="form-check-input @error('is_active')
                                    is-invalid
                                    @enderror"
                                    type="checkbox" name="is_active" id="is_active" value="1"
                                    @if ($data->is_active) checked @endif>
                                <label class="form-check-label" for="is_active">
                                    Aktivasi Akun
                                </label>
                            </div>
                            @error('is_active')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <x-UpdateButton />
            </div>
            </form>

        </div>

    </div>
    <!-- /.container-fluid -->
</x-applayout>
