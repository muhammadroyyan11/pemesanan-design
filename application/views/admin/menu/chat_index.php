<div class="col-md-12" id="chatSection">
    <!-- DIRECT CHAT -->
    <div class="box box-warning direct-chat direct-chat-primary">
        <div class="box-header with-border">
            <h3 class="box-title" id="ReciverName_txt">asdad</h3>

            <div class="box-tools pull-right">
                <span data-toggle="tooltip" title="Clear Chat" class="ClearChat"><i class="fa fa-comments"></i></span>

            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <!-- Conversations are loaded here -->
            <div class="direct-chat-messages" id="content">
                <!-- /.direct-chat-msg -->

                <div id="dumppy"></div>


            </div>
            <!--/.direct-chat-messages-->

        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <!--<form action="#" method="post">-->
            <div class="input-group">


                <input type="hidden" id="Sender_Name" value="admin">
                <input type="hidden" id="Sender_ProfilePic" value="admin">

                <input type="hidden" id="ReciverId_txt">
                <input type="text" name="message" placeholder="Type Message ..." class="form-control message">
                <span class="input-group-btn">
                    <button type="button" class="btn btn-info waves-effect waves-light btnSend" id="nav_down">Sent</button>

                </span>
            </div>
            <!--</form>-->
        </div>
        <!-- /.box-footer-->
    </div>
    <!--/.direct-chat -->
</div>


