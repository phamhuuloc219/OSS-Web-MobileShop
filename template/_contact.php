<section class="section-contact">
    <div class="container">
        <div class="contact-form">
            <h2>Liên hệ với chúng tôi</h2>
            <form class="form-box" method="POST" action="email.php">
                <div class="input-box w50">
                    <label for="name">Tên</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="input-box w50">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="input-box w100">
                    <label for="message">Xin gửi lời nhắn...</label>
                    <textarea id="message" name="message" required></textarea>
                </div>
                <div class="input-box w100 message">
                    <?php include 'contact-message.php'; ?>
                    <button class="button" type="submit">Gửi tin nhắn</button>
                    <button class="button" type="reset">Xóa</button>
                </div>
            </form>
        </div>
    </div>
</section>
<style>
  /* General Section Styles */
.section-contact {
    padding: 50px 20px;
    background-color: #f9f9f9;
    font-family: Arial, sans-serif;
}

.section-contact .container {
    max-width: 800px;
    margin: 0 auto;
    background: #ffffff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    padding: 20px;
}

.contact-form h2 {
    font-size: 24px;
    font-weight: bold;
    color: #333;
    text-align: center;
    margin-bottom: 20px;
}

/* Input Box Styles */
.input-box {
    margin-bottom: 20px;
    position: relative;
}

.input-box.w50 {
    width: 48%;
    float: left;
    margin-right: 4%;
}

.input-box.w50:last-child {
    margin-right: 0;
}

.input-box.w100 {
    width: 100%;
    clear: both;
}

/* Input and Textarea */
.input-box input,
.input-box textarea {
    width: 100%;
    padding: 10px 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    color: #333;
    resize: none;
}

.input-box textarea {
    height: 100px;
}

/* Label Styling */
.input-box label {
    position: absolute;
    top: -20px;
    left: 15px;
    font-size: 14px;
    color: #777;
    background: #fff;
    padding: 0 5px;
}

/* Buttons */
.input-box .button {
    display: inline-block;
    padding: 10px 20px;
    font-size: 16px;
    color: #fff;
    background-color: #007BFF;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-right: 10px;
    transition: background-color 0.3s ease;
}

.input-box .button:hover {
    background-color: #0056b3;
}

.input-box .button[type="reset"] {
    background-color: #dc3545;
}

.input-box .button[type="reset"]:hover {
    background-color: #a71d2a;
}

/* Responsive Design */
@media (max-width: 768px) {
    .input-box.w50 {
        width: 100%;
        margin-right: 0;
    }

    .input-box label {
        top: -10px;
        font-size: 12px;
    }
}

</style>