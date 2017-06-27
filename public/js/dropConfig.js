    /**
 * Created by andy on 04/06/2017.
 */
    var id_lease;
    $(document).ready(function () {
        //toca agregar todo los datos del formulario  para que puedan ser enviados
        Dropzone.options.myAwesomeDropzone = false;
        Dropzone.autoDiscover = false;
        //inicializamos dropzone
        $("#dropzone").dropzone({
            url: "/propietary/upload",
            addRemoveLinks:true,
            maxFileSize: 10000000,
            autoProcessQueue : false,
            acceptedFiles: ".jpg,.jpeg,.JPG,.JPEG,.png,.PNG",
            maxFiles:4,
            dictRemoveFile:"Remover",
            dictDefaultMessage:"Adicione las images de su alojamiento",
            uploadMultiple:true,
            init:function () {
                //instanciamos el elemento
                var myDropzone = this;
                var img = new Array();
                var count=0;
                var bntmodal = document.querySelector(".subirImg");

                myDropzone.on("removedfile",function(file){
                });
                myDropzone.on("addedfile", function(file) {
                       if(count < 5) {
                           count = count+1;
                           var progress = document.querySelector('.dz-preview .dz-progress');
                           progress.removeAttribute('class');
                       }else{
                           myDropzone.removeFile(file);
                       }

                });
                myDropzone.on('successmultiple', function(file, response) {
                    myDropzone.removeAllFiles();
                    window.location.replace("/propietary");
                });

                bntmodal.addEventListener("click",function () {
                   myDropzone.processQueue();

                });

            }
        });
        var finalizar = document.querySelector("input[name=save]");
        finalizar.addEventListener("click",function (e) {
            e.preventDefault();

            var from = undefined;
            var btn = document.querySelector('button');
            var hab=[];
            var sev=[];
            var act=[];
            var ids_hab=document.querySelectorAll('input#HAB');
            var ids_sev=document.querySelectorAll('input#SEV');
            var ids_act=document.querySelectorAll('input#ACT');

            //habitacion
            for(var i =0;i <= ids_hab.length -1 ;i++){
                var e = ids_hab[i];

                if(e.getAttribute("checked")!= null || e.getAttribute("checked") != undefined ){
                    hab.push($(ids_hab[i]).val());
                }
            }
            //servicio
            for(var i=0; i<= ids_sev.length-1;i++){
                var e =ids_sev[i];
                if(e.getAttribute("checked")!= null  ){
                    sev.push($(ids_sev[i]).val());
                }
            }
            //actividades
            for(var i =0;i<= ids_act.length -1 ; i++){
                var e =ids_act[i];
                if(e.getAttribute("checked")!= null ){
                    act.push($(ids_act[i]).val());
                }
            }



            from = new FormData();
            //from.append("imagen",JSON.stringify(img));
            from.append("_token",tkn);
            from.append("lease",$("select[name=lease]").val());
            from.append("departmen",$("select[name=departmen]").val());
            from.append("city",$("select[name=city]").val());
            from.append("outskirt",$("select[name=outskirt]").val());
            from.append("address",$("input[name=address]").val());
            from.append("price",$("input[name=price]").val());
            from.append("hab",JSON.stringify(hab));
            from.append("lease_tiame",$("select[name=lease_tiame]").val());
            from.append("sev",JSON.stringify(sev));
            from.append("act",JSON.stringify(act));
            from.append("gender",$("select[name=gender]").val());
            from.append("occupation",$("select[name=occupation]").val());
            from.append("descripcion",$("textarea[name=descripcion]").val());
            from.append("reglas",$("reglas[name=reglas]").val());
            from.append("quantity",$("input[name=quantity]").val());

            var request = new XMLHttpRequest();
            request.open("POST","/propietary/register");

            request.onload=function (event) {
                if(request.status==200){
                    var elem = event.target.response;
                    var host = window.location.hostname;
                    id_lease=elem;
                    if(id_lease != undefined){
                        btn.click();
                    }

                }else{
                    console.log("err",event);
                }
            };
            request.send(from);



        });

    });


