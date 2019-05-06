<div id="contact_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">We'd Love to Hear From You</h3>
      </div>
      <div class="modal-body">
        <form class="form-horizontal col-sm-12" id="contactForm" >
          <div class="form-group">
            <label>Name</label>
            <input name="name" id="name" class="form-control required" placeholder="Your name" data-placement="top" data-trigger="manual" data-content="Must be at least 3 characters long, and must only contain letters." type="text" required>
          </div>
          <div class="form-group"><label>Message</label>
            <textarea  name="description" id="description"class="form-control" placeholder="Your message here.." data-placement="top" data-trigger="manual" required></textarea>
          </div>

          <div class="form-group">
              <label>Contact No</label>
            <input name="contact_no"id="contact_no" class="form-control phone" placeholder="999-999-9999" data-placement="top" data-trigger="manual" data-content="Must be a valid phone number (999-999-9999)" type="text" required>
          </div>
          <div class="form-group">
            <button type="submit" id="submit" class="btn btn-success pull-right">  Send It!</button>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
      </div>
    </div>
  </div>
</div>
