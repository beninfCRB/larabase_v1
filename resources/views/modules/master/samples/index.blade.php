<x-applayout :title="$title">
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800 font-weight-bold">{{ $title }}</h1>
        <x-BreadCumb :breadcumb="$breadcumb" />
        <div class="card shadow-lg">
            <h1 class="mx-auto mt-4">{{ $method }}</h1>
            <div class="row ml-auto">
                <div class="col">
                    <x-ImportExcelButton :module="$breadcumb[0]" />
                </div>
                <div class="col">
                    <x-AddButton :module="$breadcumb[0]" />
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered table-hover">
                    <thead class="text-center">
                        <tr>
                            <th rowspan='3'>No</th>
                            <th rowspan='3'>Alternatif</th>
                            <th rowspan='3'>Nama</th>
                            <th colspan={{ $jml_krt }}>Kriteria</th>
                            <th rowspan='3'>Action</th>
                        </tr>
                        <tr>
                            @foreach ($n_kriteria as $k)
                                <th>{{ $k }}</th>
                            @endforeach
                        </tr>
                        <tr>
                            @foreach ($kriteria as $k)
                                <th>{{ $k }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($nilai as $nama => $krit)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <th>{{ $nama }}</th>
                                <td>{{ $krit['C1']['nama_alternatif'] }}</td>
                                @foreach ($kriteria as $k)
                                    {{-- <td align='center'>{{ $krit[$k]['nilai'] }}</td> --}}
                                    <td align='center'><a data-toggle="modal"
                                            data-target="#edit{{ $krit[$k]['id_data'] }}">{{ $krit[$k]['nilai'] }}</a>
                                    </td>
                                @endforeach
                                <td class="text-center">
                                    <form id="form" action="{{ route($breadcumb[0] . '.destroy', $nama) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-circle btn-sm btn-submit"><i
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
                        <x-Select :label="'Alternatif'" :name="'alternative_id'" :data="$malternative" :method="'add'" />
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
                    <form id="forEdit" action="{{ route($breadcumb[0] . '.update', $value->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="form-group col-12">
                                <label for="">Nilai</label>
                                <input id="value" type="text"
                                    class="form-control @error('value')
                                is-invalid
                            @enderror"
                                    name="value" value="{{ $value->value }}">
                                @error('value')
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
{{-- ===================================================Import================================================================ --}}
<div class="modal" id="import" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Import {{ $title }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('import/' . $breadcumb[0] . '/create') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="form-group">
                            <label for="">File</label>
                            <input type="file"
                                class="form-control-file @error('import')
                                    is-invalid
                                    @enderror"
                                id="import" name="import">
                            @error('import')
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
