// SELECTIZE
$(document).ready(function () {
  $(".js-selectize-transaksi, .js-selectize-stok, .js-selectize-barang").selectize({
    sortField: 'text',

  })
});

function selectizeme(){
  $('.combobox').selectize({
    sortField: 'text'
  });
}

// add input transaksi
$('#add').on('click',function(){
  clone()

});

// remove input transaksi
$("body").on("click", ".btn-danger", function () {
  $(this).parents(".increment").removeData("input-total:last").remove();
})

$(function(){ // same as $(document).ready()
  selectizeme(); // selectize all .combobox
});

//---------------------------------------------------------------------------------
//Get Set harga barang


// $("body").on("change",'#barang_id_0', function () {
//   $('#jumlah_0').val('0')
//   $.get('/barang/' + this.value + '/barang.json', function (barang) {
//     var $harga = $('#harga_0');
//     $harga.find('value').remove().end();
//
//     $.each(barang, function (index, item ) {
//       $('#harga_0').val(item.harga);
//       $('#stok_lama_0').val(item.stok);
//     });
//   });
// });

// $("body").on("change",'.combobox:last', function () {
//   $('.input-jumlah:last').val('0')
//   $.get('/barang/' + this.value + '/barang.json', function (barang) {
//     var $harga = $('.input-harga:last');
//     $harga.find('value').remove().end();
//
//     $.each(barang, function (index, item ) {
//       $('.input-harga:last').val(item.harga);
//       $('.input-stoklama:last').val(item.stok);
//     });
//   });
// });



$('body').on('change','select:last', function () {
 $('.input-jumlah:last').val('0')

  $.get('/barang/' + this.value + '/barang.json', function (barang) {
    var $harga = $('.input-harga:last');
    $harga.find('value').remove().end();

    $.each(barang, function (index, item ) {
      $('.input-harga:last').val(item.harga);
      $('.input-stoklama:last').val(item.stok);
    });
  });
})

$('body').on('change','.input-jumlah:last', function () {
  if ($('#jenis').val() === "Barang Masuk"){
    $jumlah = parseInt($('.input-jumlah:last').val());
    $stok_lama_transaksi = parseInt($('.input-stoklama:last').val());
    $stok_baru_transaksi = $jumlah + $stok_lama_transaksi;
    $('.input-stok:last').val($stok_baru_transaksi);
  } else{
    $jumlah = parseInt($('.input-jumlah:last').val());
    $stok_lama_transaksi = parseInt($('.input-stoklama:last').val());
    $stok_baru_transaksi =  $stok_lama_transaksi - $jumlah;
    $('.input-stok:last').val($stok_baru_transaksi);
  }
  $quantity = $('.input-jumlah:last').val();
  $harga = $('.input-harga:last').val();
  $total = $harga * $quantity;

  $('.input-total:last').val($total);
})

$('body').on('change','.input-jumlah:last', function () {
  $input = $('.input-total')
  $total = 0
  for ($i=0;$i<$input.length; $i++){
    $total += parseInt( $input[$i].value)
  }
  $('#total-transaksi').text(' : '+numeral($total).format('0,0'))
})

$i=1;
function clone () {

  $('.combobox').each(function(){ // do this for every select with the 'combobox' class
    if ($(this)[0].selectize) { // requires [0] to select the proper object
      var value = $(this).val(); // store the current value of the select/input
      $(this)[0].selectize.destroy(); // destroys selectize()
      $(this).val(value);  // set back the value of the select/input

    }
  });

  $('#transaksi .increment:first')
    .clone()// copy
    .insertAfter('#transaksi .increment:last') // where
  ;

  $('.barang:last')
    .find('#barang_id_0')
    .attr('id','barang_id_'+$i);

  $('.jumlah:last')
    .find('#jumlah_0')
    .attr('id','jumlah_'+$i)
    .val('');

  $('.harga:last')
    .find('#harga_0')
    .attr('id','harga_'+$i)
    .val('');

  $('.total:last')
    .find('#total_0')
    .attr('id','total_'+$i)
    .val('');

  $('.stok-lama:last')
    .find('#stok_lama_0')
    .attr('id','stok_lama_'+$i)
    .val('');

  $('.stok-baru:last')
    .find('#stok_baru_0')
    .attr('id','stok_baru_'+$i)
    .val('');


  $('#transaksi .btn-success:last')
    .removeClass('btn-success').addClass('btn-danger')
    .attr('id','remove');

  $('#transaksi .fa-plus:last')
    .removeClass('fa-plus').addClass('fa-close');

  selectizeme(); // reinitialize selectize on all .combobox
  $i++;

}


