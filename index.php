<!DOCTYPE html>
<html>
    <head>
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <title>Erebos</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!-- <link href="https://fonts.googleapis.com/css?family=Inconsolata:400,700|VT323" rel="stylesheet"> -->
        <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body>
        <!-- <div class="chrono">
            <a href="#">chrono</a>
            <span id="chronotime">0:00:00:00</span>
            <form name="chronoForm">
                <input type="button" name="startstop" value="start!" onClick="chronoStart()" />
                <input type="button" name="reset" value="reset!" onClick="chronoReset()" />
            </form>
        </div> -->

        <div class="debug float-right"></div>
        <div class="msg-group">
            <!-- <ul>">
                <li>Lorem ipsum dolor sit.</li>
            </ul> -->
        </div>
        
        <div class="input-group">
            <button class="before-input" disabled></button>
            <input id="input-box" class="form-control" rows="1" placeholder="Command Line" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" autofocus>
        </div>
        
        <!-- javascript -->
        <script src="assets/js/lib/jquery.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="ajax/jsSide.js"></script> 
        <script src="assets/js/chrono.js"></script>
    </body>
</html>