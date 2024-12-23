<?php include_once 'includes/header.php'; ?>

  <div class="content-container">
    <div class="banner" style="background: url('<?= ASSETS_URL ?>images/dummy-background.jpeg') no-repeat center; background-size: cover; height: 500px;"></div>
    <div class="banner">
      <div class="banner-table flex-column">
        <div class="flex-row">
          <div class="flex-item flex-column">
            <h2 class="add-top-margin-small">This is the two banner area with photo</h2>
            <p class="text">
              Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel
              augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget
              condimentum rhoncus.
            </p>
          </div>
        </div>
      </div>
    </div>  
    

    <div class="content">
        
        <!--Start Survey-->
        <div class="flex-row">
          <div class="flex-item flex-column">
            <h2 id="survey">Survey</h2>
            <hr>
            <p class="text">
              Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel
              augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget
              condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit
              vel, luctus pulvinar, hendrerit id, lorem.
            </p>
            <div class="custom-survey add-top-margin add-bottom-margin">
              <span class="text">1. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero.</span>
              <div class="custom-radio-group-survey add-top-margin">
                <div><input type="radio" name="scenario-question-sq-1508-scale" value="2596" id="scenario-question-sq-1508-item-0"> <label class="break-long-url" for="scenario-question-sq-1508-item-0">Strongly Agree</label></div>
                <div><input type="radio" name="scenario-question-sq-1508-scale" value="2597" id="scenario-question-sq-1508-item-1"> <label class="break-long-url" for="scenario-question-sq-1508-item-1">Agree</label></div>
                <div><input type="radio" name="scenario-question-sq-1508-scale" value="2598" id="scenario-question-sq-1508-item-2"> <label class="break-long-url" for="scenario-question-sq-1508-item-2">Neutral</label></div>
                <div><input type="radio" name="scenario-question-sq-1508-scale" value="2599" id="scenario-question-sq-1508-item-3"> <label class="break-long-url" for="scenario-question-sq-1508-item-3">Disagree</label></div>
                <div><input type="radio" name="scenario-question-sq-1508-scale" value="2600" id="scenario-question-sq-1508-item-4"> <label class="break-long-url" for="scenario-question-sq-1508-item-4">Strongly Disagree</label></div>
              </div>
            </div>
            <div class="custom-survey add-top-margin add-bottom-margin">
              <span class="text">2. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero.</span>
              <div class="custom-radio-group-survey add-top-margin">
                <div><input type="checkbox" name="scenario-question-sq-1508-scale" value="2596" id="scenario-question-sq-1510-item-0"> <label class="break-long-url" for="scenario-question-sq-1510-item-0">Strongly Agree</label></div>
                <div><input type="checkbox" name="scenario-question-sq-1508-scale" value="2597" id="scenario-question-sq-1510-item-1"> <label class="break-long-url" for="scenario-question-sq-1510-item-1">Agree</label></div>
                <div><input type="checkbox" name="scenario-question-sq-1508-scale" value="2598" id="scenario-question-sq-1510-item-2"> <label class="break-long-url" for="scenario-question-sq-1510-item-2">Neutral</label></div>
                <div><input type="checkbox" name="scenario-question-sq-1508-scale" value="2599" id="scenario-question-sq-1510-item-3"> <label class="break-long-url" for="scenario-question-sq-1510-item-3">Disagree</label></div>
                <div><input type="checkbox" name="scenario-question-sq-1508-scale" value="2600" id="scenario-question-sq-1510-item-4"> <label class="break-long-url" for="scenario-question-sq-1510-item-4">Strongly Disagree</label></div>
              </div>
            </div>
            <div class="custom-survey add-top-margin add-bottom-margin">
              <span class="text">3. Do you have any comments for this study?</span>
              <textarea class="custom-textbox-survey add-top-margin" placeholder="(max 500 characters)" maxlength="500"></textarea>
            </div>
            <div class="custom-survey add-top-margin add-bottom-margin">
              <span class="text">4. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero.</span>
              <div class="custom-radio-group-survey image-only add-top-margin">
                <div> <input type="checkbox" name="scenario-question-sq-1545-scale" value="2720" id="scenario-question-sq-1545-item-2"><label for="scenario-question-sq-1545-item-2">
                    <figure><img src="https://images.unsplash.com/photo-1597914377769-db5167cb0221?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=774&amp;q=80">
                      <div>Credit: Justus Menke</div>
                      <figcaption>Phasellus viverra nulla ut metus varius laoreet.</figcaption>
                    </figure>
                  </label> </div>
                <div> <input type="checkbox" name="scenario-question-sq-1545-scale" value="2726" id="scenario-question-sq-1545-item-4"><label for="scenario-question-sq-1545-item-4">
                    <figure><img src="https://images.unsplash.com/photo-1588196749597-9ff075ee6b5b?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=2874&amp;q=80">
                      <div>Credit: Chris Montgomery</div>
                      <figcaption>Nam eget dui. Etiam rhoncus</figcaption>
                    </figure>
                  </label> </div>
                <div> <input type="checkbox" name="scenario-question-sq-1545-scale" value="2721" id="scenario-question-sq-1545-item-5"><label for="scenario-question-sq-1545-item-5">
                    <figure><img src="https://images.unsplash.com/photo-1506485338023-6ce5f36692df?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1740&amp;q=80">
                      <div>Credit: Jazmin Quaynor</div>
                      <figcaption>Etiam ultricies nisi vel augue.</figcaption>
                    </figure>
                  </label> </div>
              </div>
            </div>
            <p class="text">
              Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel
              augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget
              condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit
              vel, luctus pulvinar, hendrerit id, lorem.
            </p>
          </div>
        </div>
        <!--End Survey-->
        <!-------------------------------------------------------------------------------------------->
        <!--Start Credits-->
        <div class="flex-row">
          <div class="flex-item flex-item-stretch flex-column">
            <p class="text text-small text-italic add-top-margin-large">
              Credits: <span class="highlight-text">Organization One</span>: Author One and Author Two / <span class="highlight-text">Organization Two</span>: Author Three and Author Four
            </p>
          </div>
        </div>
        <!--End Credits-->
    
    </div>
  </div>

<?php include_once 'includes/footer.php'; ?>