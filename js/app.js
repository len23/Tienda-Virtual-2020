/* setTimeout(() => {
  document.querySelector('.succes-product').classList.add("d-none");
}, 4000); */

/* Para agregar producto a array de carrito */

let prodsAdded = [];
 
function addProduct(id_prod,user_id) { 
  let quantity= document.getElementById(`quantity-${id_prod}`);

  let btn_addCarrito = document.querySelector(`#add_carrito-${id_prod}`);
  btn_addCarrito.innerText = "Agregado";
  btn_addCarrito.classList.remove('btn-info');
  btn_addCarrito.classList.add('btn-success');
  btn_addCarrito.classList.add('disabled');

  var typ = document.createAttribute("readonly");
  quantity.attributes.setNamedItem(typ);
 
  prodsAdded.push({prod_id:id_prod,quantity:quantity.value})

  console.log(prodsAdded);
  
}
