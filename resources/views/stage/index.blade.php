@extends('layouts.app')
@section('body')
    @include('components.navbar')
    <div class="w-full px-3 my-4 sm:px-6 h-fit" x-data="{ banner: false, search: false }">
        <div class="w-full overflow-hidden rounded-lg h-fit sm:h-[500px] object-center cursor-pointer relative group"
            x-on:click="banner=!banner">
            <div
                class="absolute inset-0 flex items-center justify-center w-full h-full transition opacity-0 bg-slate-800/70 group-hover:opacity-100">
                <i class="text-4xl text-white fa-solid fa-up-right-and-down-left-from-center"></i>
            </div>
            <img src="{{ asset('images/banner-stage.jpeg') }}" alt="Banner Stage" class="object-contain w-full">
        </div>
        <div class="fixed inset-0 z-20 flex items-center justify-center w-full h-full overflow-auto bg-black/80"
            x-show="banner" x-transition>
            <i class="absolute z-10 text-3xl text-white transition cursor-pointer fa-solid fa-xmark top-5 right-10 hover:text-premier"
                x-on:click="banner=false"></i>
            <img src="{{ asset('images/banner-stage.jpeg') }}" alt="Banner Stage"
                class="relative w-full px-4 py-8 sm:py-4 sm:h-full h-fit aspect-auto">
        </div>
        <div class="px-2 py-4 my-4 border-2 rounded-lg shadow-lg sm:px-6 sm:py-8 border-sekunder">
            <span class="text-2xl font-bold sm:text-4xl text-sekunder">Form Pendaftaran</span>
            <form action="{{ route('the_stage.store') }}" method="post" x-data="{ modal: false }">
                @csrf
                <div class="grid grid-cols-3 gap-6 mt-4 md:grid-cols-3">
                    <div class="w-full col-span-full md:col-span-1">
                        <input class="w-full border-2 rounded outline-2 outline-sekunder ring-sekunder border-sekunder"
                            id="npsn" placeholder="NPSN" type="number" name="npsn" value="{{ old('npsn') }}">
                        <span
                            class="inline-block mt-1 text-sm underline transition-all cursor-pointer text-sekunder hover:text-black"
                            x-on:click="search=true"><i
                                class="mr-1 text-sm fa-solid fa-magnifying-glass text-sekunder"></i>Cari Sekolah</span>
                        @error('npsn')
                            <span class="inline-block mt-1 text-sm italic text-premier">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="w-full col-span-full md:col-span-1">
                        <input class="w-full border-2 rounded outline-2 outline-sekunder ring-sekunder border-sekunder"
                            placeholder="Nama Lengkap Peserta" type="text" name="nama" value="{{ old('nama') }}">
                        @error('nama')
                            <span class="block mt-1 text-sm italic text-premier">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="w-full col-span-full md:col-span-1">
                        <input class="w-full border-2 rounded outline-2 outline-sekunder ring-sekunder border-sekunder"
                            id="kelas" placeholder="Kelas" type="text" name="kelas" value="{{ old('kelas') }}">
                        @error('kelas')
                            <span class="inline-block mt-1 text-sm italic text-premier">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="w-full col-span-full md:col-span-1">
                        <input class="w-full border-2 rounded outline-2 outline-sekunder ring-sekunder border-sekunder"
                            id="email" placeholder="Email" type="email" name="email" value="{{ old('email') }}">
                        @error('email')
                            <span class="inline-block mt-1 text-sm italic text-premier">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="w-full col-span-full md:col-span-1">
                        <input class="w-full border-2 rounded outline-2 outline-sekunder ring-sekunder border-sekunder"
                            id="telp" placeholder="Nomor Telepon (081234567890)" type="number" name="telp"
                            value="{{ old('telp') }}">
                        @error('telp')
                            <span class="inline-block mt-1 text-sm italic text-premier">{{ $message }}</span>
                        @else
                            <span class="inline-block mt-1 text-sm italic text-sekunder">Pastikan nomor telepon benar karena
                                akan dihubungi untuk Quiz</span>
                        @enderror
                    </div>
                    <div class="w-full col-span-full md:col-span-1">
                        <input class="w-full border-2 rounded outline-2 outline-sekunder ring-sekunder border-sekunder"
                            id="wa" placeholder="Nomor Whatsapp (081234567890)" type="number" name="wa"
                            value="{{ old('wa') }}">
                        @error('wa')
                            <span class="inline-block mt-1 text-sm italic text-premier">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="w-full col-span-full md:col-span-1">
                        <select name="jenis" id="jenis"
                            class="w-full border-2 rounded outline-2 outline-sekunder ring-sekunder border-sekunder">
                            <option value="" selected disabled>Pilih Jenis Lomba</option>
                            <option value="Musik" {{ old('jenis') == 'Musik' ? 'selected' : '' }}>Musik</option>
                            <option value="Dance" {{ old('jenis') == 'Dance' ? 'selected' : '' }}>Dance</option>
                            <option value="Science" {{ old('jenis') == 'Science' ? 'selected' : '' }}>Science</option>
                            <option value="Kriya" {{ old('jenis') == 'Kriya' ? 'selected' : '' }}>Kriya</option>
                        </select>
                        @error('jenis')
                            <span class="block mt-1 text-sm italic text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="w-full col-span-full md:col-span-1">
                        <input class="w-full border-2 rounded outline-2 outline-sekunder ring-sekunder border-sekunder"
                            placeholder="Nama Tim" type="text" name="nama_tim" value="{{ old('nama_tim') }}">
                        @error('nama_tim')
                            <span class="block mt-1 text-sm italic text-premier">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="w-full col-span-full md:col-span-1">
                        <input class="w-full border-2 rounded outline-2 outline-sekunder ring-sekunder border-sekunder"
                            placeholder="Link Youtube" type="text" name="url" value="{{ old('url') }}">
                        @error('url')
                            <span class="block mt-1 text-sm italic text-premier">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="w-full col-span-full">
                        <textarea name="alasan" id="alasan" cols="30" rows="3"
                            class="w-full border-2 rounded outline-2 outline-sekunder ring-sekunder border-sekunder"
                            placeholder="Alasan Mengikuti Program Ini">{{ old('alasan') }}</textarea>
                        @error('alasan')
                            <span class="block mt-1 text-sm italic text-premier">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex items-center w-full col-span-full">
                        <input class="mr-2 border-2 rounded outline-2 outline-sekunder ring-sekunder border-sekunder"
                            type="checkbox" name="agree" id="agree" required>
                        <label for="agree" class="font-semibold text-sekunder">Saya menyetujui bahwa video saya akan
                            ditayangkan di khalayak umum</label>
                    </div>
                    {{-- <button type="submit" class="col-span-3 px-4 py-2 font-bold text-white uppercase transition-all border-2 rounded bg-sekunder hover:text-sekunder border-sekunder hover:bg-white ">Daftar</button> --}}
                    <span
                        class="col-span-3 px-4 py-2 font-bold text-center text-white uppercase transition-all border-2 rounded cursor-pointer bg-sekunder hover:text-sekunder border-sekunder hover:bg-white"
                        x-on:click="modal=!modal">Daftar</sp>
                </div>

                <div class="fixed inset-0 z-20 flex items-center justify-center w-full h-full overflow-auto bg-black/80"
                    style="display:none;" id="modal" x-show="modal" x-transition>
                    <i class="absolute z-10 text-3xl text-white transition cursor-pointer fa-solid fa-xmark top-5 right-10 hover:text-premier"
                        x-on:click="modal=false"></i>
                    <div class="flex flex-col w-full p-4 mx-4 overflow-hidden bg-white rounded-lg sm:w-1/2">
                        <p class="text-3xl font-extrabold text-center border-b-2 text-premier">PASTIKAN</p>
                        <div class="p-6">
                            <ul class="list-disc gap-x-2">
                                <li class="font-semibold">Video tidak di upload sebelum tanggal 01 Agustus 2022.</li>
                                <li class="font-semibold">Durasi Video maksimal 6 menit.</li>
                                <li class="font-semibold">Video di rekam dengan orientasi landscape.</li>
                            </ul>
                        </div>
                        <button type="submit"
                            class="w-full col-span-3 px-4 py-2 mt-6 font-bold text-white uppercase transition-all border-2 rounded bg-sekunder hover:text-sekunder border-sekunder hover:bg-white ">Daftar</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="fixed inset-0 z-20 flex items-center justify-center w-full h-full overflow-auto bg-black/80"
            style="display:none;" id="search" x-show="search" x-transition>
            <i class="absolute z-10 text-3xl text-white transition cursor-pointer fa-solid fa-xmark top-5 right-10 hover:text-premier"
                x-on:click="search=false"></i>
            <div class="flex flex-col w-full mx-4 overflow-hidden bg-white rounded-lg sm:w-1/2">
                <span class="inline-block w-full p-4 mb-4 text-lg font-bold text-center text-white bg-premier">Cari
                    Sekolah</span>
                <input type="text" class="mx-4 rounded" name="sekolah" id="sekolah"
                    placeholder="Ketik Nama Sekolah" class="mb-4" autofocus>
                <img src="{{ asset('images/loading.svg') }}" alt="Loading" id="loading"
                    class="w-24 h-24 mx-auto mt-6">
                <div class="flex flex-col w-full h-64 py-2 mt-2 overflow-auto" id="school-list">
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#loading').hide();

            $('#sekolah').on('input', function() {
                $('#loading').show();
                findSchool();
            })

            const findSchool = () => {
                let _token = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    url: "{{ URL::to('/find_school') }}",
                    method: "POST",
                    dataType: "JSON",
                    data: {
                        name: $('#sekolah').val(),
                        _token: _token
                    },
                    success: (data) => {
                        $('#school-list').html(
                            data.map((data) => {
                                return `
                                <div class="flex flex-col p-4 transition border-b-2 cursor-pointer school-item hover:bg-gray-500/50" npsn="${data.NPSN}" x-on:click="search=false">

                                    <span class="font-bold text-sekunder">${data.NAMA_SEKOLAH}</span>
                                    <span class="font-semibold text-tersier">${data.NPSN}</span>
                                </div>
                            `
                            })
                        )
                        $('#loading').hide();

                        $('.school-item').click(function() {
                            let npsn = $(this).attr('npsn');
                            // $('#search').hide();
                            $('#npsn').val(npsn);
                        })

                    },
                    error: (e) => {
                        console.log('error', e);
                    }
                })
            }
        })
    </script>
@endsection
