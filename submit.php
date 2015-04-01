
<?php
session_start();
$id = $_GET['id'];
if(!isset($_SESSION['valid_user'])){
    // echo '<script>alert("没有登陆！");</script>';    
}
$username = $_SESSION['valid_user'];

?>
<html>
  <head>
    <?php require('../header.inc.php');?>
    <script src="/assets/js/jQuery.headroom.min.js" type="text/javascript"></script>
    <script src="/assets/js/jquery.min.js" type="text/javascript"></script>
    <script charset="utf-8">
      window.onload = function () {
        var textareas = document.getElementsByTagName('textarea');
        var count = textareas.length;
        for(var i=0;i<count;i++){
          textareas[i].onkeydown = function(e){
            if(e.keyCode == 9 || e.which == 9) {
                e.preventDefault();
                var s = this.selectionStart;
                this.value = this.value.substring(0, this.selectionStart) + "\t" + this.value.substring(this.selectionEnd);
                this.selectionEnd = s+1; 
            }
          }
        }
      }
    </script>
    <style>
      .submitform{
        margin-top: 20px;
      }
    </style>
  </head>
  <?php require('../navi.inc.php');?>
  <body>
    <header id="head" class="secondary"></header>

    <div class="container">
      <form class="form-horizontal submitform" role="form" action="save.php" method="post" name="form" id="form" align="center">
        <fieldset disabled>
        <div class="form-group text-center">
          <label for="inputID" class="col-sm-2 control-label">Problem ID</label>
          <div class="col-sm-4">
            <?php echo '<input type="text" class="form-control" id="id" name="id" value="'.$id.'">'?>
          </div>
        </div>
        <div class="form-group text-center">
          <label for="inputUsername" class="col-sm-2 control-label">User Name</label>
          <div class="col-sm-4">
            <?php echo '<input type="text" class="form-control" id="username" name="username" value="'.$username.'">'?>
          </div>
        </div>
        </fieldset>
        <div class="form-group">
          <label for="inputPassword" class="col-sm-2 control-label">Language</label>
          <div class="col-sm-4">
            <select name="language_sel" class="form-control">
              <option value="cpp">C/C++</option>
              <option value="java">JAVA</option>
              <option value="py">Python</option>
              <option value="php">PHP</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="inputPassword" class="col-sm-2 control-label">Code</label>
          <div class="col-sm-10">
            <textarea placeholder="enter your code" wrap="soft" rows="40" cols="80" name="textarea" class="form-control"></textarea>
          </div>
        </div>
        <div class="form-group">
          <label for="checkCode" class="col-sm-2 control-label"><img name="checkcode" src = "checkcode.php" onclick="this.src='checkcode.php?aa='+Math.random()"/></label>
          <div class="col-sm-4">
            <input type="text" class="form-control" id="checkCode" name="checkCode" placeholder="Check Code">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-1">
            <button type="submit" class="btn btn-default">Submit</button>
          </div>
        </div>
      </form>
  </div>
    <?php require('../footer.inc.php');?>
  </body>
</html>
