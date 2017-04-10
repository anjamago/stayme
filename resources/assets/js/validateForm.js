/**
 * Created by anjamago on 11/02/2017.
 */
var Validate = function(){
    return{
        slep1:{
            rules: {
                lease: { required: true},
                departmen: { required: true},
                city: { required:true},
                outskirt: { required:true},
                address: { required: true,minlength: 5,maxlength:50},
                price: { required:true, minlength: 5}
            },
            messages: {
                lease: "Selecione un tipo de arriendo.",
                departmen: "Selecione un departamento.",
                city : "Selecione una ciudad.",
                outskirt : "Selecione un barrio.",
                address : "Debe introducir una dirreción.",
                price : "Debe introducir un precio.",
            },
            submitHandler: function(){
               // accion a realizar
                $('.btn-next').trigger("click");
            }
        }
    };
};
var Core = function(){
    return {
        opt:undefined,
        valor:undefined,
        res:undefined,
        bandera:[],
        ajax : function(obj){
            return $.ajax(obj);
        },
        acion : function(value){
            var obj = {};
            switch (value){
              case 'departmen':
                  obj.url='/general/cities/';
                  obj.method = 'GET';
                  obj.dataType='json';
                break;
              case 'cities':
                  obj.url='general/citiesAll/';
                  obj.method = 'GET';
                  obj.dataType='json';
                break;
              case 'city' :
                  obj.url='/general/outskirt/';
                  obj.method = 'GET';
                  obj.dataType='json';
                break;
              case 'outskirtAll'  :
                  obj.url='general/outskirtAll/';
                  obj.method = 'GET';
                  obj.dataType='json';
                break;
          }
          return obj;
        },
        filterData : function(elem){
            var req = undefined;
            var count = 0;
            var value = elem.value;
            var attr = elem.getAttributeNode('name').value;
            this.opt = attr;
            if(attr != undefined && attr != 'outskirt')
            {
                this.res = this.acion(attr);
                this.res.url = 'departmen' == attr ? this.res.url+value:'city'== attr?this.res.url+value:'';

                req = this.ajax(this.res);

            }

            return req;
        },
        select:function(obj,e){
            var obj ={};

            if(this.opt != undefined || this.opt != '' || this.opt != 0){
                switch(this.opt){
                    case 'departmen':
                        obj.value = e.id_city;
                        obj.text = e.city;
                        break;
                    case 'city':
                        obj.value = e.id_outskirt;
                        obj.text = e.outskirt;
                        break;
                }
                return obj;
            }

        }

    };
};

var e = undefined;
$(document).ready(function(){
    core = Core();
    $('select').on('change',function(){
       var req =  core.filterData(this);
       console.log(core.opt);
        if(core.opt == 'outskirt'){
            $('#locationData').fadeIn(300);
        }else {

            req.done(function (data) {

                if (data.hasSuccess) {
                    var count = $('#' + core.opt + 'Elem option');
                    count = count.length;
                    var elemOld = $('#' + core.opt + 'Elem');
                    if(count > 0)
                        $('#' + core.opt + 'Elem option').replaceAll('<option>');

                    elemOld.append($('<option>', {value: 0, text: 'Seleccione'}));
                    data.success.forEach(function (e) {
                        elemOld.append($('<option>', core.select(core.opt, e)));
                    });
                    $('#' + core.opt + 'In').fadeIn(300);

                }

            }).fail(function (err) {
                    console.log(err);
            });
        }
    });

    $('#siguiente').on('click',function(){
        var sple = Validate();
        //$("#location").validate(sple.slep1);
        $('.btn-next').trigger("click");
    });
});

