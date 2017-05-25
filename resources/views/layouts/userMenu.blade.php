<!-- User Account Menu -->
@if(Auth::check())
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">

                <p>
				  <small>Email: {{ Auth::user()->email }}</small>
				  <small>Phone: {{ Auth::user()->phone }}</small>
                </p>
              </li>
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="/users/edit/{{ Auth::user()->id }}" class="btn btn-default btn-flat">Update Info</a>
                </div>
                <div class="pull-right">
				<a class="btn btn-default btn-flat" href="/Logout">
                                            Logout
                                        </a>				
                </div>
              </li>
            </ul>
          </li>
@else
<li><a href="/login">Login</a></li>
@endif
