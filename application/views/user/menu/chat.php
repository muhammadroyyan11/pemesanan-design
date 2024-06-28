<div class="container">
    <!-- msg-header section starts -->
    <!-- msg-header section ends -->

    <!-- Chat inbox  -->
    <div class="chat-page">
        <div class="msg-inbox">
            <div class="chats">
                <!-- Message container -->
                <div class="msg-page">
                    <!-- Incoming messages -->

                    <?php
                    foreach ($data as $key => $d) {
                        if ($d['sender_id'] == $_SESSION['pembeli']['id']) { ?>
                            <div class="received-chats">

                                <div class="received-msg">
                                    <div class="received-msg-inbox">
                                        <p>
                                            
                                            <?= $d['message'] ?>
                                        </p>
                                        <span class="time"><?= $d['message_date_time'] ?></span>
                                    </div>
                                </div>
                            </div>
                        <?php } else if (($d['sender_id'] == 1)) { ?>
                            <div class="outgoing-chats">
                                
                                <div class="outgoing-msg">
                                    <div class="outgoing-chats-msg">
                                        <p>
                                        <?= $d['message'] ?>
                                        </p>

                                        <span class="time"><?= $d['message_date_time'] ?></span>
                                    </div>
                                </div>
                            </div>
                    <?php  }
                    }
                    ?>


                    <!-- Outgoing messages -->


                </div>
            </div>

            <!-- msg-bottom section -->

            <div class="msg-bottom">
                <form action="<?= site_url('user/send_msg') ?>" method="POST">

                    <div class="input-group">
                        <input type="text" class="form-control" name="send_msg" placeholder="Write message..." />

                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-send">kirim</i>
                            </span>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>