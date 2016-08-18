        <div class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/ExamManager/"><span>Home</span></a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-ex-collapse">
          <ul class="nav navbar-nav navbar-right">
                      <?php if(isset($_SESSION["user_name"])):?>
            <li><a class=" dropdown-toggle navbtn" type="button" id="menu1" data-toggle="dropdown">
                            <?php echo $_SESSION["full_name"]; ?>
                            <span class="caret"></span></a>
                                <ul class=" drop-down dropdown-menu" role="menu" aria-labelledby="menu1">
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="settings">settings</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="logout">logout</a></li>
                                </ul>
            <?php endif; ?>
          </ul>
        </div>
      </div>
    </div>