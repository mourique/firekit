<style>
  /* container sizes */
  <?php
    if(option('felixf.firekit.containersizes')) :
      $containersizes = option('felixf.firekit.containersizes');
      foreach ($containersizes as $size) :
        echo ".content-{$size['slug']} .content-wrapper { max-width: {$size['max-width']}; width: {$size['width']}; }\n";
        /* output eg:   .content-regular.content-wrapper { max-width: max(60vw, 1500px); width: 90vw; } */
      endforeach;
    endif;
  ?>

  /* theme colors */
  :root {
  <?php
    if(option('felixf.firekit.themecolors')) :
      $themecolors = option('felixf.firekit.themecolors');
      $color_variations = ['first-front', 'first-back', 'second-front', 'second-back', 'third-front', 'third-back'];
      foreach ($themecolors as $color) :
        foreach ($color_variations as $variation) :
          echo "  --{$color['name']}-{$variation}: {$color[$variation]};\n";
          /* output eg:   --default-foreground: #2d3f6d; */
        endforeach;
      endforeach;
    endif;
  ?>
  }

</style>