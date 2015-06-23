<div class="modal fade" id="reg_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h2 class="modal-title" id="myModalLabel">Register Now</h2>
    </div>
    <form class="form-horizontal" id="register_form">
        <div class="modal-body">
            <fieldset>
                <!-- Name input-->
                <div class="form-group">
                  <label class="col-md-4 control-label" for="name">Name</label>  
                  <div class="col-md-6">
                    <input maxlength="255" id="name" name="name" type="text" placeholder="So That We Know Who You Are" class="form-control input-md" required>
                </div>
            </div>

            <!-- Password input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="password">Password</label>
              <div class="col-md-6">
                <input id="password" name="password" type="password"  class="form-control input-md" required>
            </div>
        </div>

        <!-- Nick input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="nick">Nickname</label>  
          <div class="col-md-6">
              <input id="nick" name="nick" type="text" placeholder="For The Leaderboard" class="form-control input-md" required>
          </div>
      </div>

      <!-- Email input-->
      <div class="form-group">
          <label class="col-md-4 control-label" for="email">Email</label>  
          <div class="col-md-6">
              <input id="email" name="email" type="email" placeholder="So That We Can Contact You" class="form-control input-md" required>
          </div>
      </div>

      <!-- College input-->
      <div class="form-group">
          <label class="col-md-4 control-label" for="college">College</label>  
          <div class="col-md-6">
              <input id="college" name="college" type="text" placeholder="So That We Know Where You're From" class="form-control input-md" required>
          </div>
      </div>

  </fieldset>
  <div id="reg_alert" class="alert alert-success" role="alert"></div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="submit" id="register_submit" class="btn btn-primary">Register</button>
</div>
</form>
</div>
</div>
</div>