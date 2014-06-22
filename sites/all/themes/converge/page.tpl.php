<?php
// $Id: page.tpl.php
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="<?php print $language->language; ?>" xml:lang="<?php print $language->language; ?>">

<head>
  <title><?php print $head_title; ?></title>
  <?php print $head; ?>
  <?php print $styles; ?>
  <?php print $setting_styles; ?>
  <!--[if IE 8]>
  <?php print $ie8_styles; ?>
  <![endif]-->
  <!--[if IE 7]>
  <?php print $ie7_styles; ?>
  <![endif]-->
  <!--[if lte IE 6]>
  <?php print $ie6_styles; ?>
  <![endif]-->
  <?php print $local_styles; ?>
  <?php print $scripts; ?>
  <style type="text/css">
  body {
    color:#<?php print $theme_font_color; ?>;
  }
  h1,h2,h3,h4,h5,h6 {
    color:#<?php print $theme_heading_font_color; ?>;
  }
  body #footer-wrapper-main, #footer .form-text, #footer .form-textarea, #footer .form-item label {
    color:#<?php print $theme_footer_font_color; ?>;
  }
  #footer-wrapper-main h1, #footer-wrapper-main h2, #footer-wrapper-main h3, #footer-wrapper-main h4, #footer-wrapper-main h5, #footer-wrapper-main h6 {
    color:#<?php print $theme_footer_heading_font_color; ?>;
  }
  #featured-bg-outer {
    background-color:#<?php print $theme_featured_background; ?>;
	color:#<?php print $theme_featured_color; ?>;
  }
  #featured2 {
    background-color:#<?php print $theme_featured2_background; ?>;
    color:#<?php print $theme_featured2_color; ?>;
  }
  #footer-wrapper-main {
    background-color:#<?php print $theme_footer_background; ?>;
  }
  /* Common selection color */
  ::selection {
    background:#<?php print $theme_selection_bg_color; ?>;
	color:#<?php print $theme_selection_color; ?>;
  }
  ::-moz-selection {
    background:#<?php print $theme_selection_bg_color; ?>;
	color:#<?php print $theme_selection_color; ?>;
  }
  ::-webkit-selection {
    background:#<?php print $theme_selection_bg_color; ?>;
	color:#<?php print $theme_selection_color; ?>;
  }
  /* Common link color */
  a:link, a:visited, li a.active, ul.pager a:link, ul.pager a:visited, .block .terms ul.links li a:link, .block .terms ul.links li a:visited {
    color:#<?php print $theme_link_color; ?>;
  }
  #page a:active, #page a:focus, #page a:hover, a:hover, a:focus, a:active {
    color:#<?php print $theme_link_hover_color; ?>;
  }
  /* Common background color */
  .page ul.pager li.pager-current, .solid-bg .inner, .poll .bar .foreground {
    background:#<?php print $theme_link_color; ?>;
  }
  /* Footer selection color */
  #footer-wrapper-main ::selection {
    background:#<?php print $theme_footer_selection_bg_color; ?>;
    color:#<?php print $theme_footer_selection_color; ?>;
  }
  #footer-wrapper-main ::-moz-selection {
    background:#<?php print $theme_footer_selection_bg_color; ?>;
    color:#<?php print $theme_footer_selection_color; ?>;
  }
  #footer-wrapper-main ::-webkit-selection {
    background:#<?php print $theme_footer_selection_bg_color; ?>;
    color:#<?php print $theme_footer_selection_color; ?>;
  }
  /* Footer link color */
  #footer-wrapper-main a:link, #footer-wrapper-main a:visited, #footer-wrapper-main li a.active, #footer-wrapper-main ul.pager a:link, #footer-wrapper-main ul.pager a:visited, #footer-wrapper-main .block .terms ul.links li a:link, #footer-wrapper-main .block .terms ul.links li a:visited {
    color:#<?php print $theme_footer_link_color; ?>;
  }
  #page #footer-wrapper-main a:active, #page #footer-wrapper-main a:focus, #page #footer-wrapper-main a:hover, #footer-wrapper-main a:hover, #footer-wrapper-main a:focus, #footer-wrapper-main a:active {
    color:#<?php print $theme_footer_link_hover_color; ?>;
  }
  .node ul {
	  display:table;
  }
#featured2-sub-sub-inner {
    padding: 10px 0 5px;
}
.views-view-grid td {
	vertical-align:top;
}
.block div.view div.views-admin-links {
	right:0px;
}
.node h2.title {
    font-size: 1.67em;
    font-weight: bold;
}
#view-id-testimonials-page_1 img {
	float:left;
	margin-right:10px;
	margin-bottom:0px;
}
#view-id-testimonials-page_1 .views-row {
	border-bottom:2px dashed #ccc;
	margin-bottom:20px;
	padding-bottom:20px;
}
#view-id-testimonials-page_1 .views-field-title {
	text-align:right;
}
.breadcrumbs a:link, .breadcrumbs a:visited {
    color: #fff;
}
.breadcrumb {
    color: #fff;
}
#navigation-bar .fusion-edit {
	display:none;
}
.fcaption {
	text-align:center;
	color:#999;
}

