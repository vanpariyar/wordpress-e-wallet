<?php 
    $current_user_id = get_current_user_id();
    $usermeta = get_user_meta($current_user_id);

    var_dump($usermeta);

    $fname = $usermeta['first_name'][0];
?>

<div class="container mt-5">
    <h2 class="text-center m-5"> Welcome <?php echo $fname?> </h2>
    <div class="row">
        <div class="col-sm-4">
            <div class="card text-center shadow p-3 mb-5 bg-white rounded" style="width:auto">
                <div class="card-body">
                    <h5 class="card-title">Your Balance Is</h5>
                <span><?php echo isset($usermeta['wallet_balance'][0]) ? $usermeta['wallet_balance'][0] : 0;?></span>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card text-center shadow p-3 mb-5 bg-white rounded" style="width:auto">
                <div class="card-body">
                    <h5 class="card-title">Send Money</h5>
                <button class="btn btn-primary send-money">Send Money</button>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card text-center shadow p-3 mb-5 bg-white rounded" style="width:auto">
                <div class="card-body">
                    <h5 class="card-title">Receive Money</h5>
                <button class="btn btn-primary receive-money">Receive Money</button>
                </div>
            </div>
        </div>
    </div>

    <h3 class="text-center m-5"> Transactions </h3>

    <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
            </tr>
            <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
            </tr>
            <tr>
            <th scope="row">3</th>
            <td>Larry</td>
            <td>the Bird</td>
            <td>@twitter</td>
            </tr>
        </tbody>
    </table>
</div>    

<?php
    $blogusers = get_users( [ 'role__in' => [ 'wallet_user'] ] );
    // Array of WP_User objects.
    var_dump($blogusers);
    
?>


<!-- Modal -->
<form action="" class="t-form">
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Add amount</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="form-group">
                <label for="exampleFormControlInput1">Enter Amount</label>
                <input type="nummber" class="form-control" id="exampleFormControlInput1" placeholder="Enter amount" required="required">
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1"></label>
                <select class="form-control" id="exampleFormControlSelect1" required="required">
                <option value="">Select</option>
                <?php
                foreach ( $blogusers as $user ) {
                    if($user->ID == $current_user_id){
                        continue;
                    }
                    echo '<option value="'. esc_html( $user->ID ) .'">' . esc_html( $user->display_name ) . '</option>';
                }
                ?>
                </select>
                <input type="hidden" name="user_id" id="user_id" value="<?php echo $current_user_id;?>">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Send Money</button>
      </div>
    </div>
  </div>
</div>
</form>