<?php
include 'config.php';
$title = "Mystique :: Leaderboard";
include INCLUDE_PATH . "header.php";
include INCLUDE_PATH . "nav.php";
?>
<div class="containerlead">
  <center>
    <table class='table table-hover' style='width:700px;background: #fff;' summary="Results">
      <tr class='success'>
        <th scope="col"><strong><center>Rank</center></strong></th>
        <th scope="col"><strong><center>Nickname</center></strong></th>
        <th scope="col"><strong><center>Score</center></strong></th>
        <th scope="col"><strong><center>Level</center></strong></th>
      </tr>
      <?php
      $rank = 1;
      $query = "select ua.nickname, ua.levelcode, coalesce(levelcode*(levelcode+1)/2-sum(wa.level)-levelcode,levelcode*(levelcode+1)/2-levelcode) score from usermaster ua left join wronganswers wa on wa.nickname=ua.nickname and wa.answer='SKIP98756' 
                where levelcode > 1 
                group by ua.nickname
                having score>0
                order by score DESC, ua.updatedOn ASC";
      $result = DB::findAllFromQuery($query);
      foreach ($result as $row) {
        if (in_array($row['nickname'], $admins))
continue;
        echo "<tr><td><center>";
        echo $rank++ . "</center></td><td><center>";
        if (isset($_SESSION['id']) && in_array($_SESSION['nick'], $admins))
          echo "<a target='_blank' href='" . SITE_URL . "admin.php?nk=" . $row['nickname'] . "'>";
        if (isset($_SESSION['id']) && $row['nickname'] == $_SESSION['nick']) {
          echo "<strong><font color='#428bca'>" . $row['nickname'] . "</font></strong>";
        } else {
          echo $row['nickname'];
        }
        if (isset($_SESSION['id']) && in_array($_SESSION['nick'], $admins))
          echo "</a>";
        echo "</center></td><td><center>";
        echo $row['score'] . "</center></td><td><center>";
        echo $row['levelcode'];
        echo "</center></td>";
      }
      ?>
    </table>
  </center>
</div>
<br />
<strong><font color="white">These results are not final. Admin discretion will prevail in deciding the winners. But for that, everyone must finish Mystique!<br/>Incase of any discrepancies, please contact us in the <a href="https://apps.facebook.com/forumforpages/page/131461430229574" target="_blank">forums</a>.</font></strong>
<?php include INCLUDE_PATH . "footer.php"; ?>