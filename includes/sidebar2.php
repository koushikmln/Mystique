<div class="sidebar">
    <h2>Welcome <br/><?php echo $_SESSION['nick']; ?>!</h2>
    <div style='background: #eee; height: 100%; padding: 10px; padding-bottom: 20px;'>
        <h4 style='color: #d9534f;'>Messages from the admin:</h4>
        <p><?php $r=DB::findOnefromQuery("select message from message");echo $r['message']; ?><br/>Press CTRL+U to view page source</p>
        <hr style='background: #d9534f; height: 2px;' />
        &nbsp;You should refresh the page to see the latest hints and messages from the admin.
    </div>
    <div class="ribbonright"></div><div class="ribbonleft"></div>
</div>
