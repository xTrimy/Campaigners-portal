</div>
  <div id="pop-up">
    <div class="overlay"></div>
    <div class="window">
      <h1> <i class="fas fa-exclamation-triangle"></i> Warning</h1>
      <p>You're about to delete this item</p>
      <p><b>Are you sure you want to delete that?</b></p>
      <br>
      <div class="xbutton secondary red">Yes</div>
      <div class="xbutton blue">No</div>
    </div>
  </div>
<script type="text/javascript">
  var arrows = document.getElementsByClassName('arrow');
  for(let i = 0; i<arrows.length; i++){
    arrows[i].addEventListener('click',function(){
      if(this.parentElement.classList.contains('open'))
        this.parentElement.classList.remove('open');
      else
        this.parentElement.classList.add('open');
    });
  }
</script>
  </body>
</html>