//set stok barang & harga barang
// $('.input-jumlah:last').change(function () {
//   if ($('#jenis').val() === "Barang Masuk"){
//     $jumlah = parseInt($('.input-jumlah:last').val());
//     $stok_lama_transaksi = parseInt($('.input-stoklama:last').val());
//     $stok_baru_transaksi = $jumlah + $stok_lama_transaksi;
//     $('.input-stok:last').val($stok_baru_transaksi);
//   } else{
//     $jumlah = parseInt($('.input-jumlah:last').val());
//     $stok_lama_transaksi = parseInt($('.input-stoklama:last').val());
//     $stok_baru_transaksi =  $stok_lama_transaksi - $jumlah;
//     $('.input-stok:last').val($stok_baru_transaksi);
//   }
//   $quantity = $('.input-jumlah:last').val();
//   $harga = $('.input-harga:last').val();
//   $total = $harga * $quantity;
//
//   $('#total_0').val($total);
// });

// $('body').on('change','.input-barang:last', function () {
//   $input = $('.input-total')
//   $total = 0
//   for ($i=0;$i<$input.length; $i++){
//     $total += parseInt( $input[$i].value)
//   }
//   $('#total-transaksi').text(' : '+numeral($total).format('0,0'))
// })


// $("body").on("change",'#barang_id_1', function () {
//   $('#jumlah_1').val('0')
//   $.get('/barang/' + this.value + '/barang.json', function (barang) {
//     var $harga = $('#harga_1');
//     $harga.find('value').remove().end();
//
//     $.each(barang, function (index, item ) {
//       $('#harga_1').val(item.harga);
//       $('#stok_lama_1').val(item.stok);
//     });
//   });
// });
//
// $("body").on("change",'#barang_id_2', function () {
//   $('#jumlah_2').val('0')
//   $.get('/barang/' + this.value + '/barang.json', function (barang) {
//     var $harga = $('#harga_2');
//     $harga.find('value').remove().end();
//
//     $.each(barang, function (index, item ) {
//       $('#harga_2').val(item.harga);
//       $('#stok_lama_2').val(item.stok);
//     });
//   });
// });
//
// $("body").on("change",'#barang_id_3', function () {
//   $('#jumlah_3').val('0')
//   $.get('/barang/' + this.value + '/barang.json', function (barang) {
//     var $harga = $('#harga_3');
//     $harga.find('value').remove().end();
//
//     $.each(barang, function (index, item ) {
//       $('#harga_3').val(item.harga);
//       $('#stok_lama_3').val(item.stok);
//     });
//   });
// });
//
// $("body").on("change",'#barang_id_4', function () {
//   $('#jumlah_4').val('0')
//   $.get('/barang/' + this.value + '/barang.json', function (barang) {
//     var $harga = $('#harga_4');
//     $harga.find('value').remove().end();
//
//     $.each(barang, function (index, item ) {
//       $('#harga_4').val(item.harga);
//       $('#stok_lama_4').val(item.stok);
//     });
//   });
// })
//
// $("body").on("change",'#barang_id_5', function () {
//   $('#jumlah_5').val('0')
//   $.get('/barang/' + this.value + '/barang.json', function (barang) {
//     var $harga = $('#harga_5');
//     $harga.find('value').remove().end();
//
//     $.each(barang, function (index, item ) {
//       $('#harga_5').val(item.harga);
//       $('#stok_lama_5').val(item.stok);
//     });
//   });
// })
//----------------------------------------------------------------------------

