<?php
$tgl = DateTime::createFromFormat('Y-m-d', $blog['tanggal'])->format('d F Y');
?>
<div class="container">
    <div class="row">
        <div class="col-md-8 mb-4">
            <div class="card rounded">
              <img class="card-img-top" src="<?=base_url()?>assets/img/paramore.jpg" alt="Card image cap">
              <div class="card-body">
                <h2 class="card-title text-center text-judul"><?php echo $blog['judul']?></h2>
                <p class="card-text text-center text-default"><small class="text-muted mb-3">Posted by <i>Rizki</i> on <i><?php echo $tanggal?></i> |</small> <a href=""><small class="card-text" >Category</small></a></p>
                <hr class="hr-style">
                <p class="card-text text-content"><?= $blog['deskripsi'] ?></p>
                
              </div>
            </div>
            <div id="disqus_thread"></div>
            <script>

            /**
            *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
            *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
            /*
            var disqus_config = function () {
            this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
            this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
            };
            */
            (function() { // DON'T EDIT BELOW THIS LINE
            var d = document, s = d.createElement('script');
            s.src = 'https://tanto-1.disqus.com/embed.js';
            s.setAttribute('data-timestamp', +new Date());
            (d.head || d.body).appendChild(s);
            })();
            </script>
            <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

            <a class="btn btn-primary float-left mt-3 button-nav text-default" href="">Previus</a>
            <a class="btn btn-primary float-right mt-3 button-nav text-default" href="">Next</a>
        </div>

        <?php 
        include_once 'side_bar_left.php';
         ?>

    </div>
</div>