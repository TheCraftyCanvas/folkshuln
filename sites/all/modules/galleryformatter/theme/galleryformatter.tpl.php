<?php
/**
 * @file
 * Template file for the galleryformatter default formatter
 */

/**
 * Only edit this file for switching order of the slides info, adding classes or other minor changes within the overall html structure.
 * KEEP the original html structure or you'll run into problems with the JS.
 * IDs on the slides and the hash for the thumb links MUST be there for the gallery to function.
 * width and height must be set inline for gallery-slides container, the gallery-thumbs, and the li's inside it.
 *
 * Available variables:
 *
 * $gallery_slide_height
 * $gallery_slide_width
 * $gallery_thumb_height
 * $gallery_thumb_width
 * $gallery_slides - Array containing all slide images, a link to the original and its sanatized title & description ready to print
 * $gallery_thumbs - Array containing all thumbnail images ready to print
 * $link_to_full -  BOOLEAN wether or not we are linking slides to original images
 */
 $gallery_thumbtotal = 570;
?>
<?php if (count($gallery_slides) > 0): ?>
<div class="galleryformatter galleryview <?php print $gallery_style ?>">
  <div class="gallery-slides" style="width: <?php print $gallery_slide_width; ?>px; height: <?php print $gallery_slide_height; ?>px;">
    <div class="gallery-frame">
      <ul>
      <?php foreach ($gallery_slides as $id => $data): ?>
        <li class="gallery-slide" id="<?php print $data['hash_id']; ?>">
          <?php print $data['image']; ?>
          <?php if ((!empty($data['title'])) || (!empty($data['description']))): ?>
            <div class="panel-overlay">
              <div class="overlay-inner">
                <?php if (!empty($data['title'])): ?><h3><?php print $data['title']; ?></h3><?php endif; ?>
                <?php if (!empty($data['description'])): ?><p><?php print $data['description']; ?></p><?php endif; ?>
              </div>
            </div>
          <?php endif; ?>
        </li>
      <?php endforeach; ?>
      </ul>
    </div>
  </div>
  <?php if($gallery_thumbs): ?>
  <div class="gallery-thumbs" style="width: <?php print $gallery_thumbtotal; ?>px;">
    <div class="wrapper">
      <ul>
        <?php foreach ($gallery_thumbs as $id => $data): ?>
          <li class="slide-<?php print $id; ?>" style="width: <?php print $gallery_thumb_width; ?>px;"><a href="#<?php print $data['hash_id']; ?>"><?php print $data['image']; ?></a></li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
  <?php endif; ?>
</div>
<?php endif; ?>
