

  <input type="radio" name="r" id="open">
  <input type="radio" name="r" id="close">
  <div class="f-button"><label for="open">Feedback</label></div>
  <div id="form"style="z-index: 9999999999;">
      <div id="form-div"><P>Contact Us</p>
          <div class="close"><p><label for="close">X</label></p></div>


            <form class="form" id="form1" action="ajaxSubmit.php">
              <p class="name">
                <input name="name" type="text" class="validate[required,custom[onlyLetter],length[0,100]] text-input" id="name" required placeholder="Input Your Name" />
          
              </p>
              <p class="email">
                <input name="email" type="text" class="validate[required,custom[email]] text-input" id="email" required placeholder="Input Your Email" />
                
              </p>
              <p class="Subject">
                <input type="text" name="subject" id="subject" placeholder="Subject" />
                
              </p>
              <p class="text" style="border:0px;">
                <textarea placeholder="Your Comment" name="text" class="validate[required,length[6,300]] text-input" id="comment"></textarea>
              </p>
              <p class="submit">
                <input type="submit" value="Send" class="sb" />
              </p>
            </form>
          </div>
      </div>
</div>

