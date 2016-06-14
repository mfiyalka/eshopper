
<footer id="footer"><!--Footer-->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">Copyright © <?=date('Y')?></p>
                <p class="pull-right"><a href="/admin">Вхід для адміністратора</a></p>
            </div>
        </div>
    </div>
</footer><!--/Footer-->


<!--Carousel-->
<!--<script src="/js/jquery.cycle2.carousel.min.js"></script>-->
<!--<script src="/js/jquery.cycle2.min.js"></script>-->

<script src="/public/js/jquery.js"></script>
<script src="/public/js/bootstrap.min.js"></script>
<script src="/public/js/jquery.scrollUp.min.js"></script>
<script src="/public/js/price-range.js"></script>
<script src="/public/js/jquery.prettyPhoto.js"></script>
<script src="/public/js/main.js"></script>
<script>
    $(document).ready(function(){
        $(".add-to-cart").click(function () {
            var id = $(this).attr("data-id");
            $.post("/cart/addAjax/"+id, {}, function (data) {
                $("#cart-count").html(data);
            });
            return false;
        });
    });
</script>
</body>
</html>