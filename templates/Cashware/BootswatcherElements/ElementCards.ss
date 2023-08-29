<% if ContainerSize = fixed %>
<div class="container">
<% else_if ContainerSize = fluid %>
<div class="container-fluid">
<% end_if %>

<div id="element-cards-$ID" class="element-cards row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4<% if WhiteSpaceBetweenCards != default %> d-flex justify-content-$WhiteSpaceBetweenCards<% end_if %>">
    <% loop Cards %>
        <div class="col">
        <a href="$Link.LinkURL" class="link-underline link-underline-opacity-0">
        <div class="card h-100">
            <img src="$Image.FillMax(640,360).URL" class="card-img-top" alt="$Image.Title">
            <div class="card-body">
                <% if ShowTitle %>
                <h5 class="card-title">$Title</h5>
                <% end_if %>
                <p class="card-text">$Content</p>
            </div>
        </div>
        </a>
        </div>
    <% end_loop %>
</div>

<% if ContainerSize != edge-to-edge %>
</div>
<% end_if %>
