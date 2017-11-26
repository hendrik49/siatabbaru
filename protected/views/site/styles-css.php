	<style>
	  html, body {
	  font-family: Arial, sans-serif;
	  background-image: url(..siatab/images/bgtik.png) no-repeat;
	  background-size: cover;
	  margin: 0;
	  padding: 0;
	  border: 0;
	  position: absolute;
	  height: 100%;
	  min-width: 100%;
	  font-size: 13px;
	  color: #380606;
	  direction: ltr;
	  -webkit-text-size-adjust: none;
	  }
	  button,
	  input[type=button],
	  input[type=submit] {
	  font-family: Arial, sans-serif;
	  font-size: 13px;
	  }
	  a,
	  a:hover,
	  a:visited {
	  color: #427fed;
	  cursor: pointer;
	  text-decoration: none;
	  }
	  a:hover {
	  text-decoration: underline;
	  }
	  h1 {
	  font-size: 20px;
	  color: #262626;
	  margin: 0 0 15px;
	  font-weight: normal;
	  }
	  h2 {
	  font-size: 14px;
	  color: #262626;
	  margin: 0 0 15px;
	  font-weight: bold;
	  }
	   
	  .content {
	  padding: 0 44px;
	  }
	  .main {
	  padding-bottom: 100px;
	  }
	  /* For modern browsers */
	  .clearfix:before,
	  .clearfix:after {
	  content: "";
	  display: table;
	  }
	  .clearfix:after {
	  clear: both;
	  }
	  /* For IE 6/7 (trigger hasLayout) */
	  .clearfix {
	  zoom:1;
	  }
	  .google-header-bar {
	  height: 71px;
	  border-bottom: 1px solid #e5e5e5;
	  overflow: hidden;
	  }
	  .header .logo {
	  background-image: url();
	  background-size: 116px 38px;
	  background-repeat: no-repeat;
	  margin: 17px 0 0;
	  float: left;
	  height: 38px;
	  width: 116px;
	  }
	  .header .logo-w {
	  background-image: url();
	  background-size: 112px 36px;
	  margin: 21px 0 0;
	  }
	  .header .secondary-link {
	  margin: 28px 0 0;
	  float: right;
	  }
	  .header .secondary-link a {
	  font-weight: normal;
	  }
	  .google-header-bar.centered {
	  border: 0;
	  height: 108px;
	  }
	  .google-header-bar.centered .header .logo {
	  float: none;
	  margin: 40px auto 30px;
	  display: block;
	  }
	  .google-header-bar.centered .header .secondary-link {
	  display: none
	  }
	  .google-footer-bar {
	  position: absolute;
	  bottom: 0;
	  height: 35px;
	  width: 100%;
	  border-top: 1px solid #e5e5e5;
	  overflow: hidden;
	  }
	  .footer {
	  padding-top: 7px;
	  font-size: .85em;
	  white-space: nowrap;
	  line-height: 0;
	  }
	  .footer ul {
	  float: left;
	  max-width: 80%;
	  min-height: 16px;
	  padding: 0;
	  }
	  .footer ul li {
	  color: #737373;
	  display: inline;
	  padding: 0;
	  padding-right: 1.5em;
	  }
	  .footer a {
	  color: #737373;
	  }
	  .hidden {
	  height: 0px;
	  width: 0px;
	  overflow: hidden;
	  visibility: hidden;
	  display: none !important;
	  }
	  .banner {
	  text-align: center;
	  }
	  .card {
	  background-color: #f7f7f7;
	  padding: 20px 25px 30px;
	  margin: 0 auto 25px;
	  width: 304px;
	  -moz-border-radius: 2px;
	  -webkit-border-radius: 2px;
	  border-radius: 2px;
	  -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
	  -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
	  box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
	  }
	  .card > *:first-child {
	  margin-top: 0;
	  }
	  .rc-button,
	  .rc-button:visited {
	  display: inline-block;
	  min-width: 46px;
	  text-align: center;
	  color: #444;
	  font-size: 14px;
	  font-weight: 700;
	  height: 36px;
	  padding: 0 8px;
	  line-height: 36px;
	  -moz-border-radius: 3px;
	  -webkit-border-radius: 3px;
	  border-radius: 3px;
	  -o-transition: all 0.218s;
	  -moz-transition: all 0.218s;
	  -webkit-transition: all 0.218s;
	  transition: all 0.218s;
	  border: 1px solid #dcdcdc;
	  background-color: #f5f5f5;
	  background-image: -webkit-linear-gradient(top,#f5f5f5,#f1f1f1);
	  background-image: -moz-linear-gradient(top,#f5f5f5,#f1f1f1);
	  background-image: -ms-linear-gradient(top,#f5f5f5,#f1f1f1);
	  background-image: -o-linear-gradient(top,#f5f5f5,#f1f1f1);
	  background-image: linear-gradient(top,#f5f5f5,#f1f1f1);
	  -o-transition: none;
	  -moz-user-select: none;
	  -webkit-user-select: none;
	  user-select: none;
	  cursor: default;
	  }
	  .card .rc-button {
	  width: 100%;
	  padding: 0;
	  }
	  .rc-button.disabled,
	  .rc-button[disabled] {
	  opacity: .5;
	  filter: alpha(opacity=50);
	  cursor: default;
	  pointer-events: none;
	  }
	  .rc-button:hover {
	  border: 1px solid #c6c6c6;
	  color: #333;
	  text-decoration: none;
	  -o-transition: all 0.0s;
	  -moz-transition: all 0.0s;
	  -webkit-transition: all 0.0s;
	  transition: all 0.0s;
	  background-color: #f8f8f8;
	  background-image: -webkit-linear-gradient(top,#f8f8f8,#f1f1f1);
	  background-image: -moz-linear-gradient(top,#f8f8f8,#f1f1f1);
	  background-image: -ms-linear-gradient(top,#f8f8f8,#f1f1f1);
	  background-image: -o-linear-gradient(top,#f8f8f8,#f1f1f1);
	  background-image: linear-gradient(top,#f8f8f8,#f1f1f1);
	  -moz-box-shadow: 0 1px 1px rgba(0,0,0,0.1);
	  -webkit-box-shadow: 0 1px 1px rgba(0,0,0,0.1);
	  box-shadow: 0 1px 1px rgba(0,0,0,0.1);
	  }
	  .rc-button:active {
	  background-color: #f6f6f6;
	  background-image: -webkit-linear-gradient(top,#f6f6f6,#f1f1f1);
	  background-image: -moz-linear-gradient(top,#f6f6f6,#f1f1f1);
	  background-image: -ms-linear-gradient(top,#f6f6f6,#f1f1f1);
	  background-image: -o-linear-gradient(top,#f6f6f6,#f1f1f1);
	  background-image: linear-gradient(top,#f6f6f6,#f1f1f1);
	  -moz-box-shadow: 0 1px 2px rgba(0,0,0,0.1);
	  -webkit-box-shadow: 0 1px 2px rgba(0,0,0,0.1);
	  box-shadow: 0 1px 2px rgba(0,0,0,0.1);
	  }
	  .rc-button-submit,
	  .rc-button-submit:visited {
	  border: 1px solid #3079ed;
	  color: #fff;
	  text-shadow: 0 1px rgba(0,0,0,0.1);
	  background-color: #4d90fe;
	  background-image: -webkit-linear-gradient(top,#4d90fe,#4787ed);
	  background-image: -moz-linear-gradient(top,#4d90fe,#4787ed);
	  background-image: -ms-linear-gradient(top,#4d90fe,#4787ed);
	  background-image: -o-linear-gradient(top,#4d90fe,#4787ed);
	  background-image: linear-gradient(top,#4d90fe,#4787ed);
	  }
	  .rc-button-submit:hover {
	  border: 1px solid #2f5bb7;
	  color: #fff;
	  text-shadow: 0 1px rgba(0,0,0,0.3);
	  background-color: #357ae8;
	  background-image: -webkit-linear-gradient(top,#4d90fe,#357ae8);
	  background-image: -moz-linear-gradient(top,#4d90fe,#357ae8);
	  background-image: -ms-linear-gradient(top,#4d90fe,#357ae8);
	  background-image: -o-linear-gradient(top,#4d90fe,#357ae8);
	  background-image: linear-gradient(top,#4d90fe,#357ae8);
	  }
	  .rc-button-submit:active {
	  background-color: #357ae8;
	  background-image: -webkit-linear-gradient(top,#4d90fe,#357ae8);
	  background-image: -moz-linear-gradient(top,#4d90fe,#357ae8);
	  background-image: -ms-linear-gradient(top,#4d90fe,#357ae8);
	  background-image: -o-linear-gradient(top,#4d90fe,#357ae8);
	  background-image: linear-gradient(top,#4d90fe,#357ae8);
	  -moz-box-shadow: inset 0 1px 2px rgba(0,0,0,0.3);
	  -webkit-box-shadow: inset 0 1px 2px rgba(0,0,0,0.3);
	  box-shadow: inset 0 1px 2px rgba(0,0,0,0.3);
	  }

	  .secondary-actions {
	  text-align: center;
	  }
	</style>
	<style media="screen and (max-width: 800px), screen and (max-height: 800px)">
	  .google-header-bar.centered {
	  height: 83px;
	  }
	  .google-header-bar.centered .header .logo {
	  margin: 25px auto 20px;
	  }
	  .card {
	  margin-bottom: 20px;
	  }
	</style>
	<style media="screen and (max-width: 580px)">
	  html, body {
	  font-size: 14px;
	  }
	  .google-header-bar.centered {
	  height: 73px;
	  }
	  .google-header-bar.centered .header .logo {
	  margin: 20px auto 15px;
	  }
	  .content {
	  padding-left: 10px;
	  padding-right: 10px;
	  }
	  .hidden-small {
	  display: none;
	  }
	  .card {
	  padding: 20px 15px 30px;
	  width: 270px;
	  }
	  .footer ul li {
	  padding-right: 1em;
	  }
	  .lang-chooser-wrap {
	  display: none;
	  }
	</style>
	
	<style>
	  .banner h1 {
	  font-family: 'Open Sans', arial;
	  -webkit-font-smoothing: antialiased;
	  color: #555;
	  font-size: 42px;
	  font-weight: 300;
	  margin-top: 0;
	  margin-bottom: 20px;
	  }
	  .banner h2 {
	  font-family: 'Open Sans', arial;
	  -webkit-font-smoothing: antialiased;
	  color: #555;
	  font-size: 18px;
	  font-weight: 400;
	  margin-bottom: 20px;
	  }
	  .signin-card {
	  width: 280px;
	  padding: 30px 30px;
	  }
	  .signin-card .profile-img {
	  width: 96px;
	  height: 96px;
	  margin: 0 auto 10px;
	  display: block;
	  -moz-border-radius: 10%;
	  -webkit-border-radius: 10%;
	  border-radius: 10%;
	  }
	  .signin-card .profile-name {
	  font-size: 16px;
	  font-weight: bold;
	  text-align: center;
	  margin: 10px 0 0;
	  min-height: 1em;
	  }
	  .signin-card .profile-email {
	  font-size: 16px;
	  text-align: center;
	  margin: 10px 0 20px 0;
	  min-height: 1em;
	  }
	  .signin-card input[type=email],
	  .signin-card input[type=password],
	  .signin-card input[type=text],
	  .signin-card input[type=submit] {
	  width: 100%;
	  display: block;
	  margin-bottom: 10px;
	  z-index: 1;
	  position: relative;
	  -moz-box-sizing: border-box;
	  -webkit-box-sizing: border-box;
	  box-sizing: border-box;
	  }
	  .signin-card #Email,
	  .signin-card #Passwd,
	  .signin-card .captcha {
	  direction: ltr;
	  height: 44px;
	  font-size: 16px;
	  }
	  .signin-card #Email + .stacked-label {
	  margin-top: 15px;
	  }
	</style>
