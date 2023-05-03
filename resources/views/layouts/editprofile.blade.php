<div class="content-container row">
    <div class="content">
      <form method="POST" class="form-container" id="form-actualizar-user" action="{{route('updateuser')}}">
        @csrf
        <div class="title">
          <span>your data</span>
        </div>

        <div class="inputs-container">

          <div class="row">
            <div class="left">
              <label>{{__('Name:')}}</label>
            </div>
            <div class="right">
              <input class="input" type="text" value="{{auth()->user()->name}}" name='name' />
              <a>{{__('change name')}}</a>
            </div>
          </div>

          <div class="row">
            <div class="left">
              <label>{{__('mail:')}}</label>
            </div>
            <div class="right">
              <input class="input" type="email" value="{{auth()->user()->email}}" name='email' />
              <a>{{__('change mail')}}</a>
            </div>
          </div>

          <div class="row">
            <div class="left">
              <label>{{__('password:')}}</label>
            </div>
            <div class="right">
              <input class="input" type="password" value="{{auth()->user()->password}}" name='password' />
              <a>{{__('change password')}}</a>
            </div>
          </div>

          <div class="button-container" type='submit'>
            <button>{{__('update')}}</button>
          </div>

        </div>

      </form>
    </div>
  </div>
