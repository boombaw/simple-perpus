<!-- Form Tambah Buku Baru -->
<h1 class="block text-center m-4 text-3xl text-slate-500 ">Form Tambah Kategori</h1>
<div class="mx-4 card rounded-lg shadow-lg mb-4 border border-slate-200">
    <form action="<?= base_url('kategori/add'); ?>" class="" id="frmKategori">
        <div class="max-w-xl md:max-w-4xl">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 items-start text-slate-500">
                <div class="grid grid-cols-1">
                    <div class="form-control m-4">
                        <label class="label" for="nama_kategori">
                            <span class="label-text">Nama Kategori<span class="font-bold text-red-500">*</span> </span>
                        </label>
                        <input type="text" name="nama_kategori" id="nama_kategori" placeholder="Masukkan Nama Kategori" class="input input-sm input-bordered w-full focus:outline-none focus:border-sky-400" required />
                        <span class="font-thin text-xs pl-1 pt-1 text-red-400 hidden" id="valid_kategori">Nama kategori hanya bisa berupa huruf</span>
                    </div>
                    <div class="form-control m-4">
                        <label class="label" for="keterangan">
                            <span class="label-text">Keterangan</span>
                        </label>
                        <textarea name="keterangan" id="keterangan" class="textarea w-full focus:outline-none input-bordered focus:border-sky-400 n" placeholder="keterangan"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="p-4 mb-4">
            <button type="submit" id="btnSubmitKat" class="btn btn-sm bg-sky-500 border-none hover:bg-sky-700 tracking-widest">Tambah Kategori</button>
            <button type="reset" id="btnResetKat" class="btn btn-sm bg-red-500 border-none hover:bg-red-700 tracking-widest">Reset</button>
        </div>
    </form>
</div>

<!-- List Buku -->

<div class="mx-4 card rounded-lg shadow-lg bg-white mb-4 border border-slate-200">
    <div class="card-body">
        <p class="text-xl text-slate-500">Daftar Kategori</p>
        <span class="bg-orange-500 focus:bg-orange-700"></span>
        <table class="table display" id="tbl_kategori">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kategori</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
        </table>
    </div>
</div>