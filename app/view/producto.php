<script type="text/javascript" src="<?php echo JS; ?>custom/productos.js"></script>
<div id="contentContact">
    <div id="mainContentSection">
        <div class="breadcrumbs">
            <ul>
                <li class="home">
                    <a title="Go to Home Page" href="<?php echo DOMAIN; ?>">Inicio</a>
                    <span>/ </span>
                </li>
                <li class="product">
                    <strong id="title_product"></strong>
                </li>
            </ul>
        </div>

        <div id="messages_product_view"></div>
        <div class="product-view">
            <div class="product-essential">
                <div class="product-shop" style="margin-top:-7px">
                    <div class="product-name">
                        <h1></h1>
                    </div>
                    <div class="price-box">
                        <p class="txtPage" style="float: left;margin-top:5px">
                        <h1 id="price"></h1>
                        <img style="display:inline;margin-right:5px" src="<?php echo IMAGES; ?>icons/pdf_icon.gif"
                             alt="">
                        <a href="" style="text-decoration:underline;">Data</a>
                        <img style="display:inline;margin-right:5px;margin-left:10px"
                             src="<?php echo IMAGES; ?>icons/pdf_icon.gif" alt="">
                        <a href="" style="text-decoration:underline;">Aplicación PDF</a>


                        </p>
                    </div>
                </div>
                <div class="product-img-box">
                    <p class="product-image">
                        <img id="image_product" title="" alt="" src="">
                    </p>
                </div>
                <div class="clearer"></div>
            </div>


            <div class="product-collateral"></div>

            <div style="clear:both;">
                <div class="prodSection" style="clear:both;">
                    <h2>Productos</h2>
                    <div style="text-align:center;margin-top:10px;margin-bottom:10px;" id="productos"></div>
                </div>
            </div>
        </div>

    </div>
</div>