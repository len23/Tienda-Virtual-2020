/* Para agregar producto a array de carrito */
let url = 'http://localhost/Tienda-Virtual-2020/config/add_to_car.php/';
 
function addProduct(id_prod,user_id) { 
  let quantity= document.getElementById(`quantity-${id_prod}`);
  let go_cart_btn = document.getElementById(`go-to-cart-${id_prod}`);

  let btn_addCarrito = document.querySelector(`#add_carrito-${id_prod}`);
  btn_addCarrito.innerText = "Ir al carrito";
  btn_addCarrito.classList.remove('btn-info');
  btn_addCarrito.classList.add('d-none');
  btn_addCarrito.classList.add('disabled');

  go_cart_btn.classList.remove('d-none');

 

  let typ = document.createAttribute("readonly");
  quantity.attributes.setNamedItem(typ);

 /*  let data = {prod_id:id_prod,quantity:quantity.value,user_id:user_id}; */
  url = url + `?user_id=${user_id}&prod_id=${id_prod}&quantity=${quantity.value}`;
 
  fetch(url, {
    method: 'POST', // or 'PUT'
  }).then(
    res => console.log(res)
    )
}

/* FACTURACION */
let submit_factura_btn = document.getElementById('submit_factura');
let nombres_form = document.getElementById('nombres_form');
let apellidos_form = document.getElementById('apellidos_form');
let cedula_form = document.getElementById('cedula_form');
let direccion_form = document.getElementById('direccion_form');
let telefono_form = document.getElementById('telefono_form');
let user_id = document.getElementById('user_id');

let url_form = 'http://' + window.location.hostname + '/Tienda-Virtual-2020/controllers/factura.php';

submit_factura_btn.addEventListener('click',function (e){
  e.preventDefault();
  if(nombres_form.value!='' && apellidos_form.value!='' && cedula_form.value!='' 
  && direccion_form.value!='' && telefono_form.value!='') {
    if(validarCedula(cedula_form.value) && validarTelefono(telefono_form.value)) {
      url_form += `?user_id=${user_id.value}&nombres=${nombres_form.value}&apellidos=${apellidos_form.value}&cedula=${cedula_form.value}&direccion=${direccion_form.value}&telefono=${telefono_form.value}`;
      console.log(url_form);
      fetch(url_form, {
        method: 'POST', // or 'PUT'
      }).then(
        res => console.log(res)
      );
      location.reload();
      submit_factura_btn.setAttribute('data-dismiss','modal');
      
    }
   
  }else {
    document.getElementById("general_warning").innerHTML="Aségurese de haber llenado todos los campos";
  }
 
});


function validarCedula(cedula) {
  document.getElementById('warning_cedula').innerHTML='';
    if(cedula.length === 10)
	{
        var provin = cedula.substring(0,2);
        if( provin >= 1 && provin <=24 )
		{
          var verificadig   = cedula.substring(9,10);
          var par = Number(cedula.substring(1,2)) + Number(cedula.substring(3,4)) + Number(cedula.substring(5,6)) + Number(cedula.substring(7,8));
          var n1 = cedula.substring(0,1);
          var n1 = (n1 * 2);
          
          if( n1 > 9 )
		  { 
			  var n1 = (n1 - 9);
		  }
          var n3 = cedula.substring(2,3);
          var n3 = (n3 * 2);
          if( n3 > 9 )
		  { 
			  var n3 = (n3 - 9);
		  }
          var n5 = cedula.substring(4,5);
          var n5 = (n5 * 2);
          if( n5 > 9 )
		  { 
			  var n5 = (n5 - 9);
		  }
          var n7 = cedula.substring(6,7);
          var n7 = (n7 * 2);
          if( n7 > 9 )
		  { 
			  var n7 = (n7 - 9); 
		  }
          var n9 = cedula.substring(8,9);
          var n9 = (n9 * 2);
          if( n9 > 9 )
		  { 
			  var n9 = (n9 - 9);
		  }
          var impar = n1 + n3 + n5 + n7 + n9;
          var sum = (par + impar);
          var sumapri = String(sum).substring(0,1);
          var decena = (Number(sumapri) + 1)  * 10;
          var validig = decena - sum;
          if(validig == 10)
            var validig = 0;
          if(validig == verificadig){
            //alert('La cedula ' + cedula + ' es correcta');
			  return true;
			  
          }else{
           alert('La cedula ' + cedula + ' es incorrecta');		
           document.getElementById('warning_cedula').innerHTML=`La cedula ${cedula} es incorrecta`;
		      return false;
			 
          }
        }else{ 
         document.getElementById('warning_cedula').innerHTML=`La cedula ${cedula} no pertenece a ninguna provincia`;   	
		 return false;
        }
     }else{
        alert('La cedula ingresada no tiene 10 digitos');	
        document.getElementById('warning_cedula').innerHTML=`La cedula ingresada no tiene 10 digitos`;  	
		 return false;
     }  
}

function validarTelefono(inputtxt) { 
 
  var regTel = /^\d{10}$/; 

  document.getElementById('warning_telephone').innerHTML = '';
  if(!regTel.test(inputtxt)) {
    document.getElementById('warning_telephone').innerHTML = `El número de teléfono es inválido`;
    return false;
  } 
    return true;


}