<style>
    .start_message {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 100vw;
        height: 100vh;
        max-width: 800px;
        max-height: 80%;
        background: white;
        z-index: 999;
        padding: 5px;
        text-align: center;
        border-radius: 24px;
        padding-top: 27px;
        box-shadow: 0px 5px 5px rgb(0 0 0 / 30%);
    }

    .start_message .skip_button {
        width: 50px;
        height: 50px;
        position: absolute;
        bottom: 10px;
        left: 10px;
        z-index: 999;
        color: green;
        cursor: pointer;
    }
</style>

<div class="start_message">
    <h1><?php echo $start_message[0]['name']; ?></h1>
    <div class="skip_button">
        Close
    </div>
    <div class="embla">
        <div class="embla__viewport">
            <div class="embla__container">
                <?php
                foreach ($start_message as $message) {
                ?>
                    <div class="embla__slide">
                        <div class="embla__slide__inner">
                            <div class="slide_container">
                                <div class="image_container">
                                    <img src="uploads/<?php echo $message['image']; ?>" />
                                </div>
                                <h1><?php echo $message['title']; ?></h1>
                                <p><?php echo $message['description']; ?></p>
                            </div>
                        </div>
                    </div>

                <?php
                }
                ?>


            </div>
        </div>
    </div>
    <div class="embla__dots"></div>

    <script type="text/template" id="embla-dot-template">
        <button class="embla__dot" type="button"></button>
            </script>
</div>
<script src="layout/js/embla.js"></script>
<script>
    const start_message_container = document.querySelector('.start_message');
    const skip_button = start_message_container.querySelector('.skip_button');
    skip_button.addEventListener('click', function() {
        start_message_container.style.display = 'none';
    });
</script>