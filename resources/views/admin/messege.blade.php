
<?php $messeges=Session::get('messeges')?>
  @if(count($messeges)>0)
   <div class="container">
      <ul>
            <div class="container alert alert-danger">
               {{$messeges}}
              {{Session::put('messeges',null)}}
            </div>
            <br>
      </ul>
   </div>
   @endif
