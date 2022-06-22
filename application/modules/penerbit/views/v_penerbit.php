<!-- Form Tambah Buku Baru -->
<h1 class="block text-center m-4 text-3xl text-slate-500 ">Form Tambah Penerbit</h1>
<div class="mx-4 card rounded-lg shadow-lg mb-4 border border-slate-200">
    <form action="<?= base_url('penerbit/add') ?>" class="" id="frmPenerbit">
        <div class="max-w-xl md:max-w-4xl">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 items-start text-slate-500">
                <div class="grid grid-cols-1">
                    <div class="form-control m-4">
                        <label class="label" for="nama_penerbit">
                            <span class="label-text">Nama Penerbit<span class="font-bold text-red-500">*</span></span>
                        </label>
                        <input type="text" name="nama_penerbit" id="nama_penerbit" placeholder="Masukkan Nama Penerbit" class="input input-sm input-bordered w-full focus:outline-none focus:border-sky-400" required />
                        <span class="font-thin text-xs pl-1 pt-1 text-red-400 hidden" id="valid_penerbit">Nama penerbit hanya bisa berupa huruf dan angka</span>
                    </div>
                    <div class="form-control m-4">
                        <label class="label" for="alamat_penerbit">
                            <span class="label-text">Alamat Penerbit<span class="font-bold text-red-500">*</span></span>
                        </label>
                        <textarea name="alamat_penerbit" id="alamat_penerbit" class="textarea w-full focus:outline-none input-bordered focus:border-sky-400 n" placeholder="Alamat Penerbit" required></textarea>
                    </div>
                    <div class="form-control m-4">
                        <label class="label" for="tlp_penerbit">
                            <span class="label-text">No Telp Penerbit<span class="font-bold text-red-500">*</span></span>
                        </label>
                        <input type="text" name="tlp_penerbit" id="tlp_penerbit" placeholder="Masukkan No Telp Penerbit" class="input input-sm input-bordered w-full focus:outline-none focus:border-sky-400" required />
                        <span class="font-thin text-xs pl-1 pt-1 text-red-400 hidden" id="valid_tlp">No. Telp hanya bisa berupa angka</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="p-4 mb-4">
            <button type="submit" id="btnSubmitPbt" class="btn btn-sm bg-sky-500 border-none hover:bg-sky-700 tracking-widest">Tambah Penerbit</button>
            <button type="reset" id="btnResetPbt" class="btn btn-sm bg-red-500 border-none hover:bg-red-700 tracking-widest">Reset</button>
        </div>
    </form>
</div>

<!-- List Buku -->

<div class="mx-4 card rounded-lg shadow-lg bg-white mb-4 border border-slate-200">
    <div class="card-body">
        <p class="text-xl text-slate-500">Daftar Penerbit</p>
        <table class="table display" id="tbl_penerbit">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Penerbit</th>
                    <th>Alamat Penerbit</th>
                    <th>Tlp Penerbit</th>
                    <th>Aksi</th>
                </tr>
            </thead>
        </table>
    </div>
</div>