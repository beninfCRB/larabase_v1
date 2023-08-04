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
                                                <h5 class="text-primary">{{ $constant->number($krit[$k]['nilai']) }}
                                                </h5>
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- ===================================================Nilai Pangkat================================================================ --}}
                <div class="row mt-5 mb-5">
                    <div class="col-lg-12 text-center">
                        <h2>Nilai Pangkat</h2>
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
                                    @foreach ($o_kriteria as $o)
                                        <th class="text-center">
                                            <h5 class="text-primary">
                                                @php
                                                    if ($o->type->name == 'Benefit') {
                                                        $value[$o->code] = number_format($o->value, 3);
                                                        echo $constant->number($o->value);
                                                    } else {
                                                        $value[$o->code] = number_format(0 - $o->value, 3);
                                                        echo $constant->number(0 - $o->value);
                                                    }
                                                @endphp
                                            </h5>
                                        </th>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- ===================================================Matriks Hasil Pangkat================================================================ --}}
                <div class="row mt-5 mb-5">
                    <div class="col-lg-12 text-center">
                        <h2>Matriks Hasil Pangkat</h2>
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
                                            <td class="text-center">
                                                <h5 class="text-primary">
                                                    @php
                                                        $temp[$nama][] = number_format(pow($krit[$k]['nilai'], $value[$k]), 3);
                                                        echo $constant->number(pow($krit[$k]['nilai'], $value[$k]));
                                                    @endphp
                                                </h5>
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- ===================================================Nilai Vektor S================================================================ --}}
                <div class="row mt-5 mb-5">
                    <div class="col-lg-12 text-center">
                        <h2>Nilai Vektor S</h2>
                        <h2>Rumus : </h2>
                        <img src="{{ asset('image/wp/vektor_s.jpg') }}" alt="">
                    </div>
                    <div class="col-lg-6 mx-auto">
                        <table class="table table-striped table-bordered table-hover load-table">
                            <thead class="text-center">
                                <tr>
                                    <th>Nama Alternatif</th>
                                    <th>Nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($o_alternatif as $o)
                                    <tr class="text-center">
                                        <td>{{ $o->name }}</td>
                                        <td>
                                            <h5 class="text-primary">
                                                @php
                                                    $vektor_s[] = number_format(array_product($temp[$o->code]), 3);
                                                    echo $constant->number(array_product($temp[$o->code]));
                                                @endphp
                                            </h5>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- ===================================================Nilai Vektor V================================================================ --}}
                <div class="row mt-5 mb-5">
                    <div class="col-lg-12 text-center">
                        <h2>Nilai Vektor V</h2>
                    </div>
                    <div class="col-lg-12 text-center">
                        <h2>Rumus : </h2>
                        <img src="{{ asset('image/wp/vektor_v.jpg') }}" alt="">
                    </div>
                    <div class="col-lg-6 mx-auto">
                        <table class="table table-striped table-bordered table-hover load-table">
                            <thead class="text-center">
                                <tr>
                                    <th>Nama Alternatif</th>
                                    <th>Nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $bottom = array_sum($vektor_s);
                                @endphp
                                @foreach ($o_alternatif as $o)
                                    <tr class="text-center">
                                        <td>{{ $o->name }}</td>
                                        <td>
                                            <h5 class="text-primary">
                                                @php
                                                    $vektor_v = number_format(array_product($temp[$o->code]) / $bottom, 3);
                                                    $rank[] = $vektor_v;
                                                    echo $constant->number($vektor_v);
                                                @endphp
                                            </h5>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- ===================================================Rangking================================================================ --}}
                <div class="row mt-5 mb-5">
                    <div class="col-lg-12 text-center">
                        <h2>Perangkingan</h2>
                    </div>
                    <div class="col-lg-6 mx-auto">
                        <table class="table table-striped table-bordered table-hover load-table">
                            <thead class="text-center">
                                <tr>
                                    <th>Nama Alternatif</th>
                                    <th>Rangking</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($o_alternatif as $o)
                                    <tr class="text-center">
                                        <td>{{ $o->name }}</td>
                                        <td>
                                            <h5 class="text-danger">
                                                @php
                                                    sort($rank);
                                                    echo array_search(number_format(array_product($temp[$o->code]) / $bottom, 3), $rank) + 1;
                                                @endphp
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
