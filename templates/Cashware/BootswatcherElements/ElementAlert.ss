<% if not $IsDismissed %>
<div class="alert alert-$Theme alert-dismissible fade show" role="alert" id="element-alert-$ID">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    <% if ShowTitle %>
    <h4 class="alert-heading">$Title</h4>
    <% end_if %>
    $HTML
</div>
<% end_if %>
