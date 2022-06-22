<!-- Form Tambah Buku Baru -->
<h1 class="block text-center m-4 text-3xl text-slate-500 ">Form Tambah Buku Baru</h1>
<div class="mx-4 card rounded-lg shadow-lg mb-4 border border-slate-200">
    <form action="<?= base_url('buku/add'); ?>" id="frmBuku">
        <div class="max-w-xl md:max-w-4xl">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 items-start text-slate-500">
                <div class="grid grid-cols-1">
                    <div class="form-control m-4">
                        <label class="label" for="judul">
                            <span class="label-text">Judul Buku<span class="font-bold text-red-500">*</span> </span>
                        </label>
                        <input type="text" name="judul" id="judul" placeholder="Masukkan Judul Buku" class="input input-sm input-bordered w-full focus:outline-none focus:border-sky-400" required />
                        <span class="font-thin text-xs pl-1 pt-1 text-red-400 hidden" id="valid_title">Judul buku tidak boleh kosong</span>
                    </div>
                    <div class="form-control m-4">
                        <label class="label" for="penulis">
                            <span class="label-text">Penulis<span class="font-bold text-red-500">*</span></span>
                        </label>
                        <input type="text" name="penulis" id="penulis" placeholder="Masukkan Penulis" class="input input-sm input-bordered w-full focus:outline-none focus:border-sky-400" />
                        <span class="font-thin text-xs pl-1 pt-1 text-red-400 hidden" id="valid_penulis">Penulis buku tidak boleh angka</span>
                    </div>
                    <div class="form-control m-4">
                        <label class="label" for="isbn">
                            <span class="label-text">ISBN<span class="font-bold text-red-500">*</span></span>
                        </label>
                        <input type="text" name="isbn" id="isbn" placeholder="Masukkan Tahun Terbit" class="input input-sm input-bordered w-full focus:outline-none focus:border-sky-400" />
                        <span class="font-thin text-xs pl-1 pt-1 text-red-400 hidden" id="valid_isbn"></span>
                    </div>
                </div>
                <div class="grid grid-cols-1">
                    <div class="form-control m-4">
                        <label class="label" for="tahun">
                            <span class="label-text">Tahun Terbit<span class="font-bold text-red-500">*</span></span>
                        </label>
                        <input type="text" name="tahun" id="tahun" placeholder="Masukkan Tahun Terbit" class="input input-sm input-bordered w-full focus:outline-none focus:border-sky-400" required />
                        <span class="font-thin text-xs pl-1 pt-1 text-red-400 hidden" id="valid_tahun"></span>
                    </div>
                    <div class="form-control m-4">
                        <label for="penerbit" class="label">
                            <span class="label-text">Penerbit<span class="font-bold text-red-500">*</span></span>
                        </label>
                        <select class="select select2 select-sm select-bordered w-full" name="penerbit" id="penerbit" data-allow-clear="true" data-placeholder="-- Pilih Penerbit --" required>
                            <option value=""></option>
                            <?php foreach ($penerbit as $val) : ?>
                                <option value="<?= $val->id; ?>"><?= $val->name; ?></option>
                            <?php endforeach ?>

                        </select>
                    </div>
                    <div class="form-control m-4">
                        <label for="kategori" class="label">
                            <span class="label-text">Kategori<span class="font-bold text-red-500">*</span></span>
                        </label>
                        <select class="select select2 select-sm select-bordered w-full" name="kategori" id="kategori" data-allow-clear="true" data-placeholder="-- Pilih Kategori --" required>
                            <option value=""></option>
                            <?php foreach ($kategori as $val) : ?>
                                <option value="<?= $val->id; ?>"><?= $val->name; ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="p-4 mb-4">
            <button type="submit" id="btnSubmitB" class="btn btn-sm bg-sky-500 border-none hover:bg-sky-700 tracking-widest">Tambah Buku</button>
            <button type="reset" id="btnResetB" class="btn btn-sm bg-red-500 border-none hover:bg-red-700 tracking-widest">Reset</button>
        </div>
    </form>
</div>

<!-- List Buku -->

<div class="mx-4 card rounded-lg shadow-lg bg-white mb-4 border border-slate-200">
    <div class="card-body">
        <p class="text-xl text-slate-500">Daftar Buku</p>
        <table class="table" id="tbl_buku">
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
        <h3 class="text-lg font-bold" id="h_judul"></h3>
        <div class="overflow-x-auto">
            <table class="table w-full">
                <tr>
                    <td class="w-8">Judul</td>
                    <td>:</td>
                    <td id="m_judul"></td>
                </tr>
                <tr>
                    <td class="w-8">Tahun Terbit</td>
                    <td>:</td>
                    <td id="m_tahun"></td>
                </tr>
                <tr>
                    <td class="w-8">Kategori</td>
                    <td>:</td>
                    <td id="m_kategori"></td>
                </tr>
                <tr>
                    <td class="w-8">Penerbit</td>
                    <td>:</td>
                    <td id="m_penerbit"></td>
                </tr>
                <tr>
                    <td class="w-8">Penulis</td>
                    <td>:</td>
                    <td id="m_penulis"></td>
                </tr>
                <tr>
                    <td class="w-8">ISBN</td>
                    <td>:</td>
                    <td id="m_isbn"></td>
                </tr>
            </table>
        </div>
    </div>
</div>