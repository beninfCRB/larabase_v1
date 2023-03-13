<x-applayout title="{{ $title }}">
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800 font-weight-bold">{{ $title }}</h1>
        <div class="card col-md-12 shadow-lg">
            <h1 class="mx-auto mt-4">{{ $method }}</h1>
            <div class="card-body col-md-6 border rounded mx-auto p-4 m-4 shadow-lg">
                <x-BackButton module="users" />
                <div class="mx-auto text-center">
                    <img class="img-profile rounded-circle" src="{{ asset('storage/' . $data->picture) }}" alt=""
                        width="80px" height="auto">
                </div>
                <form action="{{ route('profile.update', auth()->user()->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="form-group col-12">
                            <label for="">Nama Lengkap</label>
                            <input id="name" type="text"
                                class="form-control @error('name')
                            is-invalid
                        @enderror"
                                name="name" value="{{ $data->name }}" readonly>
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
                                name="email" value="{{ $data->email }}" readonly>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-6">
                            <label for="">Kata Sandi Lama</label>
                            <input id="password_old" type="password"
                                class="form-control @error('password_old')
                            is-invalid
                            @enderror"
                                name="password_old">
                            @error('password_old')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-6">
                            <label for="">Kata Sandi Baru</label>
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
                            <label for="">Konfirmasi Kata Sandi Baru</label>
                            <input id="password_confirmation" type="password" class="form-control"
                                name="password_confirmation" autocomplete="new-password">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group">
                            <label for="">Avatar</label>
                            <input type="file"
                                class="form-control-file @error('picture')
                                    is-invalid
                                    @enderror"
                                id="picture" name="picture">
                            @error('picture')
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
