<?php include 'includes/header.php'; ?>

    <div class="pageTitle">Our Clients</div>

    <section class="clientpage py-5">
        <div class="container">
            <ul class="flex allclient"></ul>
        </div>
    </section>

<?php include 'includes/footer.php'; ?>


<script>
    $(document).ready(function(){

      var lists = "";

      for(var i=1; i < 113; i++){
          lists += `<li><img src='images/clients/${i}.png' alt="" class="objectContain"></li>`;
      }

    $('.allclient').html(lists);
    });
</script>
</body>
</html>