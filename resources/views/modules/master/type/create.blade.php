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
                            <label for="">Kode Jenis</label>
                            <input id="code" type="text"
                                class="form-control @error('code')
                            is-invalid
                            @enderror"
                                name="code" onkeyup="toUp()" autofocus>
                            @error('code')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-12">
                            <label for="">Nama Jenis</label>
                            <input id="name" type="text"
                                class="form-control @error('name')
                            is-invalid
                        @enderror"
                                name="name">
                            @error('name')
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
