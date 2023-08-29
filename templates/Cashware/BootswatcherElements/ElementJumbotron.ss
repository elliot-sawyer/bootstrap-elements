<% if ContainerSize = "fixed" %>
<div class="container"><div class="row"><div class="col">
<% else_if ContainerSize = "fluid" %>
<div class="container-fluid"><div class="row"><div class="col">
<% end_if %>

<div class="p-$PaddingSize mb-$MarginSize bg-$Theme rounded-$BorderRadius text-$TextColor">
    <div class="container-fluid py-5">
        <% if ShowTitle %>
        <h1 class="display-5 fw-bold">$Title</h1>
        <% end_if %>
        <p class="col-md-8 fs-4">
        $HTML
        </p>
        <% if Button %>
        <% if ButtonSize == 'block' %>
        <a href="$Button.LinkURL" class="btn btn-$ButtonTheme d-block" type="button" $Button.TargetAttr>$Button.Title</a>
        <% else %>
        <a href="$Button.LinkURL" class="btn btn-$ButtonTheme btn-$ButtonSize" type="button" $Button.TargetAttr>$Button.Title</a>
        <% end_if %>
        <% end_if %>
    </div>
</div>

<% if ContainerSize != 'edge-to-edge' %>
</div></div></div>
<% end_if %>
