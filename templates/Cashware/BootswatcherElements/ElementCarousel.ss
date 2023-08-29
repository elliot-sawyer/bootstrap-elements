
<div id="element-carousel-$ID"
    class="carousel slide <% if Transitions == Fade %>carousel-fade<% end_if%>"
    <% if $Autoplay = "Automatic" %>data-bs-ride="carousel" <% end_if%>
    <% if $Autoplay = "Only when selected" %>data-bs-ride="true" <% end_if%>
    >
	<% if $ShowTitle %>
        <h2 class="content-element__title">$Title</h2>
    <% end_if %>
    $HTML

    <% if Indicators == On %>
    <div class="carousel-indicators">
        <% loop Items %>
            <button type="button" data-bs-target="#element-carousel-$Top.ID" data-bs-slide-to="$Pos(0)" <% if $Pos(0) = 0 %>class="active" aria-current="true"<% end_if %>  aria-label="$Title"></button>
        <% end_loop %>
    </div>
    <% end_if %>
    <div class="carousel-inner">
        <% if Items %>
        <% loop Items %>
        <div class="carousel-item <% if Pos == 1 %> active<% end_if %>" <% if $Top.Autoplay != "Off" %>data-bs-interval="$Top.IntervalInMilliseconds" <% end_if %>>
            <img src="$Image.FillMax(1280,720).URL" class="d-block w-100" alt="$Image.Title"> /
        </div>
        <% end_loop %>
        <% end_if %>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#element-carousel-$ID" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#element-carousel-$ID" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
