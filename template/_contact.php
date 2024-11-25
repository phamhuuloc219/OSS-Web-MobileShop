<section class="section-contact">
    <div class="container">
      <div class="contact-form">
        <h2>Contact us</h2>
        <form class="form-box" method="POST" action="email.php">
          <div class="input-box w50">
            <input type="text" name="name" required>
            <span>Tên</span>
          </div>
          <div class="input-box w50">
            <input type="text" name="email" required>
            <span>E-mail</span>
          </div>
          <div class="input-box w100">
            <textarea name="message" required></textarea>
            <span>Xin gửi lời nhắn...</span>
          </div>
          <div class="input-box w100 message">
            <?php include 'contact-message.php'; ?>
            <input class="button" type="submit" type="reset" value="Gửi tin nhắn">
          </div>
      </div>
    </div>
    </div>
  </section>