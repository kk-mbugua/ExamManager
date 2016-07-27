

<div class="section">
  <div class="container">
      <br>
  </div>
</div>
<div class="section">
  <div class="container">
    <div class="row">
      <div class="col-md-4 ">
          <a data-toggle="modal" data-target="#myModal">
           <div class="panel panel-default panel-faded">
                <div class="panel-body">
                    <img src="assets/img/newpatient.png" class="img-responsive simple-menu">
                    <h2 class="text-center">Add New Exam</h2>
                </div>
           </div>
          </a>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Options</h4>
      </div>
      <div class="modal-body">
        <a href="newpatient" class="btn btn-default btn-block btn-large">New patient</a>
        <a onclick="document.getElementById('searc').style.display='block';" class="btn btn-default btn-block btn-large">Existing patient</a>
        <div id="searc" style="display:none;">
        <form role="form" method="post" action="patients">
              <div class="form-group">
                <div class="input-group">
                  <input type="text" class="form-control" name="search" placeholder="Enter Patient Name">
                  <span class="input-group-btn">
                    <button class="btn btn-default" type="submit">search</button>
                  </span>
                </div>
              </div>
            </form>
            </div>
      </div>
    </div>
  </div>
</div>
      </div>
      <div class="col-md-4">
          <a href="schedule">
           <div class="panel panel-default panel-faded">
                <div class="panel-body">
                    <img src="assets/img/calendar.png" class="img-responsive simple-menu">
                    <h2 class="text-center">Exam Schedule</h2>
                </div>
           </div>
          </a>
      </div>
      <div class="col-md-4 ">
          <a href="patients">
           <div class="panel panel-default panel-faded">
                <div class="panel-body">
                    <img src="assets/img/patient.png" class="img-responsive simple-menu">
                    <h2 class="text-center">view patients</h2>
                </div>
           </div>
          </a>
      </div>
      </div>
    </div>
  </div>
</div>