  <div class="navbar">
          <div class="navbar-inner">
                  <ul class="nav pull-right">


                      <li id="fat-menu" class="dropdown">
                          <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
                              <i class="icon-user"></i> {{Auth::user()->username;}}
                              <i class="icon-caret-down"></i>
                          </a>

                          <ul class="dropdown-menu">


                              <!-- <li><a tabindex="-1" class="visible-phone" href="#">Settings</a></li> -->
                              <!-- <li class="divider visible-phone"></li> -->
                              <li><a tabindex="-1" href="/logout">Logout</a></li>
                          </ul>
                      </li>

                  </ul>
                  <a class="brand" href="/"><span class="first">幸福時光</span> <span class="second">官網後台</span></a>
          </div>
      </div>
