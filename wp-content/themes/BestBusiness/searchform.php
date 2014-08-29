<form method="get" id="searchform" action="<?php echo home_url() ; ?>/">
<div class="col-md-4 pull-right search-box-2-out-side">

  <div class="search-box-2">           
    <div class="input-group">

<input type="text" value="<?php echo esc_html($s, 1); ?>" name="s" id="s" maxlength="33" class="form-control" />

<span class="input-group-btn">
<input type="submit" name="search" id="search" class="search-box-btn btn btn-default" value="Search" />

</span>
</div></div></div>
</form>

