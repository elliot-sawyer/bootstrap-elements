<div class="element-fancybox" id="element-gallery-$ID">
    <% if Items %>
    <% loop Items %>
    <a
       data-fancybox="gallery"
       data-src="$Image.FitMax(1024,768).URL"
       >
      <img src="$Image.FitMax(200,150).URL" />
    </a>

    <% end_loop %>
    <% end_if %>
</div>
