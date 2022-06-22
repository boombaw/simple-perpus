/* Kategori */
localStorage.setItem("edit_b", null);
var tbl_buku = $("#tbl_buku").DataTable({
	ajax: {
		url: "buku/list",
		type: "GET",
		dataType: "json",
		dataSrc: function (json) {
			return json;
		},
	},
	columns: [
		{
			data: "no",
		},
		{
			data: "judul_buku",
		},
		{
			data: "tahun_terbit",
		},
		{
			data: "kategori_name",
		},
		{
			data: null,
			render: function (data, type, row) {
				return (
					'<div class="flex flex-row space-x-2">' +
					'<label for="my-modal-3" class="btn btn-xs bg-sky-500 border-none" data-modal=\'' +
					JSON.stringify(data) +
					'\' onclick="detailBuku(this)"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">' +
					'<path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />' +
					'<path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />' +
					"</svg></label>" +
					'<button class="btn btn-xs bg-orange-500 border-none" data-obj=\'' +
					JSON.stringify(data) +
					'\' onclick="updateBuku(this)" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">' +
					'<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />' +
					'<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />' +
					"</svg></button>" +
					'<button class="btn btn-xs bg-red-500 border-none" onclick="hapusBuku(this,' +
					data.id +
					')"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">' +
					'<path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />' +
					"</svg></button>" +
					"</div>"
				);
			},
		},
	],
	responsive: true,
});

// POST Buku
$("#frmBuku").submit(function (e) {
	e.preventDefault();

	let form = $(this),
		url = form.attr("action"),
		formData = form.serialize();

	$.ajax({
		url: url,
		method: "POST",
		dataType: "json",
		data: formData,
		success: function (data) {
			let r = data;

			if (r.code != 200) {
				$.toast({
					heading: "Error",
					text: r.message,
					position: "top-center",
					icon: "error",
				});
			} else {
				$.toast({
					heading: "Success",
					text: r.message,
					position: "top-center",
					icon: "success",
				});
				tbl_buku.ajax.reload();
				$("#penerbit").val(null).trigger("change");
				$("#kategori").val(null).trigger("change");
				form.trigger("reset");

				let btnSubmit = $("#btnSubmitB");
				btnSubmit.removeClass("bg-orange-500");
				btnSubmit.addClass("bg-sky-500");
				btnSubmit.text("Tambah Buku");
			}
		},
		error: function () {
			$.toast({
				heading: "Error",
				text: "Terjadi kesalahan",
				position: "top-center",
				icon: "error",
			});
		},
	});
});

$("#btnResetB").on("click", function (e) {
	e.preventDefault();
	let flagEdit = localStorage.getItem("edit");

	let btnSubmit = $("#btnSubmitB");

	if (flagEdit !== 1) {
		btnSubmit.removeClass("bg-orange-500");
		btnSubmit.removeClass("hover:bg-orange-700");

		btnSubmit.addClass("bg-sky-500");
		btnSubmit.addClass("hover:bg-sky-700");
		btnSubmit.text("Tambah Buku");
	} else {
		btnSubmit.removeClass("bg-sky-500");
		btnSubmit.removeClass("hover:bg-sky-700");

		btnSubmit.addClass("bg-orange-500");
		btnSubmit.addClass("bg-orange-700");
		btnSubmit.text("Ubah Buku");
	}

	$("#frmBuku").trigger("reset");
});

function detailBuku(e) {
	let detail = e.getAttribute("data-modal");
	let detailData = JSON.parse(detail);

	$("#h_judul").text(detailData.judul_buku + " | " + detailData.penulis);
	$("#m_judul").text(detailData.judul_buku);

	$("#m_tahun").text(detailData.tahun_terbit);
	$("#m_kategori").text(detailData.kategori_name);
	$("#m_penerbit").text(detailData.penerbit_name);
	$("#m_penulis").text(detailData.penulis);
	$("#m_isbn").text(detailData.isbn);
}

function updateBuku(e) {
	let button = e.getAttribute("data-obj");
	let buttonData = JSON.parse(button);

	let id = buttonData.id;
	let judul = buttonData.judul_buku;
	let penulis = buttonData.penulis;
	let penerbit = buttonData.penerbit;
	let isbn = buttonData.isbn;
	let tahun = buttonData.tahun_terbit;
	let kategori = buttonData.kategori;

	$("input[type='hidden']").remove();
	let form = $("#frmBuku");

	let input = "<input type='hidden' value='" + id + "' name='bid'>";
	form.append(input);

	$("#judul").val(judul);
	$("#penulis").val(penulis);
	$("#isbn").val(isbn);
	$("#tahun").val(tahun);

	$("#penerbit").val(penerbit);
	$("#penerbit").trigger("change");

	$("#kategori").val(kategori);
	$("#kategori").trigger("change");

	localStorage.setItem("edit_b", 1);

	// toggleButtonTambahB();
	let btnSubmit = $("#btnSubmitB");
	btnSubmit.removeClass("bg-sky-500");
	btnSubmit.removeClass("hover:bg-sky-700");

	btnSubmit.addClass("bg-orange-500");
	btnSubmit.addClass("bg-orange-700");
	btnSubmit.text("Ubah Buku");
}

function toggleButtonTambahB() {
	let btnSubmit = $("#btnSubmitB");
	if (btnSubmit.hasClass("bg-sky-500")) {
		btnSubmit.removeClass("bg-sky-500");
		btnSubmit.addClass("bg-orange-500");
		btnSubmit.text("Ubah Buku");
	} else {
		btnSubmit.removeClass("bg-orange-500");
		btnSubmit.addClass("bg-sky-500");
		btnSubmit.text("Tambah Buku");
	}
}

