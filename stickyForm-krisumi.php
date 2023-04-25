<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <script src="https://smtpjs.com/v3/smtp.js"></script>
     <script src="https://www.google.com/recaptcha/api.js?render=6LfyCowlAAAAAJaao8gknKfdVPhcMeL7VRYAYRIG"></script>
     <style>
      button * {
        pointer-events: none;
      }
      .loading {
        opacity: 0.5;
      }
      .loading span {
        display: none;
      }
    </style>
</head>
<body>
    <div
      class="sticky-top bg-white stick-form"
      style="max-width: 400px; margin: auto"
    >
      <div class="border p-4">
        <h5 class="text-center">Yes I'm Interested</h5>
        <div class="clearfix d-flex mb-2">
        </div>
        <form id="example" action="visit.php" method="post" onsubmit="sendMail(); return false;">
          <input type="hidden" id="g-token" name="g-token" value="" />
          <input type="hidden" name="propertyName" value="ansalesencia.com"/>
          <div class="form-group">
            <input
              type="text"
              name="namegp"
              id="name"
              class="form-control rounded-0"
              placeholder="Name"
              required
            />
          </div>
          <div class="form-group">
            <input
              type="email"
              name="emailgp"
              id="email"
              class="form-control rounded-0"
              placeholder="Email"
              required
            />
          </div>
          <div class="form-group">
            <input
              type="phone"
              name="mobilegp"
              maxlength="10"
              id="phone"
              class="form-control rounded-0"
              placeholder="Mobile"
              required
            />
          </div>
          <div class="form-group">
            <select name="property" class="form-control" id="property" required>
              <option>Please Select Property Type</option>
              <option value="Residential">Residential</option>
              <option value="Commercial">Commercial</option>
              <option value="Other/Any">Other/Any</option>
            </select>
          </div>
          <input type="hidden" name="currentdate"  value="<?php 
          echo date('Y-m-d')
          ?>"/>
           <div class="form-group">
               <input type="hidden" class="form-control" name="pageurl" value="<?php  
                  if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
                       $url = "https://";   
                  else  
                       $url = "http://";   
                  // Append the host(domain name, ip) to the URL.   
                  $url.= $_SERVER['HTTP_HOST'];   
                  
                  // Append the requested resource location to the URL   
                  $url.= $_SERVER['REQUEST_URI'];    
                    
                  echo $url;  
                  ?>">
            </div>
          <div class="form-group">
            <button class="btn text-white font-weight-bold thm-button btn-block"
              style="background: linear-gradient(to right, #00BDE0, #59c449);" type="submit"><span>Send</span></button>
          </div>
        </form>
      </div>
      <div class="mt-3 border p-3 d-flex justify-content-center align-items-center">
        <div style="width: 20%">
          <a href="https://wa.me/+919999063322" target="_blank">
            <img src="https://www.emaargurgaon.com/emaar-digi-homes-sector-62-gurgaon/images/icons/whatsapp.png" alt="whatsapp" width="60" height="60">
          </a>
        </div>
        <div class="pb-2" style="font-size: 25px; font-weight: bold; width: 59%; line-height: 22px;">
          <span style="font-size: 14px;">Chat with our expert</span><br>
          <a style="font-size: 15px;" href="tel:+91 9999063322">
            (+91) 9999<span style="color: #0071b0">06</span>3322
          </a>
        </div>
      </div>
    </div>
    <script>
        grecaptcha.ready(function() {
          grecaptcha.execute('6LfyCowlAAAAAJaao8gknKfdVPhcMeL7VRYAYRIG', {action: 'submit'}).then(function(token) {
             var response = document.getElementById("g-token");
             response.value = token;
          });
        });
   </script>
   <script>
    let form = document.querySelector("form");
form.addEventListener("submit", (e) => {
  let data = new FormData(form);
  fetch(
    "https://script.google.com/macros/s/AKfycbxZMks3d9pQQZCCzkVOX_3IeNbcQD3kASSH4Jyn3V4np7aNjIAcKukMmIjiGM8HXMTO6g/exec",
    {
      method: "POST",
      body: data,
    }
  )
    .then((res) => res.text())
    .then((data) => {
      console.log(data);
       form.reset();
    });
});
</script>
<script>
  function sendMail() {
      let pageTitle = document.title;
  Email.send({
    Host: "smtp.elasticemail.com",
    Username: "lead@realtytrust.in",
    Password: "95631E2207C237E78F518EE02D380AEE0FB7",
    To: "lead@realtytrust.in",
    From: "lead@realtytrust.in",
    Subject: "New Inquiry From Ansalesencia",
    Body:
       `<h3>I am interested in ${pageTitle}</h3>` + 
       "<br>" +
      "Name:" +
      document.getElementById("name").value +
      "<br> Email:" +
      document.getElementById("email").value +
      "<br> Phone:" +
      document.getElementById("phone").value +
      "<br> Property Type:" +
      document.getElementById("property").value,
  }).then((message) => alert(message + " " + "Message Send Successfully!"));
}
</script>
<script>
      function LoadingSpinner(form, spinnerHTML) {
        form = form || document;
        var button;
        var spinner = document.createElement("div");
        spinner.innerHTML = spinnerHTML;
        spinner = spinner.firstChild;
        form.addEventListener("click", start);
        form.addEventListener("invalid", stop, true);
        function start(event) {
          if (button) stop();
          button = event.target;
          if (button.type === "submit") {
            LoadingSpinner.start(button, spinner);
          }
        }

        function stop() {
          LoadingSpinner.stop(button, spinner);
        }

        function destroy() {
          stop();
          form.removeEventListener("click", start);
          form.removeEventListener("invalid", stop, true);
        }

        return { start: start, stop: stop, destroy: destroy };
      }
      LoadingSpinner.start = function (element, spinner) {
        element.classList.add("loading");
        return element.appendChild(spinner);
      };

      LoadingSpinner.stop = function (element, spinner) {
        element.classList.remove("loading");
        return spinner.remove();
      };
      var exampleForm = document.querySelector("#example");
      var exampleLoader = new LoadingSpinner(
        exampleForm,
        "Sending..."
      );
      exampleForm.addEventListener("submit", function (event) {
        event.preventDefault();
        setTimeout(function () {
          exampleLoader.stop();
        }, 2000);
        // exampleForm.reset();
      });
    </script>
    </body>
</html>