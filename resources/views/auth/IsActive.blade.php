<x-applayout title="Aktivasi Akun">
    <main>
        <div class="container">
            <section
                class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mx-auto text-center mb-4">{{ __('Aktivasi Akun') }}</div>
                                    {{ __('Akun Anda Belum Aktif. ') }}
                                    {{ __('Mohon Menghubungi Bagian Admin') }}
                                    <a href="{{ route('login') }}" class="btn btn-link p-0 m-0 align-baseline"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Kembali') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
</x-applayout>
