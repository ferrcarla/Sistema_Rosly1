jQuery.validator.setDefaults({
  	debug:true,
  	errorElement: "em",
	errorPlacement: function(error, element) {
		error.addClass("invalid-feedback");
		if (element.prop("type") === "checkbox") {
			error.insertAfter(element.parent("label"));
		} else {
			error.insertAfter(element);
		}
	},
	highlight: function(element) {
		$(element)
			.closest(".form-group").addClass("is-invalid");
	},
	unhighlight: function(element) {
		$(element)
			.closest(".form-group").removeClass("is-invalid");
	},
	success: function(label) {
		label
			.closest(".form-group").removeClass("is-valid");
	},
});