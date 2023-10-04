let viewDetail = (id) => {
  console.log(id);
  $.ajax({
    url: 'http://127.0.0.1:8000/view-detail/' + id,
    type: "GET",
    contentType: 'application/json',
    dataType: "json",
    success: function(result) {

      let order = result.order;
      let orderDetail = result.orderDetail;
      console.log(orderDetail);
      let html = '';
      let html2 = '';

      // looping data menu
      $.each(orderDetail, function(i, data) {
        html2 += `
                        <tr>
                          <td class="cell">`+ data.nama +`</td>
                          <td class="cell">x `+ data.jumlah +`</td>
                          <td class="cell">Rp`+ data.total +`</td>
                        </tr>
        `;
      });
      $(".product-view").html(html2);

      // looping data summary
      $.each(order, function(i, data) {
        html += `
                                <tr>
                                    <td class="cell"><b>Subtotal</b></td>
                                    <td class="cell text-right">Rp`+ data.subtotal +`</td>
                                </tr>
                                <tr>
                                    <td class="cell"><b>Diskon</b></td>
                                    <td class="cell text-right">-Rp`+ data.diskon +`</td>
                                </tr>
                                <tr>
                                    <td class="cell"><b>Pajak</b></td>
                                    <td class="cell text-right">Rp`+ data.pajak +`</td>
                                </tr>
                                <tr>
                                  <td class="cell"><b>Total</b></td>
                                  <td class="cell text-right">Rp`+ data.total +`</td>
                              </tr>
        `;
      });
      $(".summary-view").html(html);
    },
    error: (error) => alert(error.message)
  });
}