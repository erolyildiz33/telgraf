 <div class="row">
        <div class="col-lg-6">

   <div class="card">
            <div class="card-body">
              <h5 class="card-title"><?=@$page_title;?></h5>

              <!-- General Form Elements -->
              <form action="<?=base_url('home');?>/updateprofile" method="post">
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Appid</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="appid" value="<?=@$user->appid;?>">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Api Hash</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="apihash" value="<?=@$user->apihash;?>">
                  </div>
                </div>
                <div class="row mb-3">
                   <label for="inputText" class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-success">Update</button>
                  </div>
                </div>

              </form><!-- End General Form Elements -->

            </div>
          </div>

        </div>


      </div>