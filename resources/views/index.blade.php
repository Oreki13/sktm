@extends('layout.main')
@extends('layout.sweetalert')
@section('content')
    @include('layout.header')

    <section class="flex max-w-screen-xl w-full mt-10 bg-white mx-auto rounded-md py-3 px-10 justify-around h-48">
        <div class="w-full">
            <h1 class="text-xl font-bold">Periksa Pengajuan</h1>
            <div class="mt-5">
                <form class="flex flex-col">
                    <input class="border-2 border-gray-200 p-2 rounded-md  focus:outline-1 focus:outline-gray-400"
                        type="number" placeholder="Masukan NIK anda" id="nik" />
                    <button type="button" onclick="cekStatus()"
                        class="bg-gray-300 rounded-md font-bold py-1 mt-3 hover:bg-gray-400 transition-all duration-300">PERIKSA</button>
                </form>
            </div>

        </div>
        <div class="w-14">
            <div class="h-full bg-gray-300 w-0.5 rounded-lg mx-auto"></div>
        </div>
        <div class="w-full">
            <h1 class="text-xl font-bold">Atau</h1>
            <div class="flex items-center h-36">


                <a href="/pengajuan-sktm"
                    class="bg-gray-300 rounded-md font-bold py-2 w-full  hover:bg-gray-400 transition-all duration-300 cursor-pointer px-2 text-center">Ajukan
                    SKTM</a>
            </div>
        </div>
    </section>
@endsection
@push('js')
    <script>
        const cekStatus = async () => {
            const val = document.getElementById('nik').value
            if (val.length == 16) {
                fetch('/check-status/' + document.getElementById('nik').value).then(async (e) => {
                    const res = await e.json();
                    if (res.code == 404) {
                        showAlert('Failed', 'NIK tidak ditemukan', 'error', 'OK');
                    } else if (res.code == 200) {
                        const status = res.status == 0 ? 'Pengajuan SKTM anda masih dalam proses' : res
                            .status == 1 ? 'Selamat pengajuan SKTM anda diterima' :
                            'Mohon maaf pengajuan SKTM anda di tolak'
                        showAlert('Success', status, 'info', 'OK');

                    }
                })

            } else {
                showAlert('Failed', 'NIK harus 16 digit', 'error', 'OK');

            }
        }
    </script>
@endpush
