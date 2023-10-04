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
                    <x-ImportExcelButton :module="$breadcumb[0]" />
                </div>
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
                            <label for="">Kode Sub-Kriteria</label>
                            <input id="code" type="text"
                                class="form-control @error('code')
                            is-invalid
                            @enderror"
                                name="code" style="text-transform: uppercase" autofocus>
                            @error('code')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-12">
                            <label for="">Nama Sub-Kriteria</label>
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

                    <div class="row">
                        <div class="form-group col-12">
                            <label for="">Nilai Sub-Kriteria</label>
                            <input id="value" type="text"
                                class="form-control @error('value')
                            is-invalid
                        @enderror"
                                name="value">
                            @error('value')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-12">
                            <label for="criteria_id">Sub-Kriteria</label>
                            <select class="form-control" name="criteria_id" id="criteria_id">
                                <option value="0" disable="true" selected="true">========Pilih
                                    Kriteria========
                                </option>
                                @foreach ($criteria as $v)
                                    <option value="{{ $v->id }}">
                                        {{ $v->code_criteria }} - {{ $v->name_criteria }}
                                    </option>
                                @endforeach
                            </select>
                            @error('criteria_id')
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
                    <form id="forEdit" action="{{ route($breadcumb[0] . '.update', $value->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="form-group col-12">
                                <label for="">Kode Sub-Kriteria</label>
                                <input id="code" type="code"
                                    class="form-control @error('code')
                                is-invalid
                                @enderror"
                                    name="code" value="{{ $value->code_subcriteria }}">
                                @error('code')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-12">
                                <label for="">Nama Sub-Kriteria</label>
                                <input id="name" type="text"
                                    class="form-control @error('name')
                                is-invalid
                            @enderror"
                                    name="name" value="{{ $value->name_subcriteria }}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-12">
                                <label for="">Nilai Sub-Kriteria</label>
                                <input id="value" type="text"
                                    class="form-control @error('value')
                                is-invalid
                            @enderror"
                                    name="value" value="{{ $value->value_subcriteria }}">
                                @error('value')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-12">
                                <label for="criteria_id">Sub-Kriteria</label>
                                <select class="form-control" name="criteria_id" id="criteria_id">
                                    <option value="{{ $value->criteria_id }}" disable="true" selected="true">
                                        {{ $value->criteria->code_criteria }} - {{ $value->criteria->name_criteria }}
                                    </option>
                                    @foreach ($criteria as $v)
                                        <option value="{{ $v->id }}">
                                            {{ $v->code_criteria }} - {{ $v->name_criteria }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('criteria_id')
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
