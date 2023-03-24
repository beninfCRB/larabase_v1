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
                <form action="{{ route($breadcumb[0] . '.update', $data->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="form-group col-12">
                            <label for="">Kode Jenis</label>
                            <input id="code" type="code"
                                class="form-control @error('code')
                            is-invalid
                            @enderror"
                                name="code" value="{{ $data->code }}">
                            @error('code')
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

                    <x-UpdateButton />
            </div>
            </form>

        </div>

    </div>
    <!-- /.container-fluid -->
</x-applayout>
