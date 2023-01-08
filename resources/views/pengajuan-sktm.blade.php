@extends('layout.main')
@extends('layout.sweetalert')
@section('content')
    @include('layout.header')
    <section class="bg-white max-w-screen-xl mx-auto mt-10 rounded-md p-5">
        <h1 class="text-center text-2xl font-semibold">Form Pengajuan SKTM</h1>

        <form class="mt-10" method="POST" action="/pengajuan-sktm">
            @csrf
            <div class="flex w-full">
                <div class="flex flex-col w-full justify-between">
                    <label>NIK</label>
                    <input name='nik' type='number' value="{{ old('nik') }}"
                        class="bg-gray-200 rounded-sm p-2 focus:ring-gray-400  focus:ring-2 border-0 mt-1" />
                    @error('nik')
                        <h1 class="text-red-600">{{ $message }}</h1>
                    @enderror
                </div>
                <div class="w-14"></div>
                <div class="flex flex-col w-full ">
                    <label>Nama Lengkap</label>
                    <input name='nama' value="{{ old('nama') }}"
                        class="bg-gray-200 rounded-sm p-2 focus:ring-gray-400  focus:ring-2 focus:outline-0 mt-1" />
                    @error('nama')
                        <h1 class="text-red-600">{{ $message }}</h1>
                    @enderror
                </div>
                <div class="w-14"></div>
                <div class="flex flex-col w-full ">
                    <label>Email</label>
                    <input name='email' type="email" value="{{ old('email') }}"
                        class="bg-gray-200 rounded-sm p-2 focus:ring-gray-400  focus:ring-2 focus:outline-0 mt-1 border-0" />
                    @error('email')
                        <h1 class="text-red-600">{{ $message }}</h1>
                    @enderror
                </div>
            </div>
            <div class="flex w-full mt-3">
                <div class="flex flex-col w-full">
                    <label>Jenis Kelamin</label>
                    {{-- <input name='jk' class="bg-gray-200 rounded-sm p-2 focus:outline-gray-400 mt-1" /> --}}
                    <select name="jenis_kelamin" id="jenis_kelamin"
                        class="bg-gray-200 rounded-sm p-2 focus:ring-gray-400  focus:ring-2 focus:outline-0 border-0 mt-1">
                        <option value="" @if (old('jenis_kelamin') == '') selected @endif>Pilih Jenis Kelamin
                        </option>
                        <option value="Laki-laki" @if (old('jenis_kelamin') == 'Laki-laki') selected @endif>Laki-laki</option>
                        <option value="Perempuan" @if (old('jenis_kelamin') == 'Perempuan') selected @endif>Perempuan</option>
                    </select>
                    @error('jenis_kelamin')
                        <h1 class="text-red-600">{{ $message }}</h1>
                    @enderror
                </div>
                <div class="w-14"></div>
                <div class="flex flex-col w-full">
                    <label>Agama</label>
                    {{-- <input name='nama' class="bg-gray-200 rounded-sm p-2 focus:outline-gray-400 mt-1" /> --}}
                    <select name="agama" id="agama"
                        class="bg-gray-200 rounded-sm p-2 focus:ring-gray-400  focus:ring-2 focus:outline-0 border-0 mt-1">
                        <option value="" @if (old('agama') == '') selected @endif>Pilih Agama</option>
                        <option value="Islam" @if (old('agama') == 'Islam') selected @endif>Islam</option>
                        <option value="Katolik" @if (old('agama') == 'Katolik') selected @endif>Katolik</option>
                        <option value="Protestan" @if (old('agama') == 'Protestan') selected @endif>Protestan</option>
                        <option value="Hindu" @if (old('agama') == 'Hindu') selected @endif>Hindu</option>
                        <option value="Buddha" @if (old('agama') == 'Buddha') selected @endif>Buddha</option>
                        <option value="Khonghucu" @if (old('agama') == 'Khonghucu') selected @endif>Khonghucu</option>
                    </select>
                    @error('agama')
                        <h1 class="text-red-600">{{ $message }}</h1>
                    @enderror
                </div>
            </div>
            <div class="flex w-full mt-3">
                <div class="flex flex-col w-full">
                    <label>Tempat Lahir</label>
                    <input name='pob' value="{{ old('pob') }}"
                        class="bg-gray-200 rounded-sm p-2 focus:ring-gray-400  focus:ring-2 focus:outline-0 mt-1" />
                    @error('pob')
                        <h1 class="text-red-600">{{ $message }}</h1>
                    @enderror
                </div>
                <div class="w-14"></div>
                <div class="flex flex-col w-full">
                    <label>Tanggal Lahir</label>
                    <input datepicker type="text" name="dob" value="{{ old('dob') }}"
                        class="bg-gray-200 rounded-sm p-2 focus:ring-gray-400  focus:ring-2 focus:outline-0 border-0 mt-1"
                        placeholder="Select date">
                    @error('dob')
                        <h1 class="text-red-600">{{ $message }}</h1>
                    @enderror
                </div>
            </div>
            <div class="flex w-full mt-3">
                <div class="flex flex-col w-full">
                    <label>Pendidikan</label>
                    <input name='pendidikan' value="{{ old('pendidikan') }}"
                        class="bg-gray-200 rounded-sm p-2 focus:ring-gray-400  focus:ring-2 focus:outline-0 mt-1" />
                    @error('pendidikan')
                        <h1 class="text-red-600">{{ $message }}</h1>
                    @enderror
                </div>
                <div class="w-14"></div>
                <div class="flex flex-col w-full">
                    <label>Jenis Pekerjaan</label>
                    <input name='pekerjaan' value="{{ old('pekerjaan') }}"
                        class="bg-gray-200 rounded-sm p-2 focus:ring-gray-400  focus:ring-2 focus:outline-0 mt-1" />
                    @error('pekerjaan')
                        <h1 class="text-red-600">{{ $message }}</h1>
                    @enderror
                </div>
            </div>
            <div class="flex w-full mt-3">
                <div class="flex flex-col w-full">
                    <label>Alamat</label>
                    <input name='address' value="{{ old('address') }}"
                        class="bg-gray-200 rounded-sm p-2 focus:ring-gray-400  focus:ring-2 focus:outline-0 mt-1" />
                    @error('address')
                        <h1 class="text-red-600">{{ $message }}</h1>
                    @enderror
                </div>
            </div>
            <button class="border-2 border-gray-300 w-full mt-10 py-2 rounded-sm hover:bg-gray-100">Ajukan</button>

        </form>
    </section>
@endsection
@push('js')
    <script src="https://unpkg.com/flowbite@1.6.0/dist/datepicker.js"></script>
    @if (session('success'))
        <script>
            showAlert('Success', '{{ session('success') }}', 'success', 'OK');
        </script>
    @elseif(session('failed'))
        <script>
            showAlert('Failed', '{{ session('failed') }}', 'error', 'OK');
        </script>
    @endif

@endpush
