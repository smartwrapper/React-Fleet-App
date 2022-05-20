<!-- full width banner -->
{{-- {{  dd($data['homeBanners'][0]->gallary) }} --}}
@if(count($data['homeBanners']) > 0)
<div class="p-banners-content pro-content">
        
    <div class="fullwidth-banner" style="background-image: url('{{ asset('gallary').'/'.$data['homeBanners'][1]->gallary->name }}');">
        
   <div class="parallax-banner-text">
    <?php 
      print stripslashes($data['homeBanners'][1]->content);
    ?>
  </div>
    </div>                                                      
  
</div> 
@endif