<?php 
      $title = 'Edit Record';
      require_once 'includes/header.php'; 
      require_once 'db/conn.php';

      $results = $crud -> getSpecialties();

      if(!isset($_GET['id'])) {
            // echo 'error';
            include 'includes/errormessage.php';
            header("Location: viewrecords.php");
      } else {
            $id = $_GET['id'];
            $attendee = $crud -> getAttendeeDetails($id);
      
      
?>

      <h1 class="text-center">Edit Record</h1>
      
      <!-- Can use method="get" to replace method="post" -->
      <form method="post" action="editpost.php">
            <input type="hidden" name="id" value="<?php echo $attendee['attendee_id'] ?>" />
            <div class="mb-3">
                  <label for="firstname" class="form-label">First Name</label>
                  <input type="text" class="form-control" value="<?php echo $attendee['firstname'] ?>" id="firstname" name="firstname">
            </div>
            <div class="mb-3">
                  <label for="lastname" class="form-label">Last Name</label>
                  <input type="text" class="form-control" value="<?php echo $attendee['lastname'] ?>" id="lastname" name="lastname">
            </div>
            <div class="mb-3">
                  <label for="dob" class="form-label">Date of Birth</label>
                  <input type="text" class="form-control"  value="<?php echo $attendee['dateofbirth'] ?>" id="dob" name="dob">
            </div>
            <div class="mb-3">
                  <label for="specialty" class="form-label">Area of Expertise</label>
                  <input class="form-control" list="datalistOptions" value="<?php echo $attendee['name'] ?>" id="specialty" name="specialty" placeholder="Type to search...">
                  <datalist id="datalistOptions">
                        <!-- The following is inefficient -->
                        <!-- <option value="1">Database</option>
                        <option value="3">Network</option>
                        <option value="5">Software</option>
                        <option value="6">Web</option>
                        <option value="9">AI</option>
                        <option value="10">Game</option>
                        <option value="13">Cloud</option>
                        <option value="14">Research</option> -->
                        <?php while($r = $results -> fetch(PDO::FETCH_ASSOC)) { ?>
                              <option value = "<?php echo $r['specialty_id']?>" <?php if($r['specialty_id'] == $attendee['specialty_id']) echo 'selected' ?> >
                                    <?php echo $r['name'] ?>
                              </option>
                        <?php } ?>
                  </datalist>
            </div>
            <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Email address</label>
                  <input type="email" class="form-control" value="<?php echo $attendee['emailaddress'] ?>" id="exampleInputEmail1" name="exampleInputEmail1" aria-describedby="emailHelp">
                  <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                  <label for="webpage" class="form-label">Personal Webpage</label>
                  <input type="text" class="form-control" value="<?php echo $attendee['webpage'] ?>" id="webpage" name="webpage">
            </div>
            <div class="mb-3">
                  <label for="phone" class="form-label">Contact Number</label>
                  <input type="text" class="form-control" value="<?php echo $attendee['contactnumber'] ?>" id="phone" name="phone" aria-describedby="phoneHelp">
                  <div id="phoneHelp" class="form-text">We'll never share your phone number with anyone else.</div>
            </div>
            
            <br>
            <button type="submit" name="submit" class="btn btn-success" style="height:60px; width:1298px">Save Changes</button>
      </form>

      <?php } ?>

<br>
<br>
<br>
<br>
<br>
<?php require_once 'includes/footer.php'; ?>

    