$("#userregister").on("keyup", function (e) {
	let char = $(this).val();
	let allow_userregister = true;

	if (char.length < 5) {
		allow_userregister = false;
	}

	if (allow_userregister) {
		$("#valid_userregister").removeClass("block");
		$("#valid_userregister").addClass("hidden");
	} else {
		$("#valid_userregister").removeClass("hidden");
		$("#valid_userregister").addClass("block");

		$("#valid_userregister").text("panjang karater min 5");
	}
});

$("#register").on("submit", function (e) {
	e.preventDefault();

	let username = $("#userregister");
	let password = $("#passregister").val();
	let confpassword = $("#confpassregister").val();

	if (password !== confpassword) {
		$.toast({
			heading: "Error",
			text: "Password dan kombinasi password tidak sesuai",
			position: "top-center",
			icon: "error",
		});

		$("#confpassregister").val("");

		return false;
	} else {
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
	}
});
