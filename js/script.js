function addToCart(id_item, name) {
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function () {
    alert('Item "' + name + '" is added to cart.');
  };
  xhttp.open("GET", "index.php?page=cart&action=add&id=" + id_item);
  xhttp.send();
}
