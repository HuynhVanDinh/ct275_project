  <link href="<?= BASE_URL_PATH . "css/style.css" ?>" rel=" stylesheet">
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/jquery-3.0.0.min.js"></script>
  <script src="js/plugin.js"></script>
  <!-- sidebar -->
  <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
  <script src="js/custom.js"></script>
  <!-- javascript -->
  <script src="js/owl.carousel.js"></script>
  <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
  <script>
$(document).ready(function() {
    $(".fancybox").fancybox({
        openEffect: "none",
        closeEffect: "none"
    });


    $('#myCarousel').carousel({
        interval: false
    });

    //scroll slides on swipe for touch enabled devices

    $("#myCarousel").on("touchstart", function(event) {

        var yClick = event.originalEvent.touches[0].pageY;
        $(this).one("touchmove", function(event) {

            var yMove = event.originalEvent.touches[0].pageY;
            if (Math.floor(yClick - yMove) > 1) {
                $(".carousel").carousel('next');
            } else if (Math.floor(yClick - yMove) < -1) {
                $(".carousel").carousel('prev');
            }
        });
        $(".carousel").on("touchend", function() {
            $(this).off("touchmove");
        });
    });
})
  </script>

  <div class="header_section mb-5">
      <div class="banner_section">
          <div class="container-fluid">
              <section class="slide-wrapper">
                  <div class="container-fluid">
                      <div id="myCarousel" class="carousel slide" data-ride="carousel">
                          <!-- Indicators -->
                          <ol class="carousel-indicators">
                              <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                              <li data-target="#myCarousel" data-slide-to="1"></li>
                              <li data-target="#myCarousel" data-slide-to="2"></li>
                              <li data-target="#myCarousel" data-slide-to="3"></li>
                          </ol>

                          <!-- Wrapper for slides -->
                          <div class="carousel-inner">
                              <div class="carousel-item active">
                                  <div class="row">
                                      <div class="col-sm-2 padding_0">
                                          <div class="page_no">1/4</div>
                                      </div>
                                      <div class="col-sm-5">
                                          <div class="banner_taital">
                                              <h1 class="banner_text">D-twice Sneaker</h1>
                                              <h1 class="mens_text"><strong>Chuyên giày Adidas, Nike
                                                      <br> <br>chính hãng</strong></h1>
                                              <p class="lorem_text">Chúng tôi khiến cho mỗi bước đi của bạn
                                                  trở nên
                                                  đáng nhớ.
                                              </p>
                                              <button class="buy_bt">Mua ngay</button>
                                              <button class="more_bt">Xem chi tiết</button>
                                          </div>
                                      </div>
                                      <div class="col-sm-5">
                                          <div class="shoes_img"><img src="img/add-hu.png"></div>
                                      </div>
                                  </div>
                              </div>
                              <div class="carousel-item">
                                  <div class="row">
                                      <div class="col-sm-2 padding_0">
                                          <div class="page_no">2/4</div>
                                      </div>
                                      <div class="col-sm-5">
                                          <div class="banner_taital">
                                              <h1 class="banner_text">D-twice Sneaker</h1>
                                              <h1 class="mens_text"><strong>Chuyên sneaker chính hãng</strong>
                                              </h1>
                                              <p class="lorem_text">Chúng tôi khiến cho mỗi bước đi của bạn
                                                  trở nên
                                                  đáng nhớ.
                                              </p>
                                              <button class="buy_bt">Mua ngay</button>
                                              <button class="more_bt">Xem chi tiết</button>
                                          </div>
                                      </div>
                                      <div class="col-sm-5">
                                          <div class="shoes_img"><img src="img/add-hu2.png"></div>
                                      </div>
                                  </div>
                              </div>
                              <div class="carousel-item">
                                  <div class="row">
                                      <div class="col-sm-2 padding_0">
                                          <div class="page_no">3/4</div>
                                      </div>
                                      <div class="col-sm-5">
                                          <div class="banner_taital">
                                              <h1 class="banner_text">D-twice Sneaker</h1>
                                              <h1 class="mens_text"><strong>ADIDAS - DIỆN MẠO <br><br> VƯỢT
                                                      THỜI
                                                      GIAN</strong>
                                              </h1>
                                              <p class="lorem_text">Adidas là nhà sản xuất dụng cụ thể thao
                                                  lớn thứ
                                                  hai trên thế giới.
                                                  <br> Công ty được đặt theo tên của người sáng lập, Adolf
                                                  (Adi)
                                                  Dassler, năm 1948.
                                                  <br> Công ty Adidas được đăng ký nhãn hiệu
                                                  là Adidas AG
                                                  <br> vào ngày 18 tháng 8 năm 1949.
                                              </p>
                                          </div>
                                      </div>
                                      <div class="col-sm-5">
                                          <div class="shoes_img"><img src="img/add-spstar.png"></div>
                                      </div>
                                  </div>
                              </div>
                              <div class="carousel-item">
                                  <div class="row">
                                      <div class="col-sm-2 padding_0">
                                          <div class="page_no">4/4</div>
                                      </div>
                                      <div class="col-sm-5">
                                          <div class="banner_taital">
                                              <h1 class="banner_text">D-twice Sneaker</h1>
                                              <h1 class="mens_text"><strong>NIKE - “Just do it” </strong></h1>
                                              <p class="lorem_text">Nike, Inc. là tập đoàn đa quốc gia của Mỹ
                                                  hoạt
                                                  động trong lĩnh vực thiết kế, phát triển, sản xuất, quảng bá
                                                  cũng
                                                  như kinh doanh các mặt hàng giày dép, quần áo, phụ kiện,
                                                  trang thiết
                                                  bị và dịch vụ liên quan đến thể thao.
                                                  <br>Công ty được thành lập vào ngày 25 tháng 1 năm 1964
                                                  <br> với tên Blue
                                                  Ribbon Sports và chính thức có
                                                  tên Nike, Inc. vào năm
                                                  1971.
                                                  <br>Công ty này lấy tên theo Νίκη, nữ thần chiến thắng của
                                                  Hy Lạp.
                                              </p>
                                              <button class="buy_bt">Mua ngay</button>
                                              <button class="more_bt">Xem chi tiết</button>
                                          </div>
                                      </div>
                                      <div class="col-sm-5">
                                          <div class="shoes_img"><img src="img/add-spstar2.png"></div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </section>
          </div>
      </div>
  </div>