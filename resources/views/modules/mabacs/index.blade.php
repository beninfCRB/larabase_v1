<x-applayout :title="$title">
    @Inject('constant', 'App\Traits\constant')

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="breadcumb">
            <h1 class="h3 mb-2 text-gray-800 font-weight-bold">{{ $title }}</h1>
            <x-BreadCumb :breadcumb="$breadcumb" />
            <div class="col-12 text-center m-4">
                <button class="btn btn-success btn-print"><i class="fas fa-print"></i> Print</button>
            </div>
        </div>
        <div class="card shadow-lg">
            <h1 class="mx-auto mt-4">{{ $method }}</h1>
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
                                            <td class="text-center">
                                                <h5 class="text-primary">
                                                    {{ $constant->number($krit[$k]['nilai']) }}</h5>
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- ===================================================Normalisasi================================================================ --}}
                <div class="row mt-5 mb-5">
                    <div class="col-lg-12 text-center">
                        <h2>Matriks Normalisasi</h2>
                    </div>
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
                                                $max = $constant->max($krit[$k]['id_kriteria']);
                                                $min = $constant->min($krit[$k]['id_kriteria']);
                                                if ($jenis == 'Benefit') {
                                                    $x = ($krit[$k]['nilai'] - $min) / ($max - $min);
                                                } elseif ($jenis == 'Cost') {
                                                    $x = ($krit[$k]['nilai'] - $max) / ($min - $max);
                                                } else {
                                                    $x = 0;
                                                }
                                            @endphp
                                            <td class="text-center">
                                                <h5 class="text-primary">{{ $constant->number($x) }}
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
                <div class="row mt-5 mb-5">
                    <div class="col-lg-12 text-center">
                        <h2>Matriks Bobot Keputusan</h2>
                    </div>
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
                                @php
                                    $temp = [];
                                @endphp
                                @foreach ($nilai as $nama => $krit)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <th>{{ $nama }}</th>
                                        <td>{{ $krit['C1']['nama_alternatif'] }}</td>
                                        @foreach ($kriteria as $k)
                                            @php
                                                $jenis = $krit[$k]['jenis'];
                                                $max = $constant->max($krit[$k]['id_kriteria']);
                                                $min = $constant->min($krit[$k]['id_kriteria']);
                                                if ($jenis == 'Benefit') {
                                                    $v = ($krit[$k]['nilai'] - $min) / ($max - $min);
                                                    $v_hasil = $v * $krit[$k]['bobot'] + $krit[$k]['bobot'];
                                                } elseif ($jenis == 'Cost') {
                                                    $v = ($krit[$k]['nilai'] - $max) / ($min - $max);
                                                    $v_hasil = $v * $krit[$k]['bobot'] + $krit[$k]['bobot'];
                                                } else {
                                                    $v_hasil = 0;
                                                }
                                                
                                                $temp[$krit[$k]['id_kriteria']][$krit[$k]['nama_alternatif']] = $v_hasil;
                                            @endphp
                                            <td class="text-center">
                                                <h5 class="text-primary">{{ $constant->number($v_hasil) }}
                                                </h5>
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- ===================================================Matriks Batas================================================================ --}}
                <div class="row mt-5 mb-5">
                    <div class="col-lg-12 text-center">
                        <h2>Matriks Batas</h2>
                    </div>
                    <div class="col-lg-12">
                        <table class="table table-striped table-bordered table-hover load-table">
                            <thead class="text-center">
                                <tr>
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
                                <tr>
                                    @php
                                        $pangkat = 1 / count($alternatif);
                                    @endphp
                                    @foreach ($temp as $t => $data)
                                        @php
                                            foreach ($alternatif as $a) {
                                                $pos[] = number_format($data[$a], 3);
                                            }
                                        @endphp
                                        <th class="text-center">
                                            <h5 class="text-primary">
                                                @php
                                                    $l = number_format(pow(array_product($pos), $pangkat), 3);
                                                    echo $constant->number($l);
                                                @endphp
                                            </h5>
                                        </th>
                                        @php
                                            $pos = [];
                                            $G[$t] = $l;
                                        @endphp
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- ===================================================Matriks Jarak================================================================ --}}
                <div class="row mt-5 mb-5">
                    <div class="col-lg-12 text-center">
                        <h2>Matriks Jarak Alternatif</h2>
                    </div>
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
                                @php
                                    $temp = [];
                                @endphp
                                @foreach ($nilai as $nama => $krit)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <th>{{ $nama }}</th>
                                        <td>{{ $krit['C1']['nama_alternatif'] }}</td>
                                        @foreach ($kriteria as $k)
                                            @php
                                                $id_kriteria = $krit[$k]['id_kriteria'];
                                                $jenis = $krit[$k]['jenis'];
                                                $max = $constant->max($id_kriteria);
                                                $min = $constant->min($id_kriteria);
                                                if ($jenis == 'Benefit') {
                                                    $v = ($krit[$k]['nilai'] - $min) / ($max - $min);
                                                    $v_hasil = $v * $krit[$k]['bobot'] + $krit[$k]['bobot'];
                                                } elseif ($jenis == 'Cost') {
                                                    $v = ($krit[$k]['nilai'] - $max) / ($min - $max);
                                                    $v_hasil = $v * $krit[$k]['bobot'] + $krit[$k]['bobot'];
                                                } else {
                                                    $v_hasil = 0;
                                                }
                                                
                                                $y[$id_kriteria] = number_format($v_hasil - $G[$id_kriteria], 3);
                                                $z[$id_kriteria] = $krit['C1']['nama_alternatif'];
                                            @endphp
                                            <td class="text-center">
                                                <h5 class="text-primary">
                                                    {{ $constant->number($v_hasil - $G[$id_kriteria]) }}
                                                </h5>
                                            </td>
                                        @endforeach
                                    </tr>
                                    @php
                                        $finis[] = ['nilai' => array_sum($y), 'nama' => array_unique($z)];
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- ===================================================Perangkingan================================================================ --}}
                <div class="row mt-5 mb-5">
                    <div class="col-lg-12 text-center">
                        <h2>Perangkingan</h2>
                    </div>
                    <div class="col-lg-12">
                        <table class="table table-striped table-bordered table-hover load-table">
                            <thead class="text-center">
                                <tr>
                                    <th rowspan='3'>No</th>
                                    <th rowspan='3'>Nama</th>
                                    <th rowspan='3'>Nilai</th>
                                    <th rowspan='3'>Rangking</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    foreach ($finis as $f) {
                                        $arr[] = $f['nilai'];
                                    }
                                    $rank = $arr;
                                    sort($rank);
                                @endphp
                                @foreach ($finis as $z)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $z['nama'][1] }}</td>
                                        <td class="text-center">
                                            <h5 class="text-primary">
                                                {{ $constant->number($z['nilai']) }}
                                            </h5>
                                        </td>
                                        <td class="text-center">
                                            <h5 class="text-danger">
                                                {{ array_search($z['nilai'], $rank) + 1 }}
                                            </h5>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-applayout>
