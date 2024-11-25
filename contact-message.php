<?php

if (!$_SESSION["mail_error"] && !$_SESSION["mail_success"]) :
?>
  <div class="notification">
    <p></p>
  </div>
<?php

elseif ($_SESSION["mail_success"]) :
?>
  <div class="notification success">
    <p><b>Tin nhắn đã gửi thành công</p>
  </div>
<?php
  unset($_SESSION["mail_success"]);

elseif ($_SESSION["mail_error"]) :
?>
  <div class="notification error">
    <p><b>Lỗi.</b>Tin nhắn chưa gửi.</p>
  </div>
<?php
  unset($_SESSION["mail_error"]);
endif;

?>
