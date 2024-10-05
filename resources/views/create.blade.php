@extends('template')

@section('content')
    <div>
        <p class="text-center text-lg font-semibold">Tambah data siswa</p>
    </div>
    <div class="flex justify-center mt-5">
        <div class="w-1/3 border-2 rounded-md py-10">
            <form method="POST" action="/store" class="max-w-sm mx-auto">
                @csrf
                <div class="mb-5">
                    <div>
                        <label for="Nm_pendaftar" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Nama pendaftar
                        </label>
                        <input type="text" name="Nm_pendaftar" id="Nm_pendaftar"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @error('Nm_pendaftar')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-5">
                        <label for="Alamat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Alamat
                        </label>
                        <textarea id="Alamat" name="Alamat" rows="4"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                        @error('Alamat')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-5">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Jenis kelamin
                        </label>
                        <div class="flex justify-evenly mb-4">
                            <div>
                                <input id="Laki-laki" type="radio" value="Laki-laki" name="Jenis_kelamin"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="Laki-laki"
                                    class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Laki-laki</label>
                            </div>
                            <div>
                                <input id="Perempuan" type="radio" value="Perempuan" name="Jenis_kelamin"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="Perempuan"
                                    class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Perempuan</label>
                            </div>
                        </div>
                        @error('Jenis_kelamin')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-5">
                        <label for="No_hp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            No HP
                        </label>
                        <input type="text" name="No_hp" id="No_hp"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @error('No_hp')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-5">
                        <label for="Asal_sekolah" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Asal sekolah
                        </label>
                        <input type="text" name="Asal_sekolah" id="Asal_sekolah"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @error('Asal_sekolah')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-5">
                        <label for="Jurusan">Jurusan</label>
                        <select name="Jurusan" id="Jurusan" class="block border border-primary rounded-md w-full">
                            <option value="RPL">RPL</option>
                            <option value="TKJ">TKJ</option>
                            <option value="MM">MM</option>
                        </select>
                        @error('Jurusan')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-5">
                        <label for="Tgl_lahir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Tanggal lahir
                        </label>
                        <input type="date" name="Tgl_lahir" id="Tgl_lahir"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @error('Tgl_lahir')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-5">
                        <label for="NISN" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            NISN
                        </label>
                        <input type="text" name="NISN" id="NISN"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @error('NISN')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex justify-between mt-10">
                        <button type="submit" class="bg-green-600 w-32 h-10 rounded-md text-white">Tambah data</button>
                        <a href="/"><button type="button"
                                class="bg-red-600 w-32 h-10 rounded-md text-white">Kembali</button></a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
