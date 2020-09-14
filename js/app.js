/* Para agregar producto a array de carrito */
let url = 'http://localhost/Tienda-Virtual-2020/config/add_to_car.php/';
 
function addProduct(id_prod,user_id) { 
  let quantity= document.getElementById(`quantity-${id_prod}`);

  let btn_addCarrito = document.querySelector(`#add_carrito-${id_prod}`);
  btn_addCarrito.innerText = "Agregado";
  btn_addCarrito.classList.remove('btn-info');
  btn_addCarrito.classList.add('btn-success');
  btn_addCarrito.classList.add('disabled');

  let typ = document.createAttribute("readonly");
  quantity.attributes.setNamedItem(typ);

 /*  let data = {prod_id:id_prod,quantity:quantity.value,user_id:user_id}; */
  url = url + `?user_id=${user_id}&prod_id=${id_prod}&quantity=${quantity.value}`;
 
  fetch(url, {
    method: 'POST', // or 'PUT'
    /* body: JSON.stringify(data), */ // data can be `string` or {object}!
    /* headers:{
      'Content-Type': 'application/json'
    } */
  }).then(
    res => console.log(res)
    )
 
  
}
