<div class="panel tinyAgendaPanel">
  <div class="panel-heading">
    <h3 class="panel-title">
      <span class="glyphicon glyphicon-pushpin"></span>
      <span class="title-text">{{ $item->title }}</span>
      <span class="label dateLabel pull-right">{{ $item->date->format('d-m-Y') }}</span>
    </h3>
  </div>
  <div class="panel-body">{{ $item->contents }}</div>
</div>
