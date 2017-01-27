<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon -bar"></span>
        <span class="icon-bar"></span>
      </button>
      <?php echo anchor(base_url(), 'Toko Online', ['class' => 'navbar-brand']) ; ?>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      
      <ul class="nav navbar-nav navbar-right">
        <li>
            <?php
                $text_cart_url  = '<span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>';
                $text_cart_url .= ' Inside Cart : ' . $this->cart->total_items() .' Items';
            ?>
          <?php echo anchor('welcome/cart', $text_cart_url)  ?>
        </li>
          <li>
              <?php echo anchor('Login', 'Login') ?>
          </li>
        
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav> 