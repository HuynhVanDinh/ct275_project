<?php
use CT275\Project\Category;
$category = new Category($PDO);
$categorys = $category->all();
?>
<div class="section_footer">
    <div class="pl-5 pr-5">
        <div class="row">
            <div class="col-sm-12 col-lg-10">
                <div class="mail_section">

                    <div class="row">
                        <div class="col-sm-6 col-lg-3 text-center">
                            <div><a href="#"><img class="img-thumbnail" src="/../img/logo3.png" style="width:200px"></a>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="footer-logo"><img src="/../img/phone-icon.png"><span
                                    class="map_text">(+84)123456789</span></div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="footer-logo"><img src="/../img/email-icon.png"><span
                                    class="map_text">DtwiceShop@gmail.com</span></div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="social_icon">
                                <ul>
                                    <li><a href="#"><img src="/../img/fb-icon.png"></a></li>
                                    <li><a href="#"><img src="/../img/twitter-icon.png"></a></li>
                                    <li><a href="#"><img src="/../img//in-icon.png"></a></li>
                                    <li><a href="#"><img src="/../img/google-icon.png"></a></li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="footer_section_2">
                    <div class="row">
                        <div class="col-lg-3"></div>
                        <div class="col-sm-4 col-lg-2">
                            <p class="dummy_text"> Hàng đẹp, giá tốt, <br> chủ đẹp trai. <br> Mua đi chờ chi!</p>
                        </div>

                        <div class="col-sm-4 col-lg-2">
                            <h2 class="shop_text">Địa chỉ</h2>
                            <div class="image-icon"><img src="/../img/map-icon.png"><span class="pet_text">
                                    1 bis, đường 30/4, Quận Ninh Kiều, TP. Cần Thơ</span></div>
                        </div>

                        <div class="col-sm-4 col-md-6 col-lg-3 pl-5">
                            <h2 class="shop_text">Chính sách</h2>
                            <div class="delivery_text">
                                <ul>
                                    <li>Chính sách đổi trả</li>
                                    <li>Chính sách bảo hành</li>
                                    <li>Chính sách vận chuyển</li>
                                    <li>Chính sách thanh toán</li>
                                    <li>Chính sách bảo mật</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-2">
                            <h2 class="adderess_text ">Bản đồ</h2>
                            <a href="#">
                                <iframe class="img-thumbnail"
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15729855.42909206!2d96.7382165931671!3d15.735434000981483!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31157a4d736a1e5f%3A0xb03bb0c9e2fe62be!2zVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1445179448264"
                                    width="150" height="150" frameborder="0" style="border:0" scrolling="no"
                                    marginheight="0" marginwidth="0"></iframe>
                                <br />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-2">
                <h2 class="adderess_text">Sản phẩm</h2>
                <?php foreach ($categorys as $category) :
						$categoryID = $category->getId(); ?>
                <div class="delivery_text">
                    <ul>
                        <li>
                            <a class="text-white  w-75" href="product.php?category_id=<?php echo $categoryID; ?>">
                                <?php htmlspecialchars($category->getId());
							        echo htmlspecialchars($category->category_name) ?>
                            </a>
                        </li>

                    </ul>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <!-- section footer end -->
    <marquee direction="right" class="copyright mt-5">2022 © Huỳnh Văn Định & Nguyễn Đăng </marquee>