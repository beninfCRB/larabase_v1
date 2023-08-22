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
                <div class="text-center text-sm load">
                    <div class="loadingio-spinner-ellipsis-g13kl16i1a">
                        <div class="ldio-57pp3duu948">
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                    </div>
                </div>

                <table class="table table-striped table-bordered table-hover load-table">
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
                                    <td align='center'><a style="text-decoration:none"
                                            class="text-danger text-bold clickSample" data-toggle="modal"
                                            data-target="#edit{{ strval($krit[$k]['id_data']) }}">
                                            <h5>{{ number_format($krit[$k]['nilai'], 2) }}</h5>
                                        </a>
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
                        <div class="form-group col-12">
                            <label for="alternative_id">Alternative</label>
                            <select class="form-control" name="alternative_id" id="alternative_id">
                                <option value="0" disable="true" selected="true">========Pilih
                                    Alternatif========
                                </option>
                                @foreach ($malternative as $v)
                                    <option value="{{ $v->id }}">
                                        {{ $v->code_alternative }} - {{ $v->name_alternative }}
                                    </option>
                                @endforeach
                            </select>
                            @error('alternative_id')
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

                    <form action="{{ route($breadcumb[0] . '.update', $value->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <input id="criteria{{ $value->criteria_id }}" hidden type="text"
                            value="{{ $value->criteria_id }}" class="criteria{{ $value->criteria_id }}">

                        <div class="row">
                            <div class="form-group col-12">
                                <label for="subkriteria">Sub-Kriteria</label>
                                <select class="form-control subkriteria{{ $value->criteria_id }}" name="subkriteria"
                                    id="subkriteria{{ $value->criteria_id }}">
                                    <option value="0" disable="true" selected="true">========Pilih
                                        Sub-Kriteria========
                                    </option>
                                </select>
                                @error('subkriteria')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-12">
                                <label for="value">Nilai</label>
                                <input id="value{{ $value->criteria_id }}" type="text" readonly
                                    class="form-control @error('value')
                                    is-invalid
                                @enderror value{{ $value->criteria_id }}"
                                    name="value">
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
    @php
    @endphp
    <script type="module">
        let criteria_id = $('.criteria' + {{ strval($value->criteria_id) }}).val();
        $('.load-table').hide();
        $('.load').show();

        $.get('/get/subcriteria?criteria_id=' + criteria_id, function(data) {

            $('.value' + {{ strval($value->criteria_id) }}).empty();
            $('.value' + {{ strval($value->criteria_id) }}).val(0);

            $('.subkriteria' + {{ strval($value->criteria_id) }}).empty();
            $('.subkriteria' + {{ strval($value->criteria_id) }}).append(
                '<option value="0" disable="true" selected="true">========Pilih Sub-Kriteria========</option>'
            );
            $('.load').hide();
            $('.load-table').show();

            $.each(data, function(index, obj) {
                $('.subkriteria' + {{ $value->criteria_id }}).append(
                    '<option value="' + obj
                    .value_subcriteria + '">' + obj
                    .name_subcriteria +
                    '</option>');
            })
        });

        $('.subkriteria' + {{ strval($value->criteria_id) }}).change((e) => {
            $('.value' + {{ strval($value->criteria_id) }}).val(e.target.value)
        });
    </script>
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
<script type="module">
    $(".btn-submit").click(function(e) {
        e.preventDefault();
        var form = this
        Swal.fire({
            title: "Yakin ingin menhapus data ini?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Ya!",
            cancelButtonText: "Batal",
            closeOnConfirm: true
        }).then((result) => {
            if (result.isConfirmed) {
                $(this).parent('form').trigger('submit')
            }
        });
    });
</script>
