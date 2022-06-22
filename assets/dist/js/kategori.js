/* Kategori */
localStorage.setItem("edit", null);
var tbl_kategori = $("#tbl_kategori").DataTable({
	ajax: {
		url: "kategori/list",
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
			data: "kategori",
		},
		{
			data: "keterangan",
		},
		{
			data: null,
			render: function (data, type, row) {
				return (
					'<div class="flex flex-row space-x-2">' +
					'<button class="btn btn-xs bg-orange-500 border-none" data-obj=\'' +
					JSON.stringify(data) +
					'\' onclick="updateKategori(this)" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">' +
					'<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />' +
					'<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />' +
					"</svg></button>" +
					'<button class="btn btn-xs bg-red-500 border-none" onclick="hapusKategori(this,' +
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

// POST Kategori
$("#frmKategori").submit(function (e) {
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
				tbl_kategori.ajax.reload();
				form.trigger("reset");

				let btnSubmit = $("#btnSubmitKat");
				btnSubmit.removeClass("bg-orange-500");
				btnSubmit.addClass("bg-sky-500");
				btnSubmit.text("Tambah Kategori");
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

// $("#btnSubmitKat").on("click", fun)
$("#btnResetKat").on("click", function (e) {
	e.preventDefault();
	let flagEdit = localStorage.getItem("edit");

	let btnSubmit = $("#btnSubmitKat");

	if (flagEdit !== 1) {
		btnSubmit.removeClass("bg-orange-500");
		btnSubmit.removeClass("hover:bg-orange-700");

		btnSubmit.addClass("bg-sky-500");
		btnSubmit.addClass("hover:bg-sky-700");
		btnSubmit.text("Tambah Kategori");
	} else {
		btnSubmit.removeClass("bg-sky-500");
		btnSubmit.removeClass("hover:bg-sky-700");

		btnSubmit.addClass("bg-orange-500");
		btnSubmit.addClass("bg-orange-700");
		btnSubmit.text("Ubah Kategori");
	}

	$("#frmKategori").trigger("reset");
});

function updateKategori(e) {
	let button = e.getAttribute("data-obj");
	let buttonData = JSON.parse(button);

	let id = buttonData.id;
	let kategori = buttonData.kategori;
	let keterangan = buttonData.keterangan;

	$("input[type='hidden']").remove();
	let form = $("#frmKategori");

	let input = "<input type='hidden' value='" + id + "' name='katid'>";
	form.append(input);

	$("#nama_kategori").val(kategori);
	$("#keterangan").val(keterangan);

	localStorage.setItem("edit", 1);

	// toggleButtonTambah();
	let btnSubmit = $("#btnSubmitKat");
	btnSubmit.removeClass("bg-sky-500");
	btnSubmit.removeClass("hover:bg-sky-700");

	btnSubmit.addClass("bg-orange-500");
	btnSubmit.addClass("bg-orange-700");
	btnSubmit.text("Ubah Kategori");
}

function toggleButtonTambah() {
	let btnSubmit = $("#btnSubmitKat");
	if (btnSubmit.hasClass("bg-sky-500")) {
		btnSubmit.removeClass("bg-sky-500");
		btnSubmit.addClass("bg-orange-500");
		btnSubmit.text("Ubah Kategori");
	} else {
		btnSubmit.removeClass("bg-orange-500");
		btnSubmit.addClass("bg-sky-500");
		btnSubmit.text("Tambah Kategori");
	}
}

function hapusKategori(e, id) {
	let x = confirm("Yakin menghapus kategori ini ?");

	if (x) {
		e.disabled = true;

		$.ajax({
			url: "kategori/delete",
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
					});
					tbl_kategori.ajax.reload();
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

$("#nama_kategori").on("keyup", function (e) {
	let char = $(this).val();
	let allow_kategori = false;

	if (char != "" || char != undefined) {
		$("#valid_kategori").removeClass("block");

		if (isLetter(char)) {
			allow_kategori = true;
		}

		if (isNumeric(char)) {
			allow_kategori = false;
		}

		if (isSpecialChar(char) && isEmptyOrSpaces(char)) {
			allow_kategori = false;
		}
	}

	if (allow_kategori) {
		$("#valid_kategori").removeClass("block");
		$("#valid_kategori").addClass("hidden");
	} else {
		$("#valid_kategori").removeClass("hidden");
		$("#valid_kategori").addClass("block");
	}
});