//----------------------------------------------------------------------------
//set stok barang & harga barang
// $('#jumlah_0').change(function () {
//   if ($('#jenis').val() === "Barang Masuk"){
//     $jumlah = parseInt($('#jumlah_0').val());
//     $stok_lama_transaksi = parseInt($('#stok_lama_0').val());
//     $stok_baru_transaksi = $jumlah + $stok_lama_transaksi;
//     $('#stok_baru_0').val($stok_baru_transaksi);
//   } else{
//     $jumlah = parseInt($('#jumlah_0').val());
//     $stok_lama_transaksi = parseInt($('#stok_lama_0').val());
//     $stok_baru_transaksi =  $stok_lama_transaksi - $jumlah;
//     $('#stok_baru_0').val($stok_baru_transaksi);
//   }
//   $quantity = $('#jumlah_0').val();
//   $harga = $('#harga_0').val();
//   $total = $harga * $quantity;
//
//   $('#total_0').val($total);
// });
//
// $('body').on('change','#jumlah_1', function () {
//   if ($('#jenis').val() === "Barang Masuk"){
//     $jumlah = parseInt($('#jumlah_1').val());
//     $stok_lama_transaksi = parseInt($('#stok_lama_1').val());
//     $stok_baru_transaksi = $jumlah + $stok_lama_transaksi;
//     $('#stok_baru_1').val($stok_baru_transaksi);
//   } else{
//     $jumlah = parseInt($('#jumlah_1').val());
//     $stok_lama_transaksi = parseInt($('#stok_lama_1').val());
//     $stok_baru_transaksi =  $stok_lama_transaksi - $jumlah;
//     $('#stok_baru_1').val($stok_baru_transaksi);
//   }
//   $quantity = $('#jumlah_1').val();
//   $harga = $('#harga_1').val();
//   $total = $harga * $quantity;
//
//   $('#total_1').val($total);
// })
//
// $('body').on('change','#jumlah_2', function () {
//   if ($('#jenis').val() === "Barang Masuk"){
//     $jumlah = parseInt($('#jumlah_2').val());
//     $stok_lama_transaksi = parseInt($('#stok_lama_2').val());
//     $stok_baru_transaksi = $jumlah + $stok_lama_transaksi;
//     $('#stok_baru_2').val($stok_baru_transaksi);
//   } else{
//     $jumlah = parseInt($('#jumlah_2').val());
//     $stok_lama_transaksi = parseInt($('#stok_lama_2').val());
//     $stok_baru_transaksi =  $stok_lama_transaksi - $jumlah;
//     $('#stok_baru_2').val($stok_baru_transaksi);
//   }
//   $quantity = $('#jumlah_2').val();
//   $harga = $('#harga_2').val();
//   $total = $harga * $quantity;
//
//   $('#total_2').val($total);
// })
//
// $('body').on('change','#jumlah_3', function () {
//   if ($('#jenis').val() === "Barang Masuk"){
//     $jumlah = parseInt($('#jumlah_3').val());
//     $stok_lama_transaksi = parseInt($('#stok_lama_3').val());
//     $stok_baru_transaksi = $jumlah + $stok_lama_transaksi;
//     $('#stok_baru_3').val($stok_baru_transaksi);
//   } else{
//     $jumlah = parseInt($('#jumlah_3').val());
//     $stok_lama_transaksi = parseInt($('#stok_lama_3').val());
//     $stok_baru_transaksi =  $stok_lama_transaksi - $jumlah;
//     $('#stok_baru_3').val($stok_baru_transaksi);
//   }
//   $quantity = $('#jumlah_3').val();
//   $harga = $('#harga_3').val();
//   $total = $harga * $quantity;
//
//   $('#total_3').val($total);
// })
//
// $('body').on('change','#jumlah_4', function () {
//   if ($('#jenis').val() === "Barang Masuk"){
//     $jumlah = parseInt($('#jumlah_4').val());
//     $stok_lama_transaksi = parseInt($('#stok_lama_4').val());
//     $stok_baru_transaksi = $jumlah + $stok_lama_transaksi;
//     $('#stok_baru_4').val($stok_baru_transaksi);
//   } else{
//     $jumlah = parseInt($('#jumlah_4').val());
//     $stok_lama_transaksi = parseInt($('#stok_lama_4').val());
//     $stok_baru_transaksi =  $stok_lama_transaksi - $jumlah;
//     $('#stok_baru_4').val($stok_baru_transaksi);
//   }
//   $quantity = $('#jumlah_4').val();
//   $harga = $('#harga_4').val();
//   $total = $harga * $quantity;
//
//   $('#total_4').val($total);
// })
//
// $('body').on('change','#jumlah_5', function () {
//   if ($('#jenis').val() === "Barang Masuk"){
//     $jumlah = parseInt($('#jumlah_5').val());
//     $stok_lama_transaksi = parseInt($('#stok_lama_4').val());
//     $stok_baru_transaksi = $jumlah + $stok_lama_transaksi;
//     $('#stok_baru_5').val($stok_baru_transaksi);
//   } else{
//     $jumlah = parseInt($('#jumlah_4').val());
//     $stok_lama_transaksi = parseInt($('#stok_lama_4').val());
//     $stok_baru_transaksi =  $stok_lama_transaksi - $jumlah;
//     $('#stok_baru_5').val($stok_baru_transaksi);
//   }
//   $quantity = $('#jumlah_5').val();
//   $harga = $('#harga_5').val();
//   $total = $harga * $quantity;
//
//   $('#total_5').val($total);
// })
//----------------------------------------------------------------------------
//set harga total transaksi
// $('.input-jumlah:last').on('change', function () {
//   $input = $('.input-total')
//   $total = 0
//   for ($i=0;$i<$input.length; $i++){
//     $total += parseInt( $input[$i].value)
//   }
//   $('#total-transaksi').text(' : '+$total)
// })


// // Get Set harga barang
// $('#barang_id_0').change(function(){
//   $('#jumlah_0').val(0)
//   $barang = $('#barang_id_0').val()
//   getApiBarang($barang)
// });
//
// $('body').on('change','#barang_id_1',function(){
//   $('#jumlah_1').val(0)
//   $barang = $('#barang_id_1').val()
//   getApiBarang($barang)
// });
//
// $('body').on('change','#barang_id_2',function(){
//   $('#jumlah_2').val(0)
//   $barang = $('#barang_id_2').val()
//   getApiBarang($barang)
// });
//
// $('body').on('change','#barang_id_3',function(){
//   $('#jumlah_3').val(0)
//   $barang = $('#barang_id_3').val()
//   getApiBarang($barang)
// });
//
// $('body').on('change','#barang_id_4',function(){
//   $('#jumlah_4').val(0)
//   $barang = $('#barang_id_4').val()
//   getApiBarang($barang)
// });
//
// //-----------------------------
//
// //harga kali jumlah
// $('#jumlah_0').change(function () {
//
//   if ($('#jenis_0').val() === "Barang Masuk"){
//     total_masuk($('#jumlah_0').val(), $('#stok_lama_0').val())
//   } else{
//     total_keluar($('#jumlah_0').val(), $('#stok_0').val())
//
//   }
//   set_total()
// });
//
//
// //harga kali jumlah
// // $('#jumlah').change(function () {
// //
// //   if ($('#jenis').val() === "Barang Masuk"){
// //     total_masuk($('#jumlah').val(), $('#stok_lama').val(),$('#jumlah'))
// //   } else{
// //     total_keluar($('#jumlah').val(), $('#stok').val())
// //
// //   }
// //   set_total()
// // });
//
//
//
//
//
//
//
//
// var i=1;
// function getApiBarang (id) {
//
//   $.get('/barang/' + id + '/barang.json', function (barang) {
//     var $harga = $('#harga_'+id);
//     $harga.find('value').remove().end();
//
//     $.each(barang, function (index, item ) {
//       $('#harga_'+i).val(item.harga);
//       $('#stok_lama_'+i).val(item.stok);
//       $i++;
//     });
//   });
//
//   return $i
// }
//
//
// // function total_masuk(jumlah, stok_lama,id){
// //   // $jumlah = parseInt($('#jumlah').val());
// //   // $stok_lama_transaksi = parseInt($('#stok_lama').val());
// //   // $stok_baru_transaksi = $jumlah + $stok_lama_transaksi;
// //   // $('#stok_baru').val($stok_baru_transaksi);
// //
// //   $jumlah = parseInt(jumlah);
// //   $stok_lama = parseInt(stok_lama);
// //   $stok_baru = $jumlah + $stok_lama;
// //   // $('#stok_baru').val($stok_baru);
// //   set_stok_baru($stok_baru,id)
// // }
// //
// // function total_keluar (jumlah, stok_lama,id) {
// //   // $jumlah = parseInt($('#jumlah').val());
// //   // $stok_lama_transaksi = parseInt($('#stok_lama').val());
// //   // $stok_baru_transaksi =  $stok_lama_transaksi - $jumlah;
// //   // $('#stok_baru').val($stok_baru_transaksi);
// //
// //   $jumlah = parseInt(jumlah);
// //   $stok_lama = parseInt(stok_lama);
// //   $stok_baru = $jumlah - $stok_lama;
// //   // $('#stok_baru').val($stok_baru);
// //   set_stok_baru($stok_baru,id)
// // }
// //
// // function set_stok_baru(stok_baru,id){
// //     $(id).val(stok_baru)
// // }
// //
// // function set_total (total, quantity, harga) {
// //   $quantity = $('#jumlah').val();
// //   $harga = $('#harga').val();
// //   $total = $harga * $quantity;
// //
// //   $('#total').val($total);
// // }
//
//
//
//
//
//
//














