<!-- <div class="card bg-success px-4 py-3">
  <h4 class="m-0"> Product Category</h4>
  <hr>
  <ul class="category_list">
    <?php foreach ($main_category_list as $mcat_list1) {
      $category_name = str_replace(' ','-',$mcat_list1->category_name);
      $category_name = str_replace('/','-',$category_name);
    ?>
      <li class="">
        <a class="text-white" href="<?php echo base_url(); ?>Category/<?php echo $mcat_list1->category_id; ?>/<?php echo $category_name; ?>"><?php echo $mcat_list1->category_name; ?></a>
      </li>
    <?php } ?>
  </ul>
</div>

<br>
<div class="card bg-danger p-30">
<a href="<?php echo base_url(); ?>KB-Membership">  <h5 class="text-white">Kirana Bhara Club Membership Join Now</h5> </a>
</div> -->



<div class="card side-panel  px-4 py-3">
  <div class="div-filter-scroll">
  <h4 class="f-16 title">Categories</h4>
  <?php foreach ($main_category_list as $mcat_list1) {
    $category_name = str_replace(' ','-',$mcat_list1->category_name);
    $category_name = str_replace('/','-',$category_name);
  ?>
  <a class="" href="<?php echo base_url(); ?>Category/<?php echo $mcat_list1->category_id; ?>/<?php echo $category_name; ?>">
  <p class="small-st ml-1 ">
    <?php echo $mcat_list1->category_name; ?>
  </p>
  </a>
  <?php } ?>
  <!-- <p class="small-st ml-3">Cookies, Rusk & Khari (23)</p>
  <p class="small-st ml-3">Rusks (4)</p> -->
  </div>

  <div class="div-filter-scroll mt-4">
  <h4 class="f-16 title">Sub Categories</h4>
  <?php foreach ($sub_category_list as $sub_category_list1) {
    $sub_category_name = str_replace(' ', '-', $sub_category_list1->category_name);
    $sub_category_name =  preg_replace('/[^A-Za-z0-9\-]/', '-', $sub_category_name);
  ?>
<a href="<?php echo base_url(); ?>Category/<?php echo $sub_category_list1->category_id; ?>/<?php echo $sub_category_name; ?>">
  <p class="small-st ml-1 ">
    <?php echo $sub_category_list1->category_name; ?>
  </p>
  </a>
  <?php } ?>
  </div>



  <h4 class="f-16 mt-4 title">Brands</h4>
  <div class="checkbox-filter-scroll">
  <div class="form-group has-search">
    <span class="fa fa-search form-control-feedback"></span>
    <input type="text"  id="filter" class="form-control form-control-sm" placeholder="Search by Brand">
  </div>
    <div class="brand">
      <?php foreach ($brand_list as $brand_list1) {
        $brand_name = str_replace(' ', '-', $brand_list1->manufacturer_name);
        $brand_name =  preg_replace('/[^A-Za-z0-9\-]/', '-', $brand_name);
      ?>
    <p class="small-st"><input type="checkbox" class="mr-2" value=""><?php echo $brand_name; ?></p>
    <?php } ?>
  </div>
  </div>

  <!-- <h4 class="f-16 mt-3 title">Price</h4>
  <div class="checkbox-filter">
    <p class="small-st"><input type="checkbox" class="mr-2" value="">Rs. 21 to 50 (1)</p>
    <p class="small-st"><input type="checkbox" class="mr-2" value="">Rs. 51 to 100 (8)</p>
    <p class="small-st"><input type="checkbox" class="mr-2" value="">Rs. 101 to 500 (1)</p>
    <p class="small-st"><input type="checkbox" class="mr-2" value="">More than Rs. 501 (1)</p>

  </div>

  <h4 class="f-16 mt-3 title">Discount</h4>
  <div class="checkbox-filter">
    <p class="small-st"><input type="checkbox" class="mr-2" value="">10% to 20%</p>
    <p class="small-st"><input type="checkbox" class="mr-2" value="">More than 25%</p>
  </div>

  <h4 class="f-16 mt-3 title">Pack Size</h4>
  <div class="checkbox-filter-scroll">
    <div class="form-group has-search">
      <span class="fa fa-search form-control-feedback"></span>
      <input type="text"  id="filter2" class="form-control form-control-sm" placeholder="Search by Brand">
    </div>
    <div class="pack">
    <p class="small-st"><input type="checkbox" class="mr-2" value="">2x150 g Multipack</p>
    <p class="small-st"><input type="checkbox" class="mr-2" value="">3x75 g Multipack</p>
    <p class="small-st"><input type="checkbox" class="mr-2" value="">Combo 2 Items</p>
    <p class="small-st"><input type="checkbox" class="mr-2" value="">200 g</p>
    <p class="small-st"><input type="checkbox" class="mr-2" value="">200 g Pouch</p>
    <p class="small-st"><input type="checkbox" class="mr-2" value="">250 g</p>
    <p class="small-st"><input type="checkbox" class="mr-2" value="">200 g</p>
    <p class="small-st"><input type="checkbox" class="mr-2" value="">150 g</p>
  </div>
  </div> -->


</div>

<br>
<div class="card p-30">
<a class="mb-3" href="<?php echo base_url(); ?>">  <p class="medium-st title active">Grocery Store</p> </a>
<a class="mb-3" href="<?php echo base_url(); ?>">  <p class="small-st ">About</p> </a>
<a class="mb-3" href="<?php echo base_url(); ?>">  <p class="small-st ">Privacy Policy</p> </a>
<a class="mb-3" href="<?php echo base_url(); ?>">  <p class="small-st ">Terms & Condition</p> </a>

</div>

<script type="text/javascript">
jQuery("#filter").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    jQuery(".brand *").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });

  jQuery("#filter2").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      jQuery(".pack *").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
</script>
