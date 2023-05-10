<?php if(!class_exists('Rain\Tpl')){exit;}?>        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-white">
                    <h1 class="text-center display-4 fw-bolder">Lista Chá de Panela</h1>
                    <p class="lead fw-normal text-white-50 mb-0">
                        
                    Dia: XX/XX/XX <br/>
                    Hora: XX:XX<br/>
                    Local: Rua Rosa Pires 430, St. Antônio da Prata - Belford Roxo/RJ <br/>
                    <br/>
                    O nosso grande dia está chegando, mas antes teremos uma prévia: o Chá de Panela.<br/> 
                    Escolha o item que desejar. Todos os produtos têm fotos de referência. <br/>
                    Ou você pode fazer um pix, no valor que desejar, para nos ajudar! (Qrcode) <br/>
                    Sua presença é muito importante para nós. Te esperamos lá! <br/>

                    </p>
                </div>
            </div>
        </header>
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <!--INICIO DO LOOP-->
                    <?php $counter1=-1;  if( isset($products) && ( is_array($products) || $products instanceof Traversable ) && sizeof($products) ) foreach( $products as $key1 => $value1 ){ $counter1++; ?>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><?php echo htmlspecialchars( $value1["desproduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h5>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="/select">Selecionar</a></div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <!--FIM DO LOOP-->
                </div>
            </div>
        </section>