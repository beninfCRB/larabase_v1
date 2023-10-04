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
        <div class="card opacity-75 text-success  shadow-lg border border-success">
            <h1 class="mx-auto mt-4">{{ $method }}</h1>
            <div class="col-lg-12 text-left">
                <h2>Rumus : </h2>
                <div class="row">
                    <div class="col-2">
                        <img src="{{ asset('image/mabac/matriks_keputusan_awal.jpg') }}" alt="">
                    </div>
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
                    <div class="col-lg-12 text-left">
                        <h2>Rumus : </h2>
                        <div class="row">
                            <div class="col-2">
                                <h4>Jenis kriteria benefit</h4>
                                <img src="{{ asset('image/mabac/jenis_benefit.jpg') }}" alt="">
                            </div>
                            <div class="col-2">
                                <h4>Jenis kriteria cost</h4>
                                <img src="{{ asset('image/mabac/jenis_cost.jpg') }}" alt="">
                            </div>
                            <div class="col-2">
                                <h4>Mewakili nilai maksimum dari kriteria yang diamati oleh alternatif</h4>
                                <img src="{{ asset('image/mabac/nilai_max.jpg') }}" alt="">
                            </div>
                            <div class="col-2">
                                <h4>Mewakili nilai minimum dari kriteria yang diamati oleh alternatif</h4>
                                <img src="{{ asset('image/mabac/nilai_min.jpg') }}" alt="">
                            </div>
                        </div>
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
                                                $jenis = $krit[$k]['jenis']; // hasil benefit
                                                $max = $constant->max($krit[$k]['id_kriteria']); // set paramater 1 dengan hasil 10
                                                $min = $constant->min($krit[$k]['id_kriteria']); // set parameter 1 dengan hasil 1
                                                if ($jenis == 'Benefit') {
                                                    $x = ($krit[$k]['nilai'] - $min) / ($max - $min); // variabel x hasil perhituangan (2,5 - 1) / (10-1)
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
                        <h2>Matriks Tertimbang</h2>
                    </div>
                    <div class="col-lg-12 text-left">
                        <h2>Rumus : </h2>
                        <div class="row">
                            <div class="col-2">
                                <img src="{{ asset('image/mabac/matriks_tertimbang.jpg') }}" alt="">
                            </div>
                        </div>
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
                                                    $v = ($krit[$k]['nilai'] - $min) / ($max - $min); // hasil samakan dengan matriks normalisasi 0,167
                                                    $v_hasil = $v * $krit[$k]['bobot'] + $krit[$k]['bobot']; // hasil 0,167 * 0,3 + 0,3 = 0,350
                                                } elseif ($jenis == 'Cost') {
                                                    $v = ($krit[$k]['nilai'] - $max) / ($min - $max);
                                                    $v_hasil = $v * $krit[$k]['bobot'] + $krit[$k]['bobot'];
                                                } else {
                                                    $v_hasil = 0;
                                                }
                                                
                                                $temp[$krit[$k]['id_kriteria']][$krit[$k]['nama_alternatif']] = $v_hasil; // objek temp indeks 1 dan indeks Noval = 0,350
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
                    <div class="col-lg-12 text-left">
                        <h2>Rumus : </h2>
                        <div class="row">
                            <div class="col-2">
                                <img src="{{ asset('image/mabac/matriks_batas.jpg') }}" alt="">
                            </div>
                        </div>
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
                                        $pangkat = 1 / count($alternatif); // 1 / count (menghitung data) dari alternatif = 10 yg hasilnya 0,1
                                    @endphp
                                    @foreach ($temp as $t => $data)
                                        @php
                                            foreach ($alternatif as $a) {
                                                $pos[] = number_format($data[$a], 3); // variabel pos = indeks 1 indeks noval hasilnya 0,350
                                            }
                                        @endphp
                                        <th class="text-center">
                                            <h5 class="text-primary">
                                                @php
                                                    $l = number_format(pow(array_product($pos), $pangkat), 3); // variabel l isinya perhitungan pow (perpangkatan https://www.w3schools.com/php/phptryit.asp?filename=tryphp_func_math_pow ) paramater array product (https://www.w3schools.com/php/phptryit.asp?filename=tryphp_func_array_product) pow(0,350 , 0,1)
                                                    echo $constant->number($l);
                                                @endphp
                                            </h5>
                                        </th>
                                        @php
                                            $pos = [];
                                            $G[$t] = $l; // variabel G ber indeks 1 = 0,391
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
                    <div class="col-lg-12 text-left">
                        <h2>Rumus : </h2>
                        <div class="row">
                            <div class="col-2">
                                <img src="{{ asset('image/mabac/matriks_jarak.jpg') }}" alt="">
                            </div>
                        </div>
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
                                                $id_kriteria = $krit[$k]['id_kriteria']; // varibael id kriteria hasilnya 1
                                                $jenis = $krit[$k]['jenis'];
                                                $max = $constant->max($id_kriteria);
                                                $min = $constant->min($id_kriteria);
                                                if ($jenis == 'Benefit') {
                                                    $v = ($krit[$k]['nilai'] - $min) / ($max - $min); // hasilnya 0,167
                                                    $v_hasil = $v * $krit[$k]['bobot'] + $krit[$k]['bobot']; // hasilnya 0,350
                                                } elseif ($jenis == 'Cost') {
                                                    $v = ($krit[$k]['nilai'] - $max) / ($min - $max);
                                                    $v_hasil = $v * $krit[$k]['bobot'] + $krit[$k]['bobot'];
                                                } else {
                                                    $v_hasil = 0;
                                                }
                                                
                                                $y[$id_kriteria] = number_format($v_hasil - $G[$id_kriteria], 3); // variabel baru y berindeks 1 = 0,350 s/d 0,391 hasilnya -0,041
                                                $z[$id_kriteria] = $krit['C1']['nama_alternatif']; // hasilnya Noval
                                            @endphp
                                            <td class="text-center">
                                                <h5 class="text-primary">
                                                    {{ $constant->number($v_hasil - $G[$id_kriteria]) }}
                                                </h5>
                                            </td>
                                        @endforeach
                                    </tr>
                                    @php
                                        $finis[] = ['nilai' => array_sum($y), 'nama' => array_unique($z)]; // objek finis dengan indeks nilai = array_sum nilai -0,041 s/d  -0,391https://www.w3schools.com/php/phptryit.asp?filename=tryphp_func_array_sum dan indeks nama = Noval
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
                    <div class="col-lg-12 text-left">
                        <h2>Rumus : </h2>
                        <div class="row">
                            <div class="col-2">
                                <img src="{{ asset('image/mabac/perankingan.jpg') }}" alt="">
                            </div>
                        </div>
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
                                        $arr[] = $f['nilai']; // array arr isinya -0,155 s/d -0,038
                                    }
                                    $rank = $arr; // variable rank isinya variable arr
                                    sort($rank); // diurutkan deangan sort  https://www.w3schools.com/php/phptryit.asp?filename=tryphp_array_sort_num
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
