


<form method=post action="kuvapankki.php" name="redirect">
  <input type=hidden name="jarjestys" value="Uusimmat">
  <?php
  foreach ($_POST as $k=>$d) {
    if ($k === 'textarea') continue;
      echo "<input type=hidden name=\"".strip_tags($k)."\" value=\"".strip_tags($d)."\">";
    }
    echo $k."<br>".$d;
  ?>
  <input type="submit" value="submit" name="mem_type" border="0">
</form>
<script>
window.onload = function(){
  document.forms['redirect'].submit()
  
  }
</script>