function hapusBuku(e, id) {
	let x = confirm("Yakin menghapus Buku ini ?");

	if (x) {
		e.disabled = true;

		$.ajax({
			url: "buku/delete",
			method: "POST",
			dataType: "json",
			data: { id: id },
			success: function (data) {
				let r = data;

				if (r.code != 200) {
					$.toast({
						heading: "Error",
						text: r.message,
						position: "top-center",
						icon: "error",
					});
				} else {
					$.toast({
						heading: "Success",
						text: r.message,
						position: "top-center",
						icon: "success",
						loader: false,
					});
					tbl_buku.ajax.reload();
				}
			},
			error: function () {
				$.toast({
					heading: "Error",
					text: "Terjadi kesalahan",
					position: "top-center",
					icon: "error",
				});
			},
		});
	}
}

$("#judul").on("keyup", function (e) {
	let char = $(this).val();
	let allow_buku = false;

	if (char != "" || char != undefined) {
		$("#valid_title").removeClass("block");
		allow_buku = true;
	}

	if (isEmptyOrSpaces(char)) allow_buku = false;

	if (allow_buku) {
		$("#valid_title").removeClass("block");
		$("#valid_title").addClass("hidden");
	} else {
		$("#valid_title").removeClass("hidden");
		$("#valid_title").addClass("block");
	}
});

$("#penulis").on("keyup", function (e) {
	let char = $(this).val();
	let allow_penulis = false;

	if (char != "" || char != undefined) {
		$("#valid_penulis").removeClass("block");
		allow_penulis = true;
	}

	if (isNumeric(char)) {
		allow_penulis = false;
	}

	if (isEmptyOrSpaces(char)) allow_penulis = false;

	if (allow_penulis) {
		$("#valid_penulis").removeClass("block");
		$("#valid_penulis").addClass("hidden");
	} else {
		$("#valid_penulis").removeClass("hidden");
		$("#valid_penulis").addClass("block");
	}
});

$("#isbn").on("keyup", function (e) {
	let char = $(this).val();
	let allow_isbn = false;

	if (char != "" || char != undefined) {
		$("#valid_penulis").removeClass("block");
		allow_isbn = true;
	}

	if (char.length > 13) {
		allow_isbn = false;
		$("#valid_isbn").text("ISBN tidak boleh lebih dari 13 karakter");
	}

	if (char.length < 10) {
		allow_isbn = false;
		$("#valid_isbn").text("ISBN tidak boleh kurang dari 10 karakter");
	}

	if (isEmptyOrSpaces(char)) {
		allow_isbn = false;
		$("#valid_isbn").text("ISBN tidak boleh kosong");
	}

	if (allow_isbn) {
		$("#valid_isbn").removeClass("block");
		$("#valid_isbn").addClass("hidden");
	} else {
		$("#valid_isbn").removeClass("hidden");
		$("#valid_isbn").addClass("block");
	}
});

$("#tahun").on("keyup", function (e) {
	let char = $(this).val();
	let allow_tahun = false;

	if (char != "" || char != undefined) {
		$("#valid_tahun").removeClass("block");
		allow_tahun = true;
	}

	if (isLetter(char)) {
		allow_tahun = false;
		$("#valid_tahun").text("Tahun terbit harus berupa angka");
	}

	if (isEmptyOrSpaces(char)) {
		allow_tahun = false;
		$("#valid_tahun").text("Tahun terbit tidak boleh kosong");
	}

	if (isSpecialChar(char) && isEmptyOrSpaces(char)) {
		allow_tahun = false;
		$("#valid_tahun").text("Tahun terbit harus berupa angka");
	}

	if (allow_tahun) {
		$("#valid_tahun").removeClass("block");
		$("#valid_tahun").addClass("hidden");
	} else {
		$("#valid_tahun").removeClass("hidden");
		$("#valid_tahun").addClass("block");
	}
});

// pengguna
var tbl_buku_pengguna = $("#tbl_buku_pengguna").DataTable({
	ajax: {
		url: "buku/list",
		type: "GET",
		dataType: "json",
		dataSrc: function (json) {
			return json;
		},
	},
	columns: [
		{
			data: "no",
		},
		{
			data: "judul_buku",
		},
		{
			data: "tahun_terbit",
		},
		{
			data: "kategori_name",
		},
		{
			data: null,
			render: function (data, type, row) {
				return (
					'<div class="flex flex-row space-x-2">' +
					'<label for="my-modal-3" class="btn btn-xs bg-sky-500 border-none" data-modal=\'' +
					JSON.stringify(data) +
					'\' onclick="detailBukuPengguna(this)"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">' +
					'<path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />' +
					'<path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />' +
					"</svg></label>" +
					"</div>"
				);
			},
		},
	],
	responsive: true,
});

function detailBukuPengguna(e) {
	let detail = e.getAttribute("data-modal");
	let detailData = JSON.parse(detail);

	$("#h_judul_pengguna").text(
		detailData.judul_buku + " | " + detailData.penulis
	);
	$("#m_judul_pengguna").text(detailData.judul_buku);

	$("#m_tahun_pengguna").text(detailData.tahun_terbit);
	$("#m_kategori_pengguna").text(detailData.kategori_name);
	$("#m_penerbit_pengguna").text(detailData.penerbit_name);
	$("#m_penulis_pengguna").text(detailData.penulis);
	$("#m_isbn_pengguna").text(detailData.isbn);
}
