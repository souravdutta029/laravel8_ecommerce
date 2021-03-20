@foreach ($clinical as $list)
              <div class="homesix-slide-box">
                <div class="homesix-slide-box-img">
                <img src="{{asset('storage/media/banner/'.$list ->image)}}" />
                </div>
                <div class="homesix-slide-box-text">
                <h2>{{$list ->title}}</h2>
                </div>
            </div>
          @endforeach