.fcaption a {
	text-decoration:none;
}
.header-group-sub-sub-inner, .header-bottom-inner {
    padding: 19px 0;
}
.navigation-bar-inner .inner ul.menu li.first  {
	margin-left:0px;
}
.navigation-bar-inner .inner ul.menu li.last  {
	margin-right:0px;
}
#navigation-bar-inner .inner ul.menu li.last a {
    padding-right: 0px;
}
.navigation-bar-inner .inner ul.menu {
    margin-right: -20px;
}
#breadcrumbs {
    font-size: 1em;
    padding: 0px 0 0;
}
#breadcrumbs-outer {
    padding-bottom: 6px;
}
h1.title {
    color:#FFF;
	font-size:300%;
	font-weight:bold;
	font-family:Georgia, "Times New Roman", Times, serif;
	letter-spacing:normal;
	text-shadow: black 0.1em 0.1em 0.1em;
   
}

.breadcrumbs a:link, .breadcrumbs a:visited {
    background-image:none;
	margin-right: 0px;
	display: inline;
    float:none;
	padding:0px 3px;
	
}
.breadcrumbs a.nlink {
}
#content-region-inner  {
	font-size:14px;
	line-height:1.75em;
}
#content-region-inner  p {
	
}
#page .ddblock-cycle-converge .slide-text a:link, #page.ddblock-cycle-converge .slide-text a:visited, #page.ddblock-cycle-converge .slide-text a:active, #page.ddblock-cycle-converge .slide-text a:hover, #page.ddblock-cycle-converge .slide-text a:focus {
  color: #F3F3F3 !important;
}

.full-node .field-field-image {
    float: left;
    margin: 3px 10px 0px 0;
}
.navigation-bar-inner .inner ul.menu {
    margin-right: -100px;
}
</style>
</head>

<body id="<?php print $body_id; ?>" class="<?php print $body_classes; ?>">
<div id="page-outer" class="page-outer"><div id="page">
  <div id="featured-bg-outer"><div id="featured-bg"><div id="featured-bg-inner"><div id="featured-bg-sub-inner">
  <!-- header-top row: width = grid_width -->
  <?php if ($header_top): ?>
  <div class="header-top-outer">
    <div class="header-top-sub-outer">
      <div class="header-top-sub-sub-outer">
        <div class="header-top-sub-sub-sub-outer collapsible-item">
          <?php print theme('grid_row', $header_top, 'header-top', 'full-width', $grid_width); ?>
        </div>
		<span class="collapse-button">&nbsp;</span>
      </div>
    </div>
  </div>
  <?php endif; ?>

  <!-- header-group row: width = grid_width -->
  <div id="header-group-wrapper" class="header-group-wrapper full-width">
    <div id="header-group" class="header-group row <?php print $grid_width; ?> clearfix">
      <div id="header-group-inner" class="header-group-inner inner clearfix"><div id="header-group-sub-inner" class="header-group-sub-inner inner clearfix"><div id="header-group-sub-sub-inner" class="header-group-sub-sub-inner inner clearfix">

        <!-- navigation_bar row: width = grid_width -->
        <?php print theme('grid_row', $navigation_bar, 'navigation-bar'); ?>

        <?php if ($logo || $site_name || $site_slogan): ?>
        <div id="header-site-info" class="header-site-info block">
          <div id="header-site-info-inner" class="header-site-info-inner inner">
            <?php if ($logo): ?>
            <div id="logo" class="pngfix">
              <a href="<?php print check_url($front_page); ?>" title="<?php print t('Home'); ?>"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" height="<?php print $logo_size[1];?>" width="<?php print $logo_size[0];?>" /></a>
            </div>
            <?php endif; ?>
            <?php if ($site_name): ?>
            <span id="site-name"><a href="<?php print check_url($front_page); ?>" title="<?php print t('Home'); ?>"><?php print $site_name; ?></a></span>
            <?php endif; ?>
            <?php if ($site_slogan): ?>
            <span id="slogan"><?php print $site_slogan; ?></span>
            <?php endif; ?>
          </div><!-- /header-site-info-inner -->
        </div><!-- /header-site-info -->
        <?php endif; ?>

      </div></div></div><!-- /header-group-sub-sub-inner, /header-group-sub-inner, /header-group-inner -->

    </div><!-- /header-group -->
  </div><!-- /header-group-wrapper -->

    <!-- preface-upper-top row: width = grid_width -->
    <?php print theme('grid_row', $preface_upper_top, 'preface-upper-top', 'full-width', $grid_width); ?>
  </div></div></div></div>

  <?php if ($title || $preface_upper_top1): ?>
    <div id="featured2-outer"><div id="featured2"><div id="featured2-inner"><div id="featured2-sub-inner"><div id="featured2-sub-sub-inner">
      <?php if ($title): ?>
        
        <div class="page-title row <?php print $grid_width; ?>">
        <div class="page-title-inner">
         <?php if ($breadcrumb): ?>
          <div id="breadcrumbs-outer"><?php print theme('grid_block', $breadcrumb, 'breadcrumbs'); ?></div>
        <?php endif; ?>
        
        <h1 class="title"><?php print $title; ?></h1>
       
        </div></div>
      <?php endif; ?>
      <!-- preface-upper-top 1 row: width = grid_width -->
      <?php print theme('grid_row', $preface_upper_top1, 'preface-upper-top1', 'full-width', $grid_width); ?>
    </div></div></div></div></div>
  <?php endif; ?>

  <div id="middle-container">

  <?php if ($help || $messages): ?>
  <div id="content-header" class=" full-width">
    <div id="content-header-inner" class="row <?php print $grid_width; ?>">
      <div id="content-header-sub-inner">
        <?php print theme('grid_block', $help, 'content-help'); ?>
        <?php print theme('grid_block', $messages, 'content-messages'); ?>
      </div>
    </div>
  </div>
  <?php endif; ?>

  <!-- preface-top row: width = grid_width -->
  <?php print theme('grid_row', $preface_top, 'preface-top', 'full-width', $grid_width); ?>

  <?php if ($sidebar_first || $preface_bottom || $content_top || $tabs || $content || $content_bottom || $sidebar_last || $postscript_top): ?>
  <!-- main row: width = grid_width -->
  <div id="main-wrapper" class="main-wrapper full-width">
    <div id="main" class="main row <?php print $grid_width; ?>">
      <div id="main-inner" class="main-inner inner clearfix">
        <?php print theme('grid_row', $sidebar_first, 'sidebar-first', 'nested sidebar', $sidebar_first_width); ?>
        <!-- main group: width = grid_width - sidebar_first_width -->
        <div id="main-group" class="main-group row nested <?php print $main_group_width; ?>">
          <div id="main-group-inner" class="main-group-inner inner">
            <?php print theme('grid_row', $preface_bottom, 'preface-bottom', 'nested'); ?>

            <div id="main-content" class="main-content row nested">
              <div id="main-content-inner" class="main-content-inner inner">
                <!-- content group: width = grid_width - (sidebar_first_width + sidebar_last_width) -->
                <div id="content-group" class="content-group row nested <?php print $content_group_width; ?>">
                  <div id="content-group-inner" class="content-group-inner inner">
                    <?php if ($content_top): ?>
                    <div id="content-top" class="content-top row nested">
                      <div id="content-top-inner" class="content-top-inner inner">
                        <?php print $content_top; ?>
                      </div><!-- /content-top-inner -->
                    </div><!-- /content-top -->
                    <?php endif; ?>

                    <?php if ($tabs || $content): ?>
                    <div id="content-region" class="content-region row nested ">
                      <div id="content-region-inner" class="content-region-inner inner">
                        <a name="main-content-area" id="main-content-area"></a>
                        <?php print theme('grid_block', $tabs, 'content-tabs'); ?>
                        <div id="content-inner" class="content-inner block">
                          <div id="content-inner-inner" class="content-inner-inner inner">
                            <?php if ($content): ?>
                            <div id="content-content" class="content-content">
                              <?php print $content; ?>
                            </div><!-- /content-content -->
                            <?php endif; ?>
                          </div><!-- /content-inner-inner -->
                        </div><!-- /content-inner -->
                      </div><!-- /content-region-inner -->
                    </div><!-- /content-region -->
                    <?php endif; ?>

                    <?php print theme('grid_row', $content_bottom, 'content-bottom', 'nested'); ?>
                  </div><!-- /content-group-inner -->
                </div><!-- /content-group -->

                <?php print theme('grid_row', $sidebar_last, 'sidebar-last', 'nested sidebar', $sidebar_last_width); ?>
              </div><!-- /main-content-inner -->
            </div><!-- /main-content -->

            <?php print theme('grid_row', $postscript_top, 'postscript-top', 'nested'); ?>
          </div><!-- /main-group-inner -->
        </div><!-- /main-group -->
      </div><!-- /main-inner -->
    </div><!-- /main -->
  </div><!-- /main-wrapper -->
  <?php endif; ?>

  <!-- postscript-bottom row: width = grid_width -->
  <?php print theme('grid_row', $postscript_bottom, 'postscript-bottom', 'full-width', $grid_width); ?>

  </div>

  <!-- footer row/footer_two: width = grid_width -->
  <?php if ($footer || $footer_two): ?>
  <div id="footer-wrapper-main"><div id="footer-wrapper-inner"><div id="footer-wrapper-sub-inner">
    <?php print theme('grid_row', $footer, 'footer', 'full-width', $grid_width); ?>
    <?php print theme('grid_row', $footer_two, 'footer-two', 'full-width', $grid_width); ?>
  </div></div></div>
  <?php endif; ?>

</div></div><!-- /page-outer, /page -->
<?php print $closure; ?>---
</body>
</html>