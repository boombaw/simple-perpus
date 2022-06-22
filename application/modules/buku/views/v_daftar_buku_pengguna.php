<!-- List Buku -->

<div class="mx-4 card rounded-lg shadow-lg bg-white mb-4 border border-slate-200">
    <div class="card-body">
        <p class="text-xl text-slate-500">Daftar Buku</p>
        <table class="table" id="tbl_buku_pengguna">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul Buku</th>
                    <th>Tahun Terbit</th>
                    <th>Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

<!-- Detail Buku -->
<!-- The button to open modal -->
<!-- Put this part before </body> tag -->
<input type="checkbox" id="my-modal-3" class="modal-toggle" />
<div class="modal">
    <div class="modal-box relative">
        <label for="my-modal-3" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
        <h3 class="text-lg font-bold" id="h_judul_pengguna"></h3>
        <div class="overflow-x-auto">
            <table class="table w-full">
                <tr>
                    <td class="w-8">Judul</td>
                    <td>:</td>
                    <td id="m_judul_pengguna"></td>
                </tr>
                <tr>
                    <td class="w-8">Tahun Terbit</td>
                    <td>:</td>
                    <td id="m_tahun_pengguna"></td>
                </tr>
                <tr>
                    <td class="w-8">Kategori</td>
                    <td>:</td>
                    <td id="m_kategori_pengguna"></td>
                </tr>
                <tr>
                    <td class="w-8">Penerbit</td>
                    <td>:</td>
                    <td id="m_penerbit_pengguna"></td>
                </tr>
                <tr>
                    <td class="w-8">Penulis</td>
                    <td>:</td>
                    <td id="m_penulis_pengguna"></td>
                </tr>
                <tr>
                    <td class="w-8">ISBN</td>
                    <td>:</td>
                    <td id="m_isbn_pengguna"></td>
                </tr>
            </table>
        </div>
    </div>
</div>