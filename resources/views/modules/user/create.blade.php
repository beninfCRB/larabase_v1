<x-applayout :title="$title">
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800 font-weight-bold">{{ $title }}</h1>
        <x-BreadCumb :breadcumb="$breadcumb" />
        <div class="card col-md-12 shadow-lg">
            <h1 class="mx-auto mt-4">{{ $method }}</h1>
            <div class="card-body col-md-6 border rounded mx-auto p-4 m-4 shadow-lg">
                <x-BackButton :module="$breadcumb[0]" />
                <form action="{{ route($breadcumb[0] . '.store') }}" method="POST">
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

                    <x-SaveButton />
            </div>
            </form>

        </div>

    </div>
    <!-- /.container-fluid -->
</x-applayout>
