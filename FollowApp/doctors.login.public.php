<style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }

    </style>

<div class="container">

      <form class="form-signin" action="login.php" method="post">
        <h2 class="form-signin-heading">Doctor Login</h2>
        <input type="text" class="input-block-level" placeholder="Email address" id="email" name="email">
        <input type="password" class="input-block-level" placeholder="Password" id="password" name="password">
        <input type="hidden" id="type" name="type" value="2">
        <button class="btn btn-large btn-primary" type="submit">Sign in</button>
        
        
      </form>

    </div>