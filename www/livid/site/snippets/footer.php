
  </div>
  <div class="row">
      <footer role="contentinfo">
 

    <?php echo $site->Copyright()->kirbytext() ?>
    
  </footer>
  </div>
</div>
</body>

<script>
var figure = document.getElementsByTagName("img");
for (var i=0; i < figure.length; i++){
       figure[i].setAttribute("onclick", "window.open(this.src)");
    }
</script>

</html>