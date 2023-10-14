@if (auth()->user()->role == 'admin')
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle {{ strstr($title, 'Halaman') ? 'text-success' : 'text-black' }}" href="#"
            role="button" data-toggle="dropdown" aria-expanded="false">
            Halaman
        </a>
        <div class="dropdown-menu">
            <a class="dropdown-item {{ strstr($title, 'Halaman Jenis') ? 'text-success' : 'text-black' }}"
                href="{{ route('types.index') }}">Jenis Kriteria</a>
            <a class="dropdown-item {{ strstr($title, 'Halaman Kriteria') ? 'text-success' : 'text-black' }}"
                href="{{ route('criterias.index') }}">Kriteria</a>
            <a class="dropdown-item {{ strstr($title, 'Halaman Sub-Kriteria') ? 'text-success' : 'text-black' }}"
                href="{{ route('subcriterias.index') }}">Sub-Kriteria</a>
            <a class="dropdown-item {{ strstr($title, 'Halaman Alternatif') ? 'text-success' : 'text-black' }}"
                href="{{ route('alternatives.index') }}">Alternatif</a>
            @if ($check2)
                <a class="dropdown-item {{ strstr($title, 'Halaman Data Sample') ? 'text-success' : 'text-black' }}"
                    href="{{ route('samples.index') }}">Data Sample</a>
            @endif
        </div>
    </li>
@endif
@if (!$check1)
    <li class="nav-item">
        <a class="nav-link {{ strstr($title, 'Perhitungan Mabac') ? 'text-success' : 'text-black' }}"
            href="{{ route('mabacs') }}">Perhitungan Mabac</a>
    </li>
@endif
@if (!$check1)
    <li class="nav-item">
        <a class="nav-link {{ strstr($title, 'Perhitungan Weight Product') ? 'text-success' : 'text-black' }}"
            href="{{ route('wps') }}">Perhitungan Weight Product</a>
    </li>
@endif
@if (!$check1)
    <li class="nav-item">
        <a class="nav-link {{ strstr($title, 'Kelola Akun') ? 'text-success' : 'text-black' }}"
            href="{{ route('users.index') }}">Kelola Akun</a>
    </li>
@endif
