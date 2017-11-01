$(document).ready(function()
{
	if (!Modernizr.inputtypes.date) {
		$( ".birthdate" ).datepicker();
	}
});