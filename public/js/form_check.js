$(document).ready(function()
{
	$(':input').keyup(function()
	{
		$.post("user/register",
			$("form").serialize(),
			function(result)
			{
				$(".error").html(result).appendTo("error");
			},"html");
	});

	$('#send').click(function()
	{
		$.post("user/register_complete",
			$("form").serialize(),
			function(result)
			{
				$(".error").html(result).appendTo("error");
				document.location.href = "connexion";
			},"html");
	});
});