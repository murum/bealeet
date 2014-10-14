<li class="col-xs-12 user-profile-reviews-item">
  <div class="pull-left user-profile-reviews-item-image">
    <img src="{{ $review->writer->present()->gravatar(60) }}" />
  </div>
  <div class="col-sm-9 user-profile-reviews-item-review">
    <h3>{{ $review->writer->username }}</h3>
    <p>
     {{ $review->review }}
    </p>
  </div>
</li>