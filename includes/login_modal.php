<div class="modal fade" id="login_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h2 class="modal-title" id="myModalLabel">Login</h2>
      </div>
      <form class="form-horizontal" id="login_form">
        <div class="modal-body">
          <fieldset>

            <!-- Nick input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="nick">Nickname</label>  
              <div class="col-md-6">
                <input id="nick" name="nick" type="text" placeholder="For The Leaderboard" class="form-control input-md" required>
              </div>
            </div>
            <!-- Password input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="password">Password</label>
              <div class="col-md-6">
                <input id="password" name="password" type="password"  class="form-control input-md" required>
              </div>
            </div>
          </fieldset>
          <div id="login_alert" class="alert alert-success" role="alert"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" id="login_submit" class="btn btn-primary">Login</button>
        </div>
      </form>
    </div>
  </div>
</div>