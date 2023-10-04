// function formatRupiah(angka, prefix){
// 	var number_string = angka.replace(/[^,\d]/g, '').toString(),
// 	split   		= number_string.split(','),
// 	sisa     		= split[0].length % 3,
// 	rupiah     		= split[0].substr(0, sisa),
// 	ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

// 	// tambahkan titik jika yang di input sudah menjadi angka ribuan
// 	if(ribuan){
// 		separator = sisa ? '.' : '';
// 		rupiah += separator + ribuan.join('.');
// 	}

// 	rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
// 	return prefix == undefined ? rupiah : (rupiah ? 'Rp ' + rupiah : '');
// }

function test(){
	alert("melakukan reload");
}

async function getDelivery(id) {
	let text = document.querySelector("#harga-" + id);
	console.log(id);
	let response = await fetch("http://127.0.0.1:8000/cobaaja/" + id);

	if (response.status === 200) {
		let data = await response.json();
		if (data.data.length > 0) {
			console.log(data);
      text.textContent =  data.data[0].harga_delivery;
		}
    // console.log(data.data);
	}
}

// function showDelivery() {
//   var food = document.getElementById("card-food");
// 	var delivery = document.getElementById("card-delivery");
//   if (delivery.style.display === "none") {
//     delivery.style.display = "block";
//   } else {
//     delivery.style.display = "none";
//   }
// }

document.getElementById("SelectorPrice").onchange = showDelivery;
function showDelivery() {
	const arr = Array.from(document.querySelectorAll('[data-id]'));
	
	var value = this.value
  var food = document.getElementsByClassName("card-food");
	var delivery = document.getElementsByClassName("card-delivery");
	// console.log(value)
  if (value == "dine-in") {
		for (var i = 0, len = food.length; i < len; i++) {
			food[i].style.display = "block";
		}
		for (var i = 0, len = delivery.length; i < len; i++) {
			delivery[i].style.display = "none";
		}
    
  } else {
		for (var i = 0, len = arr.length; i < len; i++) {
			console.log(arr[i].dataset.id);
			getDelivery(arr[i].dataset.id);
		}
		for (var i = 0, len = food.length; i < len; i++) {
			food[i].style.display = "none";
		}
		for (var i = 0, len = delivery.length; i < len; i++) {
			delivery[i].style.display = "block";
		}
  }
}