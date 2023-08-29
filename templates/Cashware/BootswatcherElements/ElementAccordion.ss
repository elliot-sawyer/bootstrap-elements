<div class="accordion<% if Flush %> accordion-flush<% end_if %>" id="accordion-$ID">
	<% if $ShowTitle %>
        <h2 class="content-element__title">$Title</h2>
    <% end_if %>
    $HTML
    <% loop Items %>
        <div class="accordion-item">
            <h3 class="accordion-header">
                <button class="accordion-button<% if not IsOpen %> collapsed<% end_if %>" type="button" data-bs-toggle="collapse" data-bs-target="#element-accordionitem-$ID" aria-expanded="false" aria-controls="element-accordionitem-$ID">
                    $Title
                </button>
            </h3>
            <div id="element-accordionitem-$ID" class="accordion-collapse collapse <% if IsOpen == 1 %> show <% end_if %>" data-bs-parent="#accordion-$Top.ID">
                <div class="accordion-body">$HTML</div>
            </div>
        </div>
    <% end_loop %>
</div>
