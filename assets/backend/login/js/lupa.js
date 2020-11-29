function checkemail()
{
 var emailnya=document.getElementById( "UserEmail" ).value;
 if(emailnya) {
  $.ajax({
  type: 'post',
  url: 'login/lupa',
  data: {
   user_email:emailnya,
  },
  success: function (response) {
   $( '#email_status' ).html(response);
   if(response=="Email terdaftar")
   {
      return true;
   }
   else
   {
    return false;
   }
  }
  });
 }
 else
 {
  $( '#email_status' ).html("");
  return false;
 }
}


function checkall()
{
 var emailhtml=document.getElementById("email_status").innerHTML;
 if(emailhtml=="Email terdaftar")
 {
  return true;
 }
 else
 {
  return false;
 }
}
