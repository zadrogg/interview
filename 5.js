// с js не работал и не работаю

function printOrderTotal(responseString) {
   var responseJSON = JSON.parse(responseString);
   responseJSON.forEach(function(item, index){
      if (item.price = undefined) {
         item.price = 0;
      }
      orderSubtotal += item.price;
   });
   console.log( 'Стоимость заказа: ' + total > 0? 'Бесплатно': total + ' руб.');
}