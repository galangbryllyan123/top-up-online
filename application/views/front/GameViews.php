<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="id-ID" xml:lang="id-ID">

<head>
  <?php $this->load->view('front/_layout/Head'); ?>
  <style media="screen">
    input::-webkit-outer-spin-button, input::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }
    input[type=number] {
      -moz-appearance: textfield;
    }
    a:not([href]):not([tabindex]){
      color: white;
    }
    a.readmore{
      cursor: pointer;
      color: black;
    }
    a.readmore:hover{
      color: white;
    }
    p.readmore{
      cursor: pointer;
      color: white;
    }
    .balance{
      cursor: pointer;
    }
    .readmore:hover {
      color: red;
    }
    .swal2-html-container {
      text-align: left;
    }
  </style>
</head>

<body class="bg-white text-white">

  <!--Navbar-->
  <?php $this->load->view('front/_layout/Navbar'); ?>

  <main id="main">
    <section class="blackexpostyle section pt-5 pb-5">
      <div class="site-section">
        <div class="container">
          <div class="row align-items-stretch">
            <div class="col-md-4" data-aos="fade-up">
              <div class="text-center">
                <img src="<?php echo $gamePic; ?>?<?php echo BLACKEXPOVERSION; ?>" class="img-fluid rounded-4" alt="Topup <?php echo $gameName; ?> Termurah" title="Topup <?php echo $gameName; ?> Murah">
              </div>
              <br>
              <div class="bg-white rounded-4 p-3 mb-4">
                <div class="mt-3 text-dark">
                  <h1 style="display:none"><?php echo $title ?> Termurah</h1>
                  <h2 style="display:none">Panel <?php echo $title ?> Termurah</h2>
                  <h2 style="display:none">Web Panel Topup <?php echo $gameName; ?> Termurah</h2>
                  <h3 style="display:none">Panel PPOB Voucher <?php echo $gameName; ?> Termurah</h3>
                  <h3 class="h3"><?php echo $gameName; ?></h3>
                  <p class="readmorep text-dark mb-0">
                    <span class="deskpro"></span>
                  </p>
                </div>
              </div>
            </div>

            <div class="col-md-8 ml-auto">
              <div class="sticky-content">
                <div class="bg-white rounded-4 p-3">
                  <h3 class="h3 mt-3 text-dark">1. Masukkan Tujuan</h3>
                  <p class="text-dark m-0"><b>Catatan:</b> <?php echo $gameId; ?></p>
                  <div class="row rounded-3 mx-1 pt-3">
                    <label for="id" class="text-dark">Nomor / ID / Nickname</label>
                    <div class="col-md-12 col-12 form-group">
                      <input status="true" style="" type="text" placeholder="082377<?php echo date("m");?>XXXXX" name="id" class="form-control text-dark userid inputku rounded-3" id="id" value="" nickname="" required>
                    </div>
                  </div>
                </div>

                <br>
                <div class="bg-white rounded-4 p-3">
                  <h3 class="h3 mt-3 text-dark">2. Pilih Item</h3>
                  <div class="row rounded-3 mx-1 mt-1 pt-3">
                    <?php foreach ($data as $d):
                    if ($d->buyer_product_status == true && $d->seller_product_status == true && $d->brand == $gameName) { ?>
                    <div class="col-md-4 col-6 text-white" style="height:100%;">
                      <a price="<?php echo $d->newprice; ?>" id="<?php echo $d->buyer_sku_code; ?>" class="readmore text-center text-white item rounded-3">
                      <?php echo $d->product_name; ?>
                      </a>
                    </div>
                    <?php } endforeach; ?>
                  </div>
                </div>

                <br>
                <div class="bg-white rounded-4 p-3">
                  <h3 class="h3 text-dark">3. Metode Pembayaran</h3>
                  <div class="row">
                    <div class="col-md-4 col-4"></div>
                    <div class="col-md-8 col-8">
                      <div class="text-dark text-center">
                        *<b>include biaya admin</b>
                      </div>
                    </div>
                  </div>
                  <div class="listpayment">
                  </div>
                </div>

                <br>
                <div class="bg-white rounded-4 p-3">
                  <h3 class="h3 mt-3 text-dark">4. Proses Pesanan</h3>
                  <div class="row rounded-3 mx-1">
                    <?php if (!$this->ion_auth->logged_in()) {?>
                      <div class="col-md-12 col-12 form-group">
                        <label class="text-dark" for="">Masukkan Email: </label>
                        <input type="email" placeholder="email@gmail.com" name="EmailSend" class="form-control text-dark sendemail rounded-3" id="SendEmail" value="" style="" required>
                      </div>
                    <?php } ?>

                    <?php if (GOOGLESITE_KEY !== ''): ?> 
                    <div class="g-recaptcha pb-3" data-sitekey="<?php echo GOOGLESITE_KEY; ?>" style="text-align:-webkit-center"></div><br>
                    <?php endif; ?>

                    <div class="col-md-12 col-12">
                      <div style="width:100%;">
                        <a userids="false" class="readmore rounded-5 text-center buy">Beli</a>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>

          </div>
        </div>
      </div>
    </section>
  </main>

  <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content blackexpostyle">
        <div class="modal-header" style="border-bottom: 1px solid #ffc107;">
          <h5 class="modal-title">Detail pembayaran</h5>
          <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body payment-detail">
        </div>
        <div class="modal-footer" style="border-top: 1px solid #ffc107;">
          <p><?php echo $title ?></p>
        </div>
      </div>
    </div>
  </div>

  <?php $this->load->view('front/_layout/Footer'); ?>

  <!-- Vendor JS Files -->
  <script type="text/javascript">
    $(document).ready(function() {
      getPayment();

      $('.userid').focusout(function(){
        var cekurl = '<?php echo $gameCekId; ?>';
        if (this.value != '') {
          if (cekurl != '') {
            var UserId = this.value;
            $.LoadingOverlay("show");
            $.ajax({
              url: cekurl,
              cache: false,
              type: "post",
              dataType: "json",
              async: true,
              data: {
                "UserId": UserId,
              },
              success: function (data) {
                if (!data.Status) {
                  Swal.fire({
                    icon: 'error',
                    title: 'Oops..',
                    text: 'Nickname tidak ditemukan',
                  })
                  $(".userid").attr('status', 'false');
                  $(".buy").attr('userids','false');
                } else {
                  Swal.fire({
                    icon: 'success',
                    title: 'Sukses',
                    text: 'Nickname: '+data.NickName,
                  })
                  $(".userid").attr('status', 'true');
                  $(".userid").attr('nickname', data.NickName);
                  $(".buy").attr('userid',$(".userid").val());
                  $(".buy").attr('userids','true');
                  $(".buy").attr('nickname',data.NickName);
                }
                $.LoadingOverlay("hide");
              },
              error: function () {
                $.ajax(this);
                return false;
              }
            });
          } else {
            $(".buy").attr('userid',$(".userid").val());
            $(".buy").attr('userids','true');
            $(".buy").attr('nickname',$(".userid").val());
          }
        }
      });

      function getPayment(){
        $.ajax({
          url: "<?php echo base_url('order/getPayment') ?>",
          cache: false,
          type: "get",
          dataType: "json",
          async: true,
          success: function (data) {
            if (data === null) {
              alert('TERJADI KESALAHAN INTEGRASI PEMBAYARAN');
            } else {
              $(".listpayment").empty();
              for (var i = 0; i < data.data.length; i++) {
                if (data.data[i].code != "BALANCE") {
                  $(".listpayment").append('<div class="row p-1 mt-1 rounded-3 mx-1" style="border-top:1px solid #CCCCCC;">'
                    +'<div class="col-md-4 col-4" style="height:100%;">'
                    +'<img style="height:40px;max-width:100%;" src="'+data.data[i].image+'" alt="Pilih Metode" title="Pilih Metode">'
                    +'</div>'
                    +'<div class="col-md-8 col-8">'
                    +'<a disabled style="width:100%;margin-top:2px;" id="'+data.data[i].code+'" class="readmore text-center text-white payment rounded-3 '+data.data[i].code+'">'+formatRupiah(data.data[i].price.toString(), 'Rp. ')+'</a>'
                    +'</div>'
                    +'</div>');
                }
              }
            }
            $.LoadingOverlay("hide");
          },
          error: function () {
            $.ajax(this);
            return false;
          }
        });
      }

      if ($(window).width() < 960) {
        $(".deskpro").text('Ikuti catatan pada poin 1 saat memasukkan tujuan, pastikan tujuannya tepat.');
        $(".readmorep").append('<a style="color:#333333;" class="readmorea"><b>Selengkapnya</b></a>');
      } else {
        $(".deskpro").text('Ikuti catatan pada poin 1 saat memasukkan tujuan, pastikan tujuannya tepat dan valid untuk <?php echo $gameName; ?>. Masukan tujuan pesanan untuk <?php echo $gameName; ?>, pilih nominal pembelian, lakukan pembayaran, dan pesanan diproses otomatis. Untuk harga lebih murah gunakan saldo Akun. Kamu juga dapat menggunakan e-wallet, bank transfer, dan convenience store. <?php echo SITE_NAME; ?> adalah platform termurah untuk topup & pembelian item <?php echo $gameName; ?> dengan proses instan.');
      }
      $('.readmorep').on('click','.readmorea',function() {
        $(".deskpro").text('Ikuti catatan pada poin 1 saat memasukkan tujuan, pastikan tujuannya tepat dan valid untuk <?php echo $gameName; ?>. Masukan tujuan pesanan untuk <?php echo $gameName; ?>, pilih nominal pembelian, lakukan pembayaran, dan pesanan diproses otomatis. Untuk harga lebih murah gunakan saldo Akun. Kamu juga dapat menggunakan e-wallet, bank transfer, dan convenience store. <?php echo SITE_NAME; ?> adalah platform termurah untuk topup & pembelian item <?php echo $gameName; ?> dengan proses instan.');
        $(".readmorea").remove();
        $(".readmorep").append('<a style="color:#333333;" class="readmorem"><b>Sembunyikan</b></a>');
      });
      $('.readmorep').on('click','.readmorem',function() {
        $(".deskpro").text('Ikuti catatan pada poin 1 saat memasukkan tujuan, pastikan tujuannya tepat.');
        $(".readmorem").remove();
        $(".readmorep").append('<a style="color:#333333;" class="readmorea"><b>Selengkapnya</b></a>');
      });
      $('.bd-example-modal-lg').on('hidden.bs.modal', function () {
        location.reload();
      });
      console.log( "ready");

      $(document).on("click",".close", function () {
        $(".bd-example-modal-lg").modal('hide');
      });

      $(document).on("click",".payment", function () {
        if ($(this).attr('price') === undefined) {
        } else {
          $(".payment").removeClass("text-dark");
          $(this).addClass("text-dark");
          $(".payment").css("background-color","#030C30");
          $(this).css("background-color","#0D47A1");
          $(".buy").attr('price',$(this).attr('price'));
          $(".buy").attr('userid',$(".userid").val());
          $(".buy").attr('payment',$(this).attr('id'));
        }
      });

      $(document).on("click",".buy", function () {
        var cekurl = '<?php echo $gameCekId; ?>';
        var token = $("#g-recaptcha-response").val();
        var SendEmail = $('.sendemail').val();
        <?php if (!$this->ion_auth->logged_in()) {?>
        if (SendEmail == ''){
          Swal.fire({
            icon: 'error',
            title: 'Opps',
            html: 'Masukan email terlebih dahulu',
          });
          return false;
        }
        <?php } ?>

        if (cekurl != '') {
          if ($(this).attr('userids') == 'false') {
            Swal.fire({
              icon: 'error',
              title: 'Opps',
              html: 'Masukkan tujuan terlebih dahulu',
            });
            return false;
          }
        }

        if ($(".userid").val() === "") {
          Swal.fire({
            icon: 'error',
            title: 'Opps',
            html: 'Masukkan tujuan terlebih dahulu',
          });
          return false;
        }

        if ($(this).attr('price') === undefined) {
          Swal.fire({
            icon: 'error',
            title: 'Opps',
            html: 'Pilih item dan metode pembayaran',
          });
          return false;
        }

        if ($(this).attr('payment') === undefined) {
          Swal.fire({
            icon: 'error',
            title: 'Opps',
            html: 'Pilih item dan metode pembayaran',
          });
          return false;
        }

        if ($(this).attr('price') === "") {
          Swal.fire({
            icon: 'error',
            title: 'Opps',
            html: 'Pilih item dan metode pembayaran',
          });
          return false;
        }

        if ($(this).attr('payment') === "") {
          Swal.fire({
            icon: 'error',
            title: 'Opps',
            html: 'Pilih item dan metode pembayaran',
          });
          return false;
        }

        if (token == ''){
          Swal.fire({
            icon: 'error',
            title: 'Opps',
            html: 'Verifikasi captcha terlebih dahulu',
          });
          return false;
        }

        Swal.fire({
          title: 'Beli Sekarang?',
          showCancelButton: true,
          confirmButtonText: 'Lanjut',
        }).then((result) => {
          if (result.isConfirmed) {
            $.LoadingOverlay("show");
            var price = $(this).attr('price');
            var userid = $(".userid").val();
            var payment = $(this).attr('payment');
            var itemid = $(this).attr('itemid');
            var nickname = $(this).attr('nickname');
            var itemname = $(this).attr('itemname');
            $.ajax({
              url: "<?php echo base_url('prosess') ?>",
              cache: false,
              type: "post",
              dataType: "json",
              async: true,
              data: {
                "price": price,
                "userid": userid,
                "payment": payment,
                "itemid":itemid,
                "game" : "<?php echo $gameCode; ?>",
                "token" : token,
                "nickName" : nickname,
                "itemName" : itemname,
                "SendEmail" : SendEmail,
              },
              success: function (data) {
                if (data === null) {
                  Swal.fire({
                    icon: 'error',
                    title: 'Opps',
                    html: '<p> Pembelian gagal, ulangi beberapa saat lagi, atau pilih item lain.. </p>',
                  });
                } else {
                  if (data.status === "FAILED") {
                    Swal.fire({
                      icon: 'error',
                      title: 'Opps',
                      html: '<p> Transaksi gagal </p>'
                      +'<p> Error: '+data.message+' </p>',
                    });
                  } else {
                    if (data.success) {
                      if (data.data.payment_method === "OVO" || "SHOPEEPAY") {
                        window.location.replace(data.data.checkout_url);
                      } else {
                        var qq = '';
                        for (var i = 0; i < data.data.instructions.length; i++) {
                          qq += "<hr><div style='text-align:left'><h5 class='text-primary'>"+(i+1)+". "+data.data.instructions[i].title+"</h5></div>";
                          for (var j = 0; j < data.data.instructions[i].steps.length; j++) {
                            qq += "<div style='text-align:left;font-size:18px'><p>• "+data.data.instructions[i].steps[j]+"</p></div>";
                          }
                        }
                        if (data.data.qr_url != undefined) {
                          Swal.fire({
                            imageUrl: data.data.qr_url != undefined ? data.data.qr_url : ' ',
                            imageWidth: 200,
                            imageHeight: 200,
                            icon: 'success',
                            title: 'Transaksi Pending',
                            html: '<p class="text-center"><a class="btn btn-primary" href="'+data.data.qr_url+'" target="_blank">Download QR Code</a> </p>'
                            + '<div style="text-align:left">'
                            +'<p>Metode: '+data.data.payment_name+'</p>'
                            +'<p>Pengguna: '+data.data.customer_name+'</p>'
                            +'<p>Invoice: '+data.data.merchant_ref+'</p>'
                            +'<p>Jumlah: <b>'+formatRupiah(data.data.amount.toString(), 'Rp. ')+'</b></p>'
                            +'<p>Item: '+data.data.order_items[0].name+'</p>'
                            +'</div>'
                            +'<br><h2> Cara Pembayaran</h2>'
                            +qq
                          }).then((result) => {
                            if (result.isConfirmed) {
                              window.location.href = '<?php echo base_url('pesanan'); ?>?inv='+data.data.merchant_ref;
                            }
                          });
                          cektransaksi(data.data.merchant_ref);
                        } else {
                          Swal.fire({
                            icon: 'success',
                            title: 'Transaksi Pending',
                            html: '<div style="text-align:left">'
                            +'<p>Metode: '+data.data.payment_name+'</p>'
                            +'<p>Pengguna: '+data.data.customer_name+'</p>'
                            +'<p>Invoice: '+data.data.merchant_ref+'</p>'
                            +'<p>Jumlah: <b>'+formatRupiah(data.data.amount.toString(), 'Rp. ')+'</b></p>'
                            +'<p>Item: '+data.data.order_items[0].name+'</p>'
                            +'</div>'
                            +'<br><h2> Cara Pembayaran</h2>'
                            +qq
                          }).then((result) => {
                            if (result.isConfirmed) {
                              window.location.href = '<?php echo base_url('pesanan'); ?>?inv='+data.data.merchant_ref;
                            }
                          });
                          cektransaksi(data.data.merchant_ref);
                        }
                      }
                    }
                  }
                }
                $.LoadingOverlay("hide");
              },
              error: function () {
                Swal.fire({
                  icon: 'error',
                  title: 'Opps',
                  text: 'Pembelian gagal, pilih item atau metode pembayaran lain..',
                })
                $.LoadingOverlay("hide");
              }
            });
          }
        })

      });

      function cektransaksi(invoiceid){
        setInterval(function(){
          if (invoiceid != '') {
            $.ajax({
              url: "<?php echo base_url('pesanan/getdata'); ?>",
              cache: false,
              type: "post",
              dataType: "json",
              async: true,
              data:{
                'invoiceid' : invoiceid
              },
              success: function(data){
                if (data.data.StatusOrder == 1) {
                  window.location.href = '<?php echo base_url('pesanan'); ?>?inv='+invoiceid;
                } else if (data.data.StatusOrder == 5) {
                  window.location.href = '<?php echo base_url('pesanan'); ?>?inv='+invoiceid;
                }
              },
              error: function(){
              }
            });
          }
        }, 10000);
      }

      $(document).on("click",".item", function () {
        $(".item").removeClass("text-dark");
        $(this).addClass("text-dark");

        $(".item").css("background-color","#030C30");
        $(this).css("background-color","#0D47A1");

        var itemId = $(this).attr('id');
        var price = $(this).attr('price');
        $(".buy").attr('itemid',itemId);

        $(".buy").attr('itemname',$(this).text());
        var clickedBtnID = $(this).attr('id');

        $.ajax({
          url: "<?php echo base_url('prosess/getdata') ?>",
          cache: false,
          type: "post",
          dataType: "json",
          async: true,
          data: {
            "itemId": itemId,
            "price": price,
          },
          success: function (data) {
            csrfName = data.csrfName;
            csrfHash = data.csrfHash;
            if (data === null) {
              alert('TERJADI KESALAHAN INTEGRASI PEMBAYARAN');
              $.LoadingOverlay("hide");
            } else {
              console.log(data.csrfHash);
              $(".listpayment").empty();
              for (var i = 0; i < data.data.length; i++) {
                if (data.data[i].code != "BALANCE") {
                  $(".listpayment").append('<div class="row p-1 mt-1 rounded-3 mx-1" style="border-top:1px solid #CCCCCC;">'
                    +'<div class="col-md-4 col-4" style="height:100%;">'
                    +'<img style="height:40px;max-width:100%;" src="'+data.data[i].image+'" alt="Pilih Metode" title="Pilih Metode">'
                    +'</div>'
                    +'<div class="col-md-8 col-8">'
                    +'<a price="'+data.data[i].price+'" style="width:100%;margin-top:2px;" id="'+data.data[i].code+'" class="readmore text-center text-white payment rounded-3 '+data.data[i].code+'">'+formatRupiah(data.data[i].price.toString(), 'Rp. ')+'</a>'
                    +'</div>'
                    +'</div>');
                }
              }

              if (data.price < 10000) {
                $('.BCAVA').attr('hidden', true);
                $('.BNIVA').attr('hidden', true);
                $('.BRIVA').attr('hidden', true);
                $('.INDOMARET').attr('hidden', true);
                $('.MYBVA').attr('hidden', true);
                $('.PERMATAVA').attr('hidden', true);
                $('.MANDIRIVA').attr('hidden', true);
                $('.SMSVA').attr('hidden', true);
                $('.MUAMALATVA').attr('hidden', true);
                $('.CIMBVA').attr('hidden', true);
                $('.SAMPOERNAVA').attr('hidden', true);
                $('.BSIVA').attr('hidden', true);
                $('.BRIVAOP').attr('hidden', true);
                $('.CIMBVAOP').attr('hidden', true);
                $('.DANAMONOP').attr('hidden', true);
                $('.HANAVAOP').attr('hidden', true);
                $('.BSIVAOP').attr('hidden', true);
              }

              if (data.price < 5000) {
                $('.INDOMARET').attr('hidden', true);
                $('.ALFAMART').attr('hidden', true);
                $('.ALFAMIDI').attr('hidden', true);
              }

              if (data.price < 1000) {
                $('.OVO').attr('hidden', true);
                $('.QRIS').attr('hidden', true);
                $('.QRISC').attr('hidden', true);
                $('.QRISD').attr('hidden', true);
                $('.SHOPEEPAY').attr('hidden', true);
                $('.QRISOP').attr('hidden', true);
                $('.QRISCOP').attr('hidden', true);
              }

            }
          },
          error: function () {
            $.ajax(this);
            return false;
          }
        });
      });

      function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split = number_string.split(','),
        sisa = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if(ribuan) {
          separator = sisa ? '.' : '';
          rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
      }

    });
  </script>

</body>

</html>