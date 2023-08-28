<!-- Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginModalLabel">Login</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="assets/partials/_handleSignup.php" method="POST">
        <div class="mb-3">
              <label for="username" class="form-label">Firstname(s)</label>
              <input type="text" class="form-control" id="username" name="firstName" required>
          </div>
          <div class="mb-3">
              <label for="username" class="form-label">Lastname</label>
              <input type="text" class="form-control" id="username" name="lastName" required>
          </div>
          
          <div class="mb-3">
              <label for="username" class="form-label">Student NO.</label>
              <input type="text" class="form-control" id="username" name="studentno" required>
          </div>
          <div class="mb-3">
              <label for="username" class="form-label">University</label>
              
              <select class="form-control" id="username" name="university" required="">
                    <option selected="true" disabled="disabled">--- Select University --</option>  
                          <?php 
                      

                        $query="SELECT * FROM `university` order by uniName";
                        $result=$conn->query($query);

                        while($row1=$result->fetch_array()){
                        echo "<option value='" .$row1['uniID']. "'>" . $row1['uniName']. "</option>";
                        }
                        
                        ?>
                                            </select>
          </div>

          <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input type="text" class="form-control" id="username" name="username" required>
          </div>
          <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password" required>
              
          </div>
          <button type="submit" class="btn btn-success" name="signup">Sign Up</button>
        </form>
      </div>
      <div class="modal-footer">
        <!-- Add anything here in the future -->
      </div>
    </div>
  </div>
</div>