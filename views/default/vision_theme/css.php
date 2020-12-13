/*
 * Elgg Connect CSS
 *
 * @author Pranjal Pandey
 *
 */


.elgg-layout-sidebar-left {
  border-top: none;
  padding: 0;
  width: 18rem;
  margin-right: 2rem;
}

.elgg-list .elgg-item{
  box-shadow: 0 1px 2px 0 rgba(0,0,0,0.2);
  margin-top:0.6rem;

}
.elgg-module-aside{
  border:1px solid #e6e6ea;
}

.elgg-module-aside .elgg-head{
background-color:#e6e6ea;
}


.elgg-menu-title-default .elgg-button{
  position: relative;
  float:right;
}

.elgg-breadcrumbs{
   margin:0px !important;
   padding:0px !important;
}



@media (min-width: 1025px) {

  .elgg-page-topbar .elgg-menu-site-default{
  display:none;
}

}

@media (max-width: 1024px) {

.elgg-sidebar-alt{
  display:none;
}
}




.alt_site_menu .elgg-non-link {
  display: none !important;
}

.alt_site_menu .elgg-anchor-icon {
   font-size : 1.3rem;
}
.alt_site_menu .elgg-anchor{
  display: grid;
  grid-template-columns: 20% 90%;
}
.alt_site_menu .elgg-anchor-label{
margin-left:0px !important;
}

.alt_site_menu {
  margin-top: 0.8rem;
  font-size: 1.1rem;
}

.search-input {
  width: 40rem !important;
  //border: 1px solid #dcdcdc !important;
  border-radius: 2rem;
}




<?php
$plugin = elgg_get_plugin_from_id('vision_theme');
?>
.elgg-page-topbar {
  background: <?php echo $plugin->header_color; ?>
}
?>
