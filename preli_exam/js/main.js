$(function(){
 //To the user registration
 $("#regsubmit").click(function(){
     var name = $("#name").val();
     var username = $("#username").val();
     var password = $("#password").val();
     var email = $("#email").val();
     var dataString='name='+name+'&username='+username+'&password='+password+'&email='+email;
     $.ajax({
       type:"POST",
       url:"getregister.php",
       data:dataString,
       success:function(data){
          $("#result").html(data);
       }
     });
     return false; 
 });
});