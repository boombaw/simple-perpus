var lp, bp;
var arrTemp = new Array();

// var tbl_temp_peminjaman = $("#tbl_temp_peminjaman").DataTable({
// 	ajax: {
// 		url: "peminjaman/list-temp",
// 		type: "GET",
// 		dataType: "json",
// 		dataSrc: function (json) {
// 			return json;
// 		},
// 	},
// 	columns: [
// 		{
// 			data: "no",
// 		},
// 		{
// 			data: "judul_buku",
// 		},
// 		{
// 			data: "lama_pinjam",
// 		},
// 		{
// 			data: null,
// 			render: function (data, type, row) {
// 				return (
// 					'<div class="flex flex-row space-x-2">' +
// 					'<button class="btn btn-xs bg-red-500 border-none" onclick="hapusTemp(this,' +
// 					data.id +
// 					')"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">' +
// 					'<path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />' +
// 					"</svg></button>" +
// 					"</div>"
// 				);
// 			},
// 		},
// 	],
// 	responsive: true,
// });

$("#btnCheck").on("click", function (e) {
	e.preventDefault();

	let member = $("#id_member").val();
	$.ajax({
		url: "check",
		type: "POST",
		dataType: "json",
		data: {
			member: member,
		},
		success: function (data) {
			let header = "";
			let icon = "";
			if (data.code == 200) {
				header = "Informasi";
				icon = "info";
			} else {
				header = "Error";
				icon = "error";
			}

			$.toast({
				heading: header,
				text: data.message,
				position: "top-center",
				stack: false,
				loader: false,
				icon: icon,
			});
		},
		error: function () {
			$.toast({
				heading: "Error",
				text: "Terjadi Kesalahan",
				position: "top-center",
				stack: false,
				loader: false,
				icon: "error",
			});
		},
	});
});

$("#btnTambahPnjm").on("click", function (e) {
	e.preventDefault();
	$("#member").remove();
	let member = $("#id_member").val();
	if (member == "" || member == null || member == undefined) {
		$.toast({
			heading: "Error",
			text: "Pilih member terlebih dahulu",
			position: "top-center",
			stack: false,
			loader: false,
			icon: "error",
		});
	} else if (member !== "" || member !== null || member !== undefined) {
		let form = $("#frmPinjaman");

		let input = "<input type='hidden' value='" + member + "' name='member'>";
		form.append(input);

		let lama_pinjam = $("#lama_pinjam").select2("data")[0];
		if (
			lama_pinjam.id == "" ||
			lama_pinjam.id == null ||
			lama_pinjam.id == undefined
		) {
			$.toast({
				heading: "Error",
				text: "Pilih waktu terlebih dahulu",
				position: "top-center",
				stack: false,
				loader: false,
				icon: "error",
			});

			return false;
		}

		let input_l =
			"<input type='hidden' value='" +
			lama_pinjam.id +
			"' name='lama_pinjams[]'>";

		let buku = $("#buku").select2("data")[0];

		if (buku.id == "" || buku.id == null || buku.id == undefined) {
			$.toast({
				heading: "Error",
				text: "Pilih buku terlebih dahulu",
				position: "top-center",
				stack: false,
				loader: false,
				icon: "error",
			});

			return false;
		}

		$.ajax({
			url: "check_peminjaman",
			method: "POST",
			dataType: "json",
			data: {
				member_id: member,
				book_id: buku.id,
			},
			success: function (data) {
				let r = data;

				if (r.code != 200) {
					$.toast({
						heading: "Error",
						text: r.message,
						position: "top-center",
						icon: "error",
					});

					return false;
				} else {
					arrTemp.push(buku.id);

					let input_b =
						"<input type='hidden' value='" + buku.id + "' name='bukus[]'>";

					let row = "<tr onclick='get_idx(this)'>";
					row += "<td style='3rem;'>" + buku.text + "</td>";
					row += "<td>" + lama_pinjam.id + " Hari";
					row += input_l;
					row += input_b;
					row += "</td>";
					row +=
						'<td> <div data-id="3" class="btn btn-sm bg-red-500 border-none del-temp-pinjaman hover:bg-red-700">' +
						'<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">' +
						'<path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />' +
						"</svg>" +
						"</div></td>";
					row += "</tr>";

					$("#tbl_pinjaman tbody").append(row);

					$("#lama_pinjam").prop("disabled", true);
					$("#id_member").prop("disabled", true);
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

		// lp = $.map($('input[type=hidden][name="lama_pinjams[]"]'), function (el) {
		// 	return el.value;
		// });
		// bp = $.map($('input[type=hidden][name="bukus[]"]'), function (el) {
		// 	return el.value;
		// });
	}
});

function get_idx(x) {
	return x.rowIndex;
}

$("#tbl_pinjaman").on("click", ".del-temp-pinjaman", function (e) {
	let idx = $(this).closest("tr").index();
	$(this).closest("tr").remove();

	arrTemp.splice(idx, 1);
});

$("#frmPinjaman").on("submit", function (e) {
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
					hideAfter: 2000,
					afterHidden: function () {
						window.location.reload(true);
					},
				});
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

function detailPeminjaman(e) {
	let detail = e.getAttribute("data-peminjam");
	let data = JSON.parse(detail);

	let tgl_pinjam = data.tgl_pinjam;
	let tgl_kembali = data.tgl_kembali;
	let member = data.nama;
	let buku = data.title;

	let d1 = new Date(tgl_pinjam);
	let d2 = new Date(tgl_kembali);

	let timeDiff = Math.abs(d2.getTime() - d1.getTime());

	let diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));

	$("#pmnjm_member").text("Member : " + member);
	$("#pmnjm_lama").text("Lama Peminjaman : " + diffDays + " Hari");
	$("#pmnjm_buku").text("Buku : " + buku);

	let sls_pinjam = document.getElementById("sls_pinjam");

	if (data.is_kembali == 0) {
		sls_pinjam.href = "/peminjaman/selesai/" + data.id;
		sls_pinjam.classList.remove("hidden");
	} else {
		sls_pinjam.classList.add("hidden");
	}
	// $("#sls_pinjam").setAttribute("href", );
	console.log(JSON.parse(detail));
}
