<?php if(!class_exists('Rain\Tpl')){exit;}?>        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-white">
                    
                    <p class="lead fw-normal text-white-50 mb-0">
                        
        
            
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-2 row-cols-xl-2 justify-content-center">
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="<?php echo htmlspecialchars( $product["desphoto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt="..." />
                        </div>
                    </div>
                </div>

        
                    <h1 class="text-center display-4 fw-bolder"><?php echo htmlspecialchars( $product["desproduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h1>
                    <br/>
                    <br/>
                    </p>
                </div>
            </div>
        </header>
        <!-- Section-->
        <div class="card h-100">
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <form role="form" action="/select/<?php echo htmlspecialchars( $product["idproduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="post" enctype="multipart/form-data">
            
            <div class="box-body">

            <div class="form-group">
                <input type="text" class="form-control" id="desperson" name="desperson" placeholder="Nome completo">
            </div>

            <div class="form-group">
                <textarea class="form-control" id="text" name="text" placeholder="Mensagem">Mensagem </textarea>
            </div>

            <div class="form-group">
                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                    <button type="submit" class="btn btn-outline-dark mt-auto">Salvar</button>
                </div>
            </div>
          </div>
      </form>
          <!-- /.box-body -->
          <div class="box-footer">
                </div>
            </div>
        </section>
    </div>
        <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>