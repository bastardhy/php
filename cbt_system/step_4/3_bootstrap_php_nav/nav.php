<?php
    echo"<nav class='navbar navbar-default navbar-fixed-top'>
      <div class='container'>
        <div class='navbar-header'>
          <button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#navbar' aria-expanded='false' aria-controls='navbar'>
            <span class='sr-only'>Toggle navigation</span>
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
          </button>
          <a class='navbar-brand' href='./.'><img src='images/bootstrap.png' height='41'></a>
        </div>
        <div id='navbar' class='navbar-collapse collapse'>
          <ul class='nav navbar-nav'>
            <li class='active'><a href='index.php?modul=home'>Beranda</a></li>
            <li><a href='index.php?modul=icon'>Icon</a></li>
            <li><a href='index.php?modul=form'>Form</a></li>
            <li class='dropdown'>
              <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>Menu Dropdown <span class='caret'></span></a>
              <ul class='dropdown-menu'>
                <li><a href='index.php?modul=tabel'>Tabel</a></li>
                <li><a href='#'>Sub Menu 2</a></li>
              </ul>
            </li>
          </ul>
          <ul class='nav navbar-nav navbar-right'>
            <li><a href='#'>Menu Kanan 1</a></li>
            <li><a href='#'>Menu Kanan 2</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>";
?>