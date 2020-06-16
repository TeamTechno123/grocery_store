<?php include('header.php'); ?>

<section class="top-membership bg-kb my-3">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
          <h4 class="text-center Merriweather text-white">KBC MEMBERSHIP</h4>
      </div>
    </div>
  </div>
</section>

<section class="pricing">
  <div class="container">
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <div class="card p-3 text-center">
          <h5 class="card-title text-center w-100 mb-3"><span class="bg-danger kb-color memname"><?php echo $membership_info['mem_sch_name']; ?></span></h5>
          <p class="card-text"><strong> <?php echo $membership_info['mem_sch_valid']; ?> Days</strong> Free Membership - Rs. <?php echo $membership_info['mem_sch_amt']; ?> </p>
          <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Feature</th>
                  <th class="wt_50">Status</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($membership_details_list as $list) { ?>
                  <tr>
                    <td><?php echo $list->mem_sch_det_feature; ?></td>
                      <td class='text-center'>
                        <?php
                        if($list->mem_sch_det_status == 0){
                          echo "<span class='fa fa-times text-danger'></span>";
                        } elseif ($list->mem_sch_det_status == 1) {
                          echo "<span class='fa fa-check text-success'></span>";
                        } elseif ($list->mem_sch_det_status == 2) {
                          echo $list->mem_sch_det_val;
                        }
                      ?>
                      </td>
                    </tr>
                <?php } ?>
            </tbody>
          </table>
          <hr>
          <div class="text-center">
            <div class="custom-control custom-checkbox mb-2">
              <input class="custom-control-input" type="checkbox" name="acc_mem_terms" id="acc_mem_terms" value="1">
              <label for="acc_mem_terms" class="custom-control-label">I accept <a href="#" class="text-primary" data-toggle="modal" data-target="#membership_terms">Terms & Conditions</a></label>
            </div>

            <a class="btn btn-success d-none" id="btn_join_mem" href="<?php echo base_url(); ?>KB-Membership-Payment/<?php echo $membership_info['mem_sch_id']; ?>">Join Now</a>
            <button class="btn btn-success" id="btn_join_mem_dis" type="button"  disabled>Join Now</button>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="modal fade" id="membership_terms" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Membership Terms & Conditions</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body m-autoscroll pricing">
        <div class="card p-3" >
            <div class="card-body text-justify">
              <h4 class="text-left">Information:</h4>
              <ul>
                <li class="text-div">All orders for Goods shall be deemed to be an offer by the Buyer to purchase Goods pursuant to these Terms and Conditions and are subject to acceptance by the Seller. The Seller may choose not to accept or cancel an order without assigning any reason.</li>
                <li class="text-div">Kiranabhara.com may change the terms and conditions and disclaimer set out above from time to time. By browsing this website/mobile application you are accepting that you are bound by the current terms and conditions and disclaimer and so you should check these each time you revisit the web site/Mobile application.</li>
                <li class="text-div">Kiranabhara.com may change the format and content of this web site at any time.</li>
                <li class="text-div">Kiranabhara.com may suspend the operation of this website/Mobile application for support or maintenance work, in order to update the content or for any other reason.</li>
                <li class="text-div">Personal details provided to Kiranabhara.com through this website/Mobile application will only be used in accordance with our privacy policy. Please read this carefully before going on. By providing your personal details to us you are consenting to its use in accordance with our privacy policy.</li>
                <li class="text-div">If you have a query or complaint, please contact us at kiranabhara@gmail.com. Kiranabhara.com reserves all other rights</li>
              </ul>
              <h4 class="text-left">Pricing:</h4>
              <ul>
                <li class="text-div">The Company ensures that prices for all goods offered for sale are correct. Prices can change at the time of billing as per their weights.</li>
                <li class="text-div">To get the delivery in 24 hours the minimum bill amount should be above rs. 999 as we do not process orders below rs.999</li>
                <li class="text-div">A customer is eligible for free shipping only if the bill amount is on & above rs.999.</li>
                <li class="text-div">Customer support team is available from 9AM to 7PM. regarding any complaints and delivery issues contact the customer support team on-9588617281</li>
                <li class="text-div">After receiving the delivery if you find any defect in the products please share photos within 24 hours on our Whatsapp number 9588617281 to get a replacement in the next delivery. If a customer is unable to share this, the company is not responsible for his/her replacement.</li>
                <li class="text-div">After confirmation call by customer support team, orders would be processed.</li>
                <li class="text-div">After placing an order on the website/Mobile application the bill amount you get is for reference. Products are billed by their weights and prices may vary.</li>
              </ul>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <a href="<?php echo base_url(); ?>Master/customer/" id="btn_add_cust" type="button" class="btn btn-success" >Add Customer</a> -->
      </div>
    </div>
  </div>
</div>

<?php include('footer.php'); ?>

<script type="text/javascript">
  $('#acc_mem_terms').change(function() {
    if(this.checked) {
      $('#btn_join_mem').removeClass('d-none');
      $('#btn_join_mem_dis').addClass('d-none');
    } else{
      $('#btn_join_mem').addClass('d-none');
      $('#btn_join_mem_dis').removeClass('d-none');
    }
  });
</script>
