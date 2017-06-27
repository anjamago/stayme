/**
 * Created by anjamago on 12/02/2017.
 */
var ValidateRegister = function(){
  return {
      color:'input-green',
      register:function () {
          $("form");
      },
      password:function () {
            var form= $('form').serializeArray();
            var passw=form[3].value;
            var passw2=form[4].value;
          
            if(passw != passw2){
                $('#passw2').addClass('input-red');
            }else if(passw === passw2){
                $('#passw2').removeClass('input-red');
                $('#passw2').addClass('input-green');
                $('#buttonSubmit').removeAttr('disabled');

            }
      }
  }
};

$(document).ready(function(){
    var validRegister = ValidateRegister();
   $('#passw2').on('keyup',function () {
       validRegister.password();
   });
});