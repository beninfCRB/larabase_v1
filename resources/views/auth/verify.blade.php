<x-applayout title="Verifikasi Email">
    <main>
        <div class="container">
            <section
                class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mx-auto text-center mb-4">{{ __('Verifikasi alamat email Anda') }}</div>
                                    @if (session('resent'))
                                        <div class="alert alert-success" role="alert">
                                            {{ __('Tautan verifikasi telah dikirim ke alamat email Anda.') }}
                                        </div>
                                    @endif

                                    <div class="text-center">
                                        @if (session('resent'))
                                            {{ __('Apabila belum menerima tautan ke email kamu') }}
                                        @else
                                            {{ __('Email anda belum diverifikasi') }},
                                            {{ __('Mohon klik tautan verifikasi email ini') }}
                                        @endif
                                        <form class="d-inline" method="POST"
                                            action="{{ route('verification.resend') }}">
                                            @csrf
                                            <button type="submit"
                                                class="btn btn-link p-0 m-0 align-baseline">{{ __('klik di sini') }}</button>.
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
</x-applayout>
