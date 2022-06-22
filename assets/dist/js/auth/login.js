$("#btnLogin").on("keydown", function (e) {
	if (e.shiftKey && e.keyCode == 9) {
		return true;
	} else if (e.keyCode == 9) {
		return false;
	}
});

$("#frmLogin").on("submit", function (e) {
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
