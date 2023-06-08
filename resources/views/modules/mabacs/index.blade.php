<x-applayout :title="$title">
    @Inject('Constant', 'App\Traits\Constant');

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
                <div class="row">
                    <div class="col-lg-12">
                        <table class="table table-striped table-bordered table-hover load-table">
                            <thead class="text-center">
                                <tr>
                                    <th rowspan='3'>No</th>
                                    <th rowspan='3'>Alternatif</th>
                                    <th rowspan='3'>Nama</th>
                                    <th colspan={{ $jml_krt }}>Kriteria</th>
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
                                            <td align='center'>
                                                <h5 class="text-primary">{{ number_format($krit[$k]['nilai'], 2) }}</h5>
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- ===================================================Normalisasi================================================================ --}}
                <div class="row">
                    <div class="col-lg-12">
                        <table class="table table-striped table-bordered table-hover load-table">
                            <thead class="text-center">
                                <tr>
                                    <th rowspan='3'>No</th>
                                    <th rowspan='3'>Alternatif</th>
                                    <th rowspan='3'>Nama</th>
                                    <th colspan={{ $jml_krt }}>Kriteria</th>
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
                                            @php
                                                $jenis = $krit[$k]['jenis'];
                                                $max = $Constant->max($krit[$k]['id_kriteria']);
                                                $min = $Constant->min($krit[$k]['id_kriteria']);
                                                if ($jenis == 'Benefit') {
                                                    $x = ($krit[$k]['nilai'] - $min) / ($max - $min);
                                                } elseif ($jenis == 'Cost') {
                                                    $x = ($krit[$k]['nilai'] - $max) / ($min - $max);
                                                } else {
                                                    $x = 0;
                                                }
                                            @endphp
                                            <td align='center'>
                                                <h5 class="text-primary">{{ number_format($x, 2) }}
                                                </h5>
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- ===================================================Matriks Tertimbang================================================================ --}}
                <div class="row">
                    <div class="col-lg-12">
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-applayout